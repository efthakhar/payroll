<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LeaveRequestController;
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
    Route::get('/admin', function(){      
       // return redirect()->route('admin.dashboard.overview');
        return view('admin.dashboard.overview');
    });

   
    // // Event
    Route::get('/admin/leave-requests', [LeaveRequestController::class, 'index'])->name('admin.leave_request.index');
    Route::get('/admin/leave-requests/create', [LeaveRequestController::class, 'create'])->name('admin.leave_request.create');
    Route::post('/admin/leave-requests', [LeaveRequestController::class, 'store'])->name('admin.leave_request.store');
    Route::post('/admin/leave-approve/{id}', [LeaveRequestController::class, 'approve']);
    Route::post('/admin/leave-reject/{id}', [LeaveRequestController::class, 'reject']);

});