<?php
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::resource("users", UserController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::resource('categories', CategoryController::class);
Route::delete('/categories/{category}/delete-permanent', [CategoryController::class, 'deletePermanent'])->name('categories.delete-permanent');
Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);

Route::post('/books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
Route::get('books', BookController::class);
Route::delete('/books/{id}/delete-permanent', [BookController::class, 'deletePermanent'])->name('books.delete-permanent');
Route::resource('books', BookController::clas, '__invoke');

Route::resource('orders', OrderController::class);
