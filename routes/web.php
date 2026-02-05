<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

    return view('landing');
});

// Route added for team section - commented out as requested
Route::get('/about', function () {
    return view('about');
});

Route::get('/admin_login', function () {

    return view('admin_login');
});
Route::post('/submit', [AdminController::class, 'login']);
Route::get('/dashboard', function () {
    if (!session()->has('admin_id')) {
        return redirect('/admin_login');
    }
    return view('dashboard');
});

Route::get('/professional', function () {
    return view('professional.professional');
});

Route::get('/professional-settings', function () {
    return view('professional.professional-settings');
});

Route::get('/my-services', function () {
    return view('professional.my-services');
});

Route::get('/appointments', function () {
    return view('professional.appointments');
});

Route::get('/earnings', function () {
    return view('professional.earnings');
});

Route::get('/reviews', function () {
    return view('professional.reviews');
});

Route::get('/messages', function () {
    return view('professional.messages');
});
