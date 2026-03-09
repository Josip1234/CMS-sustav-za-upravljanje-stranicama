<?php

use App\Http\Controllers\KontrolaAdminKorisnikaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
//ruta za prikaz liste korisnika koju može vidjeti samo admin
Route::get('admin/users',[KontrolaAdminKorisnikaController::class,'index'])->middleware('auth','administrator')
->name('admin.users.index');

Route::get('admin/users/{user}/edit',[KontrolaAdminKorisnikaController::class,'edit'])->name('admin.users.edit');
Route::put('admin/users/{user}',[KontrolaAdminKorisnikaController::class,'update'])->name('admin.users.update');
Route::delete('admin/users/{user}',[KontrolaAdminKorisnikaController::class,'destroy'])->name('admin.users.destroy');

require __DIR__.'/auth.php';
