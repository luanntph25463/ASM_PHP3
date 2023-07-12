<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\teachersController;
use App\Http\Controllers\UsersController;
use App\Models\teachers;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [CoursesController::class, 'trangchu'])->name('trangchu');

Route::get('/admin', [UsersController::class, 'Dashboard'])->name('Dashboard');

Route::prefix('/category/')->group(function () {
    Route::get('/list', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/search', [CategoryController::class, 'search'])->name('category.search');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/update', [ProductsControllers::class, 'update'])->name('product.update');
    Route::get('destroy/{product}', [ProductsControllers::class, 'destroy'])->name('product.destroy');
});
Route::prefix('/banners/')->group(function () {
    Route::get('/list', [BannerController::class, 'index'])->name('banners.list');
    Route::get('/create', [BannerController::class, 'create'])->name('banners.create');
    Route::get('/search', [BannerController::class, 'search'])->name('banners.search');
    Route::get('/delete', [BannerController::class, 'delete'])->name('banners.delete');
    Route::post('/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::patch('/update', [CategoriesController::class, 'update'])->name('categories.update');
    Route::get('destroy/{product}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});
Route::prefix('/classes/')->group(function () {
    Route::get('/list', [ClassesController::class, 'index'])->name('classes.list');
    Route::get('/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::get('/delete', [ClassesController::class, 'delete'])->name('classes.delete');
    Route::get('/search', [ClassesController::class, 'search'])->name('classes.search');
    Route::post('/store', [ReviewsController::class, 'store'])->name('reivew.store');
    Route::get('/edit/{id}', [ReviewsController::class, 'edit'])->name('reivew.edit');
    Route::patch('/update', [ReviewsController::class, 'update'])->name('reivew.update');
    Route::get('destroy/{product}', [ReviewsController::class, 'destroy'])->name('reivew.destroy');
});
Route::prefix('/order/')->group(function () {
    Route::get('/list', [OrderController::class, 'index'])->name('order.list');
    Route::get('/list/{id}', [OrderController::class, 'newPage'])->name('order.page');
    Route::get('/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/delete', [OrderController::class, 'delete'])->name('order.delete');
    Route::get('/search', [OrderController::class, 'search'])->name('order.search');
    Route::get('/in/{id}/pdf', [OrderController::class, 'pdf'])->name('order.in');

    Route::get('/edit/{id}', [CartController::class, 'edit'])->name('cart.edit');
    Route::patch('/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('destroy/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
});
Route::prefix('/promotions/')->group(function () {
    Route::get('/list', [PromotionsController::class, 'index'])->name('promotions.list');
    Route::get('/create', [PromotionsController::class, 'create'])->name('promotions.create');
    Route::get('/delete', [PromotionsController::class, 'delete'])->name('promotions.delete');
    Route::get('/search', [PromotionsController::class, 'search'])->name('promotions.search');
    // Route::post('/store', [UserController::class, 'store'])->name('users.store');
    // Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    // Route::patch('/update', [UserController::class, 'update'])->name('users.update');
    // Route::get('destroy/{product}', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::prefix('/reviews/')->group(function () {
    Route::get('/list', [ReviewsController::class, 'index'])->name('reviews.list');
    Route::get('/create', [ReviewsController::class, 'create'])->name('reviews.create');
    Route::get('/search', [ReviewsController::class, 'search'])->name('reviews.search');
    Route::get('/delete', [ReviewsController::class, 'delete'])->name('reviews.delete');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/update', [AdminController::class, 'update'])->name('admin.update');
    Route::get('destroy/{product}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
Route::prefix('/teachers/')->group(function () {
    Route::get('/list', [teachersController::class, 'index'])->name('teachers.list');
    Route::get('/create', [teachersController::class, 'create'])->name('teachers.create');
    Route::get('/search', [teachersController::class, 'search'])->name('teachers.search');
    Route::get('/delete', [teachersController::class, 'delete'])->name('teachers.delete');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/update', [AdminController::class, 'update'])->name('admin.update');
    Route::get('destroy/{product}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
Route::prefix('/users/')->group(function () {
    Route::get('/list', [UsersController::class, 'index'])->name('users.list');
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/search', [UsersController::class, 'search'])->name('users.search');
    Route::get('/user-delete', [UsersController::class, 'delete'])->name('users.delete');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/update', [AdminController::class, 'update'])->name('admin.update');
    Route::get('destroy/{product}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
Route::prefix('/courses/')->group(function () {
    Route::get('/list', [CoursesController::class, 'index'])->name('courses.list');
    Route::get('/create', [CoursesController::class, 'index'])->name('courses.create');
    Route::get('/excel', [CoursesController::class, 'downloadExcel'])->name('courses.excel');
    Route::get('/delete', [CoursesController::class, 'delete'])->name('courses.delete');
    Route::get('/search', [CoursesController::class, 'search'])->name('courses.search');
});
