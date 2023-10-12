<?php

use App\Models\Badge;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BadgeController;
use App\ClassesExerciseTwo\ProductService;
use App\Http\Controllers\ProductController;

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



Route::post('/products/update', [ProductController::class, 'updateProduct'])->name('products.update');

Route::post('/products/add', [ProductController::class, 'addProduct'])->name('products.add');
Route::post('/products/badges', [BadgeController::class, 'addPBadge'])->name('badges.add');

Route::match(['get', 'post'], '/products', [ProductController::class, 'showProducts'])->name('products');
