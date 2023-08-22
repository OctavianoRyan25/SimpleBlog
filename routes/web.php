<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [Controller::class, 'index']);
Route::get('/home', [Controller::class, 'index']);


Route::get('/post/{post:slug}', [Controller::class, 'viewpost']);
Route::post('/post/{post:slug}', [Controller::class, 'komentar']);

Route::get('/posts', [Controller::class, 'posts']);

Route::get('/kategori', [Controller::class, 'category']);

Route::get('/login', [Login::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [Login::class, 'authenticate']);
Route::post('/logout', [Login::class, 'logout']);

Route::get('/register', [Register::class, 'index'])->middleware('guest');
Route::post('/register', [Register::class, 'store']);

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware('auth', 'admin');

Route::resource('/admin/posts', Admin::class)->middleware('auth', 'admin')->except('show');
// Route::get('/admin/posts/createslug', Admin::class, 'createSlug')->middleware('auth', 'admin');
Route::resource('/admin/category', CategoryController::class)->middleware('auth');
