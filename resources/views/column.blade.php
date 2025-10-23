<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png"
        href="https://res.cloudinary.com/dvugdsa0z/image/upload/v1756707378/projectku/esqeuwdgmfpwbizrdrhx.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Index</title>
</head>

@php
function generateExcelColumns($endColumn = 'AZ')
{
    $columns = [];
    $current = 'A';

    while (true) {
        $columns[] = $current;
        if ($current === $endColumn) break;

        // Tambahkan logika increment seperti di Excel
        $i = strlen($current) - 1;
        while ($i >= 0) {
            if ($current[$i] !== 'Z') {
                $current[$i] = chr(ord($current[$i]) + 1);
                break;
            } else {
                $current[$i] = 'A';
                if ($i === 0) {
                    $current = 'A' . $current;
                    break;
                }
                $i--;
            }
        }
    }

    return $columns;
}

$Alphabet = generateExcelColumns('AZ'); // Ganti 'AZ' ke 'ZZ' kalau mau lebih panjang
$limit = 1000;
@endphp


<body class="m-0 bg-gray-50">
    <div class="overflow-auto max-h-screen">
        <table class="border border-black border-collapse w-full text-sm">
            <thead class="sticky top-0 bg-gray-200 z-20">
                <tr>
                    <th class="border-2 border-black p-2 text-center sticky left-0 bg-gray-200 z-30">No</th>
                    @foreach ($Alphabet as $letter)
                        <th class="border-2 border-black p-2 text-center min-w-52">
                            {{ $letter }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $limit; $i++)
                    <tr class="even:bg-gray-50 odd:bg-white">
                        <th class="border-2 border-black p-2 text-center sticky left-0 bg-gray-100 z-10">
                            {{ $i }}
                        </th>
                        @foreach ($Alphabet as $letter)
                            <td class="border-2 border-black p-2 hover:bg-gray-100 focus-within:bg-yellow-100 transition-colors">
                                <input
                                    type="text"
                                    name="cell[{{ $i }}][{{ $letter }}]"
                                    id="cell-{{ $i }}-{{ $letter }}"
                                    class="w-full border-none outline-none bg-transparent text-center focus:ring-0 placeholder-gray-400"
                                    placeholder="{{ $letter . $i }}"
                                    title="Kolom {{ $letter }}, Baris {{ $i }}">
                            </td>
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>
</html>
