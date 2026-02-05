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
    return view('dashboardKoushik');
});
Route::get('/register', function () {
    return view('user-register');
})->name('register');

