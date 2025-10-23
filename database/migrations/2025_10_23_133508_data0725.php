<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateData0725Table extends Migration
{
    public function up()
    {
        Schema::create('data_0725', function (Blueprint $table) {
            $table->id();
            $table->integer('row_number')->unique(); // row index (1..1000)
            // 26 generic columns -> col_1..col_26 (A..Z)
            for ($i = 1; $i <= 26; $i++) {
                $table->text("col_{$i}")->nullable();
            }
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_0725');
    }
}
