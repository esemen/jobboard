<?php

use App\Http\Controllers\Api\Auth\OauthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CvController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);

Route::get('/', function () {
    return view('index');
})->name('home')->middleware('user.mode');


// Social Login
Route::middleware(['guest'])->group(function () {
    Route::get('/login/{provider:slug}', [OauthController::class, 'redirect'])->name('social-login');
    Route::get('/login/{provider:slug}/callback', [OauthController::class, 'callback']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['user.mode'])->group(function () {
        Route::get('home', fn() => redirect(route('home')));

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile
        Route::prefix('profile')->group(function () {
            Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('edit', [ProfileController::class, 'update'])->name('profile.update');

            Route::resource('cv', CvController::class);
        });

        // Recruiters
        Route::prefix('recruiter')->group(function () {
            Route::resource('company', CompanyController::class);
            Route::resource('job', JobController::class);
        });
    });

    Route::prefix('profile')->group(function () {
        Route::get('mode-select', [ProfileController::class, 'modeSelect'])->name('profile.mode-select');
        Route::post('mode-select', [ProfileController::class, 'modeStore']);
    });
});
