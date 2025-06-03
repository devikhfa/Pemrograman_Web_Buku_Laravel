<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('home', function () {return view('dashboard');})->middleware('auth');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get("/Category", [CategoryController::class, 'index'])->name('index.Category')->middleware('auth');
Route::get("/Category/AddCategory", [CategoryController::class, 'AddCategory'])->name('index.AddCategory')->middleware('auth');
Route::post("/Category/AddCategoryAction", [CategoryController::class, 'AddCategoryAction'])->name('index.AddCategoryAction');
Route::get("/Category/EditCategory{id}", [CategoryController::class, 'EditCategory'])->name('index.EditCategory')->middleware('auth');
Route::put("/Category/EditCategoryAction{id}", [CategoryController::class, 'EditCategoryAction'])->name('index.EditCategoryAction');
Route::delete("/Category/DeleteCategoryAction{id}", [CategoryController::class, 'DeleteCategoryAction'])->name('index.DeleteCategoryAction');


Route::get("/User", [UserController::class, 'index'])->name('index.User')->middleware('auth');
Route::get("/User/AddUser", [UserController::class, 'AddUser'])->name('index.AddUser')->middleware('auth');
Route::post("/User/AddUserAction", [UserController::class, 'AddUserAction'])->name('index.AddUserAction');
Route::get("/User/EditUser{id}", [UserController::class, 'EditUser'])->name('index.EditUser')->middleware('auth');
Route::put("/User/EditUserAction{id}", [UserController::class, 'EditUserAction'])->name('index.EditUserAction');
Route::delete("/User/DeleteUserAction{id}", [UserController::class, 'DeleteUserAction'])->name('index.DeleteUserAction');


Route::get("/Buku", [BukuController::class, 'index'])->name('index.Buku')->middleware('auth');
Route::get("/Buku/AddBuku", [BukuController::class, 'AddBuku'])->name('index.AddBuku')->middleware('auth');
Route::post("/Buku/AddBukuAction", [BukuController::class, 'AddBukuAction'])->name('index.AddBukuAction');
Route::get("/Buku/EditBuku{id}", [BukuController::class, 'EditBuku'])->name('index.EditBuku')->middleware('auth');
Route::put("/Buku/EditBukuAction{id}", [BukuController::class, 'EditBukuAction'])->name('index.EditBukuAction');
Route::delete("/Buku/DeleteBukuAction{id}", [BukuController::class, 'DeleteBukuAction'])->name('index.DeleteBukuAction');
