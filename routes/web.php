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
    return view('professional');
});

Route::get('/professional-settings', function () {
    return view('professional-settings');
});

Route::get('/my-services', function () {
    return view('my-services');
});


/*Business Routes */

Route::get('/business/dashboard', function () {
    return view('business.dashboard');
});

Route::get('/business/profile', function () {
    return view('business.profile');
});

Route::get('/business/inventory', function () {
    return view('business.inventory');
});

Route::get('/business/orders', function () {
    return view('business.orders');
});

Route::get('/business/analytics', function () {
    return view('business.analytics');
});

Route::get('/business/network', function () {
    return view('business.network');
});
