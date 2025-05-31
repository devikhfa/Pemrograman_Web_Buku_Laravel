<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get("/Category", [CategoryController::class, 'index'])->name('index.Category');
Route::get("/Category/AddCategory", [CategoryController::class, 'AddCategory'])->name('index.AddCategory');
Route::post("/Category/AddCategoryAction", [CategoryController::class, 'AddCategoryAction'])->name('index.AddCategoryAction');

Route::get("/Category/EditCategory{id}", [CategoryController::class, 'EditCategory'])->name('index.EditCategory');
Route::put("/Category/EditCategoryAction{id}", [CategoryController::class, 'EditCategoryAction'])->name('index.EditCategoryAction');

Route::delete("/Category/DeleteCategoryAction{id}", [CategoryController::class, 'DeleteCategoryAction'])->name('index.DeleteCategoryAction');


Route::get("/User", [UserController::class, 'index'])->name('index.User');
Route::get("/User/AddUser", [UserController::class, 'AddUser'])->name('index.AddUser');
Route::post("/User/AddUserAction", [UserController::class, 'AddUserAction'])->name('index.AddUserAction');

Route::get("/User/EditUser{id}", [UserController::class, 'EditUser'])->name('index.EditUser');
Route::put("/User/EditUserAction{id}", [UserController::class, 'EditUserAction'])->name('index.EditUserAction');

Route::delete("/User/DeleteUserAction{id}", [UserController::class, 'DeleteUserAction'])->name('index.DeleteUserAction');
