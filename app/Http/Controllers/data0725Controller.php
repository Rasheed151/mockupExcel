<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data0725;

class Data0725Controller extends Controller
{


    public function index(){
        return view('index');
    }
    // Save single cell: POST /data_0725/save-cell
    public function saveCell(Request $request)
    {
        $request->validate([
            'row' => 'required|integer|min:1',
            'col' => 'required|integer|min:1|max:26',
            'value' => 'nullable|string',
        ]);

        $row = (int) $request->input('row');
        $col = (int) $request->input('col');
        $value = $request->input('value');

        $data = Data0725::firstOrCreate(['row_number' => $row], ['row_number' => $row]);

        $colName = 'col_' . $col;
        $data->{$colName} = $value;
        $data->save();

        return response()->json([
            'success' => true,
            'row' => $row,
            'col' => $col,
            'value' => $value,
        ]);
    }
}
