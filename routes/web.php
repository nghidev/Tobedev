<?php

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
Route::get('/pofolio', function () {
    return view('pofolio');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/list', [App\Http\Controllers\HomeController::class, 'list'])->name('danhsach');
Route::get('/detail', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
// Route::get('/order', [App\Http\Controllers\HomeController::class, 'order'])->name('order');
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');

Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/order_detail/{id}', [App\Http\Controllers\OrderController::class, 'order_detail'])->name('order_detail');
// Route::get('/cat/{id}', [Acpp\Http\Controllers\HomeController::class, 'getProductByCat']);
Route::get('/cat/{id}', [App\Http\Controllers\HomeController::class, 'getProductByCat'])->name('cats');


// ================= BACKEND ================= 
Route::get('data_table', [App\Http\Controllers\BE\AdminController::class, 'list'])->name('be.data_table');
Route::get('add_book', [App\Http\Controllers\BE\AdminController::class, 'add'])->name('be.add_book');
Route::get('be', [App\Http\Controllers\BE\AdminController::class, 'index'])->name('be.index');
Route::get('be/login', [App\Http\Controllers\BE\AdminController::class, 'login'])->name('be.login');
Route::post('be/submitLogin', [App\Http\Controllers\BE\AdminController::class, 'handleLogin'])->name('be.submitLogin');
Route::post('be/logout', [App\Http\Controllers\BE\AdminController::class, 'logout'])->name('be.logout');

//products
Route::get('be/product', [App\Http\Controllers\BE\ProductController::class, 'index'])->name('be.product.index');
Route::get('be/product/create', [App\Http\Controllers\BE\ProductController::class, 'create'])->name('be.product.create');
Route::post('be/product/store', [App\Http\Controllers\BE\ProductController::class, 'store'])->name('be.product.store');
Route::get('be/product/{id}', [App\Http\Controllers\BE\ProductController::class, 'edit'])->name('be.product.edit');
Route::post('be/product/update', [App\Http\Controllers\BE\ProductController::class, 'update'])->name('be.product.update');
Route::get('be/product/delete/{id}', [App\Http\Controllers\BE\ProductController::class, 'destroy'])->name('be.product.delete');
Route::get('be/category', [App\Http\Controllers\BE\CategoryController::class, 'index'])->name('be.product.category');

	// ================= addcart ================= 	
Route::get('cart/addcart/{id}', [App\Http\Controllers\BE\CartController::class, 'show'])->name('cart.addcart');
		
