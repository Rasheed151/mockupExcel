<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data0725Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/index', function () {
    return view('column');
});

Route::get('/', function () {
    return view('index');
});

// Route::get('/', [Data0725Controller::class, 'index'])->name('index');
// Route::post('/', [Data0725Controller::class, 'saveCell'])->name('data_0725.save_cell');
