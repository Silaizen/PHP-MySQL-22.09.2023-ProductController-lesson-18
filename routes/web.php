<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Js;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;

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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('contacts', [MainController::class, 'contacts']);
Route::post('contacts', [MainController::class, 'sendMail']);


Route::get('/search', [SearchController::class, 'search']);

Route::get('/reviews', [ReviewController::class, 'index']);

Route::get('category/{category:slug}', [ShopController::class, 'category']);





Route::get('product/{product:slug}', [ProductController::class, 'show']);
Route::get('category/{category:slug}', [ShopController::class, 'category'])->name('category');
Auth::routes();


//Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::post('login', [LoginController::class, 'login']);

Route::get('admin', [DashboardController::class, 'index'])->middleware('auth', 'admin');
Route::resource('admin/category', CategoryController::class);
Route::resource('admin/product', ProductController::class);

Route::resource('admin/review', ReviewController::class);






/*
Controller
index
create
store
...



Routes


get admin/categories CategoryController index

get admin/categories/create CategoryController create

post admin/categories CategoryController store

get admin/categories/1/edit CategoryController edit

put admin/categories/1 CategoryController update

delete admin/categories/1 CategoryController delete
*/