<?php

use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('create/items', [ItemsController::class, 'create'])->name('items.create');
Route::post('save/items', [ItemsController::class, 'save'])->name('items.save');
