<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Titolare\DashboardController;
use App\Http\Controllers\Titolare\MagazzinoController;
use App\Http\Controllers\Titolare\ChiusureController;
use App\Http\Controllers\Titolare\DipendenteController;
use App\Http\Controllers\Titolare\CassaController;

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\AdminDashboardController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});




Route::middleware(['auth'])->prefix('titolare')->name('titolare.')->group(function () {

    // Dashboard generale
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Locali
    Route::get('/locale/create', [DashboardController::class, 'createLocale'])->name('locale.create');
    Route::post('/locale', [DashboardController::class, 'storeLocale'])->name('locale.store');
    Route::get('/locale/{locale}', [DashboardController::class, 'showLocale'])->name('locale.show');

    // Magazzino
    Route::get('/locale/{locale}/magazzino/create', [MagazzinoController::class, 'create'])->name('magazzino.create');
    Route::post('/locale/{locale}/magazzino', [MagazzinoController::class, 'store'])->name('magazzino.store');
    Route::get('/magazzino/{item}/edit', [MagazzinoController::class, 'edit'])->name('magazzino.edit');
    Route::put('/magazzino/{item}', [MagazzinoController::class, 'update'])->name('magazzino.update');
    Route::delete('/magazzino/{item}', [MagazzinoController::class, 'destroy'])->name('magazzino.destroy');

    // Chiusure
    Route::get('/locale/{locale}/chiusure/create', [ChiusureController::class, 'create'])->name('chiusure.create');
    Route::post('/locale/{locale}/chiusure', [ChiusureController::class, 'store'])->name('chiusure.store');
    Route::get('/chiusure/{chiusura}/edit', [ChiusureController::class, 'edit'])->name('chiusure.edit');
    Route::put('/chiusure/{chiusura}', [ChiusureController::class, 'update'])->name('chiusure.update');
    Route::delete('/chiusure/{chiusura}', [ChiusureController::class, 'destroy'])->name('chiusure.destroy');

    // Dipendenti
    Route::get('/locale/{locale}/dipendenti/create', [DipendenteController::class, 'create'])->name('dipendenti.create');
    Route::post('/locale/{locale}/dipendenti', [DipendenteController::class, 'store'])->name('dipendenti.store');
    Route::get('/dipendenti/{dipendente}/edit', [DipendenteController::class, 'edit'])->name('dipendenti.edit');
    Route::put('/dipendenti/{dipendente}', [DipendenteController::class, 'update'])->name('dipendenti.update');
    Route::delete('/dipendenti/{dipendente}', [DipendenteController::class, 'destroy'])->name('dipendenti.destroy');

    Route::post('/titolare/locale/{locale}/casse', [CassaController::class, 'store'])->name('titolare.casse.store');
    Route::post('/locale/{locale}/casse', [CassaController::class, 'store'])->name('casse.store');
});
