<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;



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


// Rotte Pubbliche
Route::get('/', function () {
    return view('welcome');
});

// Rotte protette da autenticazione
// Prefisso settato come admin -> con name do nome che inizia con admin. (artisan route:list)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function() {
        return view('admin.dashboard'); //qui admin.dashboard è il nome della cartella non della rotta
    })->name('dashboard');// <-- Modificare home in RouteServiceProvider come /admin/dashboard

    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);
});

// Rotte prefisse autenticazione
require __DIR__.'/auth.php';
