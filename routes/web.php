<?php

use App\Http\Controllers\BadgesController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReceivingController;
use App\Http\Livewire\Items\ItemSearchBar;
use App\Http\Livewire\Receivings\IndexReceiving;
use App\Http\Livewire\Receivings\ShowReceiving;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('items', ItemController::class);
Route::resource('badges', BadgesController::class);
// Route::get('receivings', ShowReceiving::class);
Route::get('receivings', IndexReceiving::class)->name('receivings');
Route::get('receivings/{id}', ShowReceiving::class)->name('receiving');

Route::get('item-search', ItemSearchBar::class);