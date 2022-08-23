<?php

use App\Http\Controllers\DashboardCategoryProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardGalleryProductController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardUserResetController;
use App\Http\Controllers\LoginAdminController;
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
    return view('welcome');
});

// Route Sign In Admin
Route::get('/signin-admin', [LoginAdminController::class, 'index']);
Route::post('/signin-admin/auth', [LoginAdminController::class, 'auth']);
Route::post('/signin-admin/signout', [LoginAdminController::class, 'signout']);
// Route Dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Route Products
    Route::get('/dashboard/product/checkSlug', [DashboardProductController::class, 'checkSlug'])->middleware('auth');
    Route::resource('/dashboard/product', DashboardProductController::class);
    Route::resource('/dashboard/galeryproduct', DashboardGalleryProductController::class)->only('store', 'destroy');
    Route::resource('/dashboard/transaction', DashboardTransactionController::class)->only('index', 'show', 'update');
    Route::resource('/dashboard/user', DashboardUserController::class);
    Route::post('/dashboard/user/reset', [DashboardUserResetController::class, 'reset']);
    Route::resource('/dashboard/profile', DashboardProfileController::class);
    Route::get('/dashboard/category/checkSlug', [DashboardCategoryProductController::class, 'checkSlug'])->middleware('auth');
    Route::resource('/dashboard/category',DashboardCategoryProductController::class);
});
