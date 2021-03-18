<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [RecipeController::class, 'all'])->name('welcome');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

//user must be authorized and email must be verified to access these routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/search/', [RecipeController::class, 'search'])->name('search');
    Route::resource('recipes', RecipeController::class);
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// only admins can access these routes. isAdmin gate defined in authserviceprovider; middleware adminaccess
Route::middleware(['auth', 'auth.isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reject/{recipe_id}', [DashboardController::class, 'reject'])->name('recipe.reject.page');
    Route::patch('/approve-recipe/{recipe_id}', [RecipeController::class, 'approve'])->name('recipe.approve');
    Route::patch('/reject-recipe/{recipe_id}', [RecipeController::class, 'reject'])->name('recipe.reject');

});
