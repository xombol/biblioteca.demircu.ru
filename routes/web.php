<?php

use App\Http\Controllers\Admin\PagesController;


use App\Http\Controllers\API\PublisherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/fetch_data', [PagesController::class, 'fetchData'])->name('fetchData');
Route::get('/publishers/{publisher}/fetch_data', [PublisherController::class, 'fetch_data'])->name('fetch_data_publisher');

Route::resource('publishers', PublisherController::class);


