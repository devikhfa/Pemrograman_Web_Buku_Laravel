<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get("/Category", [CategoryController::class, 'index'])->name('index.Category');
Route::get("/Category/AddCategory", [CategoryController::class, 'AddCategory'])->name('index.AddCategory');
Route::post("/Category/AddCategoryAction", [CategoryController::class, 'AddCategoryAction'])->name('index.AddCategoryAction');
