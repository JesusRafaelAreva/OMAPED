<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::redirect('/', '/login'); // Redirect the main route '/' to '/login'

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Protect the '/welcome' route
Route::middleware('auth')->get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Route for generating PDF (assuming 'Read' controller)
Route::middleware(['auth', 'verified'])->get('/admin/omapeds/generate-pdf', [Read::class, 'generatePDF'])->name('admin.omapeds.generate-pdf');



Route::middleware(['auth', 'verified'])->get('/admin', function () {
    if (auth()->user()->role_id == 1) {
        abort(404); // Devuelve un error 404 si el role_id del usuario es 1
    } else {
        // Redirige a la ruta deseada para los usuarios que no tienen role_id igual a 1
        return redirect('/admin/admins'); // Ejemplo: redirige a la ruta '/admin/admins'
    }
});
