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
Route::get('/admin_login', function () {    

    return view('admin_login');
});

Route::get('/about', function () {
    return view('about');
});

Route::post('/submit', [AdminController::class, 'login']);

Route::get('/dashboard', function () {
    if (!session()->has('admin_id')) {
        return redirect('/admin_login');
    }
    return view('dashboard');
});

Route::get('/user-register', function () {
    return view('user-register');
});
// Route::post('/user_register', [AdminController::class, 'login']);
