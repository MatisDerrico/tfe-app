<?php

use Inertia\Inertia;
use App\Models\Booking;
use App\Models\Employee;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CguController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GallerieController;
use App\Http\Controllers\TimeDisableController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\ServiceAdminController;
use App\Http\Controllers\EmployeeBookingController;
use App\Http\Controllers\EmployeeHolidaysController;
use App\Http\Controllers\InformationLegalesController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('index'); // On donne un nom à la route ce qui permet des appel par le nom et non par l'url

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('auth')->name('dashboard');

// Pour accéder à la route Employe/bookings il faudra passé le middleware authentification et isEmployee
Route::middleware('auth','isEmployee')->group(function () {
    Route::get('/employee/bookings', [EmployeeBookingController::class, 'index'])->name('employeeBooking.index');

});

Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::get('/holidays/{user_id}', [EmployeeHolidaysController::class, 'show']);
Route::get('/time/{date}/{employee}', TimeDisableController::class);
Route::post('bookings', [BookingController::class, 'store'])->name('booking.store');
Route::get('booking/confirmation', [BookingController::class, 'confirmation'])->name('booking.confirmation');
Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
Route::get('/gallerie', GallerieController::class);
Route::get('/staff', StaffController::class);
Route::get('/cgu', CguController::class)->name('cgu.index');
Route::get('/informationlegales', InformationLegalesController::class)->name('cgu.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/booking/availability', [BookingController::class, 'availability']);

Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('/services/create', [ServiceAdminController::class, 'create'])->name('service.create');
    Route::get('/services', [ServiceAdminController::class, 'index'])->name('serviceAdmin.index');
    Route::post('/services', [ServiceAdminController::class, 'store'])->name('service.store');
    Route::delete('/services/{service}', [ServiceAdminController::class, 'destroy'])->name('service.destroy');
    Route::get('/services/{service}/edit', [ServiceAdminController::class, 'edit'])->name('service.edit');
    Route::put('/services/{service}', [ServiceAdminController::class, 'update'])->name('service.update');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employees/{employe}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{employe}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employees/{employe}/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employeesHoliday', [EmployeeHolidaysController::class, 'index'])->name('employeeHoliday.index');
    Route::get('/employeesHoliday/create', [EmployeeHolidaysController::class, 'create'])->name('employeeHoliday.create');
    Route::post('/employeesHoliday', [EmployeeHolidaysController::class, 'store'])->name('employeeHoliday.store');
    Route::get('/employeesHoliday/{holiday}/edit', [EmployeeHolidaysController::class, 'edit'])->name('employeesHoliday.edit');
    Route::put('/employeesHoliday/{holiday}', [EmployeeHolidaysController::class, 'update'])->name('employeesHoliday.update');
    Route::delete('/employeesHoliday/{holiday}/delete', [EmployeeHolidaysController::class, 'destroy'])->name('employeesHoliday.destroy');

    // Routes de mises à jour du profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('employee')->middleware('auth','isEmployee')->group(function () {
    Route::get('/bookings', [EmployeeBookingController::class, 'index'])->name('EmployeeBooking.index');
});

Route::get('/test_mail', function() {
    Mail::to('matisderrico@hotmail.com')->send(new BookingConfirmation());
    Mail::to('mattou2812@gmail.com')->send(new BookingConfirmation());
});

require __DIR__.'/auth.php';
