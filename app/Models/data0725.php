<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data0725 extends Model
{
    protected $table = 'data_0725';
    protected $fillable = [
        'row_number',
        // col_1 .. col_26
        'col_1','col_2','col_3','col_4','col_5','col_6','col_7',
        'col_8','col_9','col_10','col_11','col_12','col_13',
        'col_14','col_15','col_16','col_17','col_18','col_19',
        'col_20','col_21','col_22','col_23','col_24','col_25','col_26',
    ];
}
