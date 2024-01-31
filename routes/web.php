<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\MessageController;
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
    return view('guests.welcome');
});

Route::get('/admin/admin', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified'])->name('admin.admin');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

/* ->prefix("admin") = prefisso admin */
/* ->name("admin.") = nel name come prefisso admin. */
/* Route::resource("xyz", XyzController::class); = creazione di tutte le rotte con  /admin/xyz e il name admin.xyz */
Route::middleware(["auth", "verified"])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::resource("apartments", ApartmentController::class);
        Route::resource("messages", MessageController::class);
    });

require __DIR__.'/auth.php';
