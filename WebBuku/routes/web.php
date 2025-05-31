<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get("/Category", [CategoryController::class, 'index'])->name('index.index');
Route::get("/AddCategory", [CategoryController::class, 'Addcategory'])->name('index.index');
