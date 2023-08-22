<?php

use App\Http\Controllers\Auth\AuthController;
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

// Authentication Routes
Route::get('/register', [AuthController::class, 'showUserRegistrationPage'])->name('showUserRegistrationPage');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/login', [AuthController::class, 'showloginPage'])->name('showloginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Admin Routes:
Route::middleware(['auth'])->group(function () {

    // Dashboard
    // Route::get('/admin', function(){      
    //     return redirect()->route('admin.event.index');
    // });

   
    // // Event
    // Route::get('/admin/events', [EventController::class, 'index'])->name('admin.event.index');
    // Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.event.create');
    // Route::get('/admin/events/{id}', [EventController::class, 'show'])->name('admin.event.single');
    // Route::post('/admin/events', [EventController::class, 'store'])->name('admin.event.store');
    // Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    // Route::put('/admin/events/{id}', [EventController::class, 'update'])->name('admin.event.update');
    // Route::post('/admin/events/reserve/{id}', [EventController::class, 'reserve'])->name('admin.event.reserve');

});