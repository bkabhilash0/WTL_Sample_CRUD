<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/books", [BookController::class, 'index'])->name("books.index");
Route::get("/books/add", [BookController::class, 'create'])->name("books.add")->middleware("auth");
Route::post("/books/add", [BookController::class, 'store'])->name("books.store")->middleware("auth");
Route::get("/books/{id}", [BookController::class, 'show'])->name("books.show");
Route::get("/books/update/{id}", [BookController::class, 'edit'])->name("books.edit")->middleware("auth");
Route::post("/books/update/{id}", [BookController::class, 'update'])->name("books.update")->middleware("auth");
Route::get("/books/delete/{id}", [BookController::class, 'destroy'])->name("books.delete")->middleware("auth");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
