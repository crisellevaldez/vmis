<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ResidentController;

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

//Reports
Route::get('business-clearance',  [ResidentController::class, 'business']);
Route::get('medical-certificate',  [ResidentController::class, 'medical']);
Route::get('not-married',  [ResidentController::class, 'notmarried']);
Route::get('indigency',  [ResidentController::class, 'indigency']);

//Routes for navigation links
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return Inertia::render('Home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/residents', function () {
    return Inertia::render('Residents');
})->name('residents');

Route::middleware(['auth:sanctum', 'verified'])->get('/forms', function () {
    return Inertia::render('Forms');
})->name('forms');

Route::middleware(['auth:sanctum', 'verified'])->get('/census', function () {
    return Inertia::render('Census');
})->name('census');

Route::middleware(['auth:sanctum', 'verified'])->get('/houses', function () {
    return Inertia::render('Houses');
})->name('houses');