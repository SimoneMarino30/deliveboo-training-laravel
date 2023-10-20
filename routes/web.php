<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RestaurantController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('restaurants', RestaurantController::class)->parameters(['restaurants' => 'restaurant:id']);
Route::get('/admin/index', [RestaurantController::class, 'index'])->name('index');
Route::get('admin/restaurants/form', [RestaurantController::class, 'create'])->name('restaurants.form');
Route::get('/restaurants/show/{id}', [RestaurantController::class, 'show'])->name('restaurants.show');


// Route::get('/restaurants/index', [RestaurantController::class, 'index'])->name('admin.restaurants.index');
// Route::post('/restaurants/store', [RestaurantController::class, 'store'])->name('admin.restaurants.store');
// Route::get('/restaurants/edit/{id}', [RestaurantController::class, 'edit'])->name('admin.restaurants.edit');
// Route::put('/restaurants/show/{id}', [RestaurantController::class, 'update'])->name('admin.restaurants.update');
// Route::get('/restaurants/form', [RestaurantController::class, 'create'])->name('admin.restaurants.form');



require __DIR__ . '/auth.php';
