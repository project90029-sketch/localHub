<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Business\ProductController;

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

/*Login */
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/submit', [AdminController::class, 'login']);

// Route::get('/dashboard', function () {
//     if (!session()->has('admin_id')) {
//         return redirect('/admin_login');
//     }
//     return view('dashboardKoushik');
// });
Route::get('/register', function () {
    return view('user-register');
})->name('register');


//professional
Route::get('/professional', function () {
    return view('professional.professional');
})->name('professional.dashboard');

Route::get('/professional-settings', function () {
    return view('professional.professional-settings');
})->name('professional');

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



Route::get('/business/dashboard', [ProductController::class, 'dashboard'])
    ->name('business.businessDashboard');

Route::get('/business/profile', function () {
    return view('business.profile');
});


Route::post('/products/store', [ProductController::class, 'store']);


Route::get('/business/orders', function () {
    return view('business.orders');
});

Route::get('/business/analytics', function () {
    return view('business.analytics');
});

Route::get('/business/network', function () {
    return view('business.network');
});


/* Route::get('/resident/dashboard', function () {
    return view('resident.dashboard');
})->name('resident.dashboard'); */

// Profile page
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('admin.session');
