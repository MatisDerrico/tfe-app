<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\EmployeeBookingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Booking;
use App\Models\Employee;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route employée

// Pour accéder à la route Employe/bookings il faudra passé le middleware authentification et isEmployee

Route::middleware('auth','isEmployee')->group(function () {
    Route::get('/employee/bookings', [EmployeeBookingController::class, 'index'])->name('employeeBooking.index');

});

Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');
    // Route::get('/employees/{employee:id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::get('/employees/{employe}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{employe}', [EmployeeController::class, 'update'])->name('employee.update');
});

require __DIR__.'/auth.php';
