<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;
use App\Models\User;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $users = User::latest()->take(5)->get();
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::group(['prefix' => 'User'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/Create', [UserController::class, 'create'])->name('user.create');
        Route::post('/Store', [UserController::class, 'store'])->name('user.store');
        Route::get('/Edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/Update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/Delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::group(['prefix' => 'Medicine'], function () {
        Route::get('/', [MedicineController::class, 'index'])->name('medicine');
        Route::get('/Create', [MedicineController::class, 'create'])->name('medicine.create');
        Route::post('/Store', [MedicineController::class, 'store'])->name('medicine.store');
        Route::get('/Edit/{id}', [MedicineController::class, 'edit'])->name('medicine.edit');
        Route::post('/Update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
        Route::get('/Delete/{id}', [MedicineController::class, 'delete'])->name('medicine.delete');
    });

    Route::group(['prefix' => 'Doctor'], function () {
        Route::get('/', [DoctorController::class, 'index'])->name('doctor');
        Route::get('/Create', [DoctorController::class, 'create'])->name('doctor.create');
        Route::post('/Store', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('/Edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::post('/Update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
        Route::get('/Delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
