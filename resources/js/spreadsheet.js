// resources/js/spreadsheet.js
// Native JS virtual spreadsheet + double-click edit + autosave via fetch

document.addEventListener('DOMContentLoaded', function () {
  // CONFIG
  const TOTAL_ROWS = 1000;
  const VISIBLE_ROWS = 35;      // number of rows rendered at once
  const ROW_HEIGHT = 34;        // px - should match rendered row height
  const COL_COUNT = 26;         // A..Z
  const FREEZE_COLS = 7;        // freeze first 7 columns

  // DOM elements
  const wrapper = document.getElementById('spreadsheet-wrapper');
  const thead = document.getElementById('vs-thead').querySelector('tr');
  const tbody = document.getElementById('vs-tbody');
  const topPad = document.getElementById('top-pad');
  const bottomPad = document.getElementById('bottom-pad');

  // CSRF token
  const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // generate column labels A..Z
  function genCols(n) {
    const arr = [];
    for (let i = 0; i < n; i++) {
      arr.push(String.fromCharCode(65 + i));
    }
    return arr;
  }
  const columns = genCols(COL_COUNT);

  // render the header columns (A..Z)
  function renderHeader() {
    // remove existing header cells except first (No)
    while (thead.children.length > 1) thead.removeChild(thead.lastChild);

    columns.forEach((col, idx) => {
      const th = document.createElement('th');
      th.className = `border p-1 w-24 text-center bg-emerald-600 text-white`;
      th.textContent = col;
      // sticky for freeze
      if (idx < FREEZE_COLS) {
        th.style.position = 'sticky';
        th.style.left = `${12 + idx * 96}px`; // approximate left offset for frozen columns
        th.style.zIndex = 35 - idx;
        th.style.backgroundColor = '#065f46'; // darker emerald for frozen
      }
      thead.appendChild(th);
    });
  }

  // helper for creating a cell element (td)
  function createCell(row, colIndex) {
    const td = document.createElement('td');
    td.className = 'border p-1';
    // freeze behavior
    if (colIndex < FREEZE_COLS) {
      td.style.position = 'sticky';
      td.style.left = `${(colIndex + 1) * 96}px`; // left offset; +1 because col 0 reserved for No
      td.style.zIndex = 30;
      td.style.backgroundColor = '#f8fafc'; // light bg for frozen
    }

    // wrapper for editable content
    const wrapperDiv = document.createElement('div');
    wrapperDiv.style.minWidth = '90px';
    wrapperDiv.style.height = '28px';
    wrapperDiv.style.display = 'flex';
    wrapperDiv.style.alignItems = 'center';
    wrapperDiv.style.justifyContent = 'center';
    wrapperDiv.style.cursor = 'text';

    // view span
    const span = document.createElement('span');
    span.textContent = ''; // empty initially
    span.style.width = '100%';
    span.style.textAlign = 'center';

    // input (hidden until edit)
    const input = document.createElement('input');
    input.type = 'text';
    input.value = '';
    input.style.display = 'none';
    input.className = 'w-full text-center border rounded-sm p-0';

    // events: double click to edit
    wrapperDiv.addEventListener('dblclick', function () {
      span.style.display = 'none';
      input.style.display = 'block';
      input.focus();
    });

    // blur or Enter — stop editing and save
    function stopEditAndSave() {
      input.style.display = 'none';
      span.style.display = 'block';
      const newValue = input.value;
      span.textContent = newValue;
      // send save to server
      saveCell(row, colIndex + 1, newValue); // colIndex+1 because DB col_1..col_26
    }

    input.addEventListener('blur', stopEditAndSave);
    input.addEventListener('keydown', function (e) {
      if (e.key === 'Enter') {
        input.blur();
      }
    });

    wrapperDiv.appendChild(span);
    wrapperDiv.appendChild(input);
    td.appendChild(wrapperDiv);

    return td;
  }

  // render visible rows based on start index
  let currentStart = 0;
  function renderRows(startIndex) {
    tbody.innerHTML = ''; // clear

    const end = Math.min(TOTAL_ROWS, startIndex + VISIBLE_ROWS);
    for (let r = startIndex + 1; r <= end; r++) {
      const tr = document.createElement('tr');
      tr.style.height = ROW_HEIGHT + 'px';

      // row number (frozen left)
      const th = document.createElement('td');
      th.className = 'border p-1 text-center bg-gray-100 font-semibold sticky left-0 z-40';
      th.style.position = 'sticky';
      th.style.left = '0px';
      th.style.zIndex = 45;
      th.textContent = r;
      th.style.width = '48px';
      tr.appendChild(th);

      // cells
      for (let c = 0; c < COL_COUNT; c++) {
        const td = createCell(r, c);
        tr.appendChild(td);
      }

      tbody.appendChild(tr);
    }
  }

  // update padding heights
  function updatePads(startIndex) {
    topPad.style.height = (startIndex * ROW_HEIGHT) + 'px';
    const rendered = Math.min(VISIBLE_ROWS, TOTAL_ROWS - startIndex);
    bottomPad.style.height = ((TOTAL_ROWS - startIndex - rendered) * ROW_HEIGHT) + 'px';
  }

  // handle scroll
  wrapper.addEventListener('scroll', function (e) {
    const scrollTop = wrapper.scrollTop;
    const firstVisibleRow = Math.floor(scrollTop / ROW_HEIGHT);
    const start = Math.max(0, firstVisibleRow - 3);
    if (start !== currentStart) {
      currentStart = start;
      renderRows(start);
      updatePads(start);
    }
  });

  // Save cell to server via fetch
  function saveCell(row, colIndex, value) {
    // prepare payload
    const payload = {
      row: row,
      col: colIndex,
      value: value
    };

    fetch('/data_0725/save-cell', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf,
        'Accept': 'application/json'
      },
      body: JSON.stringify(payload)
    })
    .then(resp => resp.json())
    .then(json => {
      if (!json.success) {
        console.error('Save failed', json);
      }
    })
    .catch(err => console.error('Save error', err));
  }

  // initial render
  renderHeader();
  renderRows(0);
  updatePads(0);
  // ensure initial scrollTop is 0
  wrapper.scrollTop = 0;
});
