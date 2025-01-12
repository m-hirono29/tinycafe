<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

use App\Http\Controllers\Admin\CafeController;
    Route::controller(CafeController::class)->prefix('admin')->middleware('auth')->group(function() {
    Route::get('cafe', 'index')->name('admin.cafe.index');
});

use App\Http\Controllers\Admin\MenuController;
    Route::controller(MenuController::class)->prefix('admin')->middleware('auth')->group(function() {
    Route::get('menu/add', 'add')->name('admin.menu.add');
    Route::post('menu/create', 'create')->name('menu.create');
    Route::get('menu', 'index')->name('admin.menu.index');
    Route::get('menu/edit', 'edit')->name('admin.menu.edit');
    Route::post('menu/edit', 'update')->name('admin.menu.update');
});

use App\Http\Controllers\Admin\InformationController;
    Route::controller(InformationController::class)->prefix('admin')->middleware('auth')->group(function() {
    Route::get('information/add', 'add')->name('admin.information.add');
    Route::post('information/create', 'create')->name('information.create');
    Route::get('information', 'index')->name('admin.information.index');
    Route::get('information/edit', 'edit')->name('admin.information.edit');
    Route::post('information/edit', 'update')->name('admin.information.update');
});

use App\Http\Controllers\Admin\ReservationController;
    Route::controller(ReservationController::class)->prefix('admin')->group(function() {
    Route::get('reservation', 'index')->name('admin.reservation.index');
    Route::get('admin/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('admin.reservation.edit');
    Route::post('reservation/update/{id}', 'update')->name('admin.reservation.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\CafeController as PublicCafeController;
    Route::get('/', [PublicCafeController::class, 'index'])->name('information.index');
    Route::get('/concept', [PublicCafeController::class, 'concept'])->name('concept');
    Route::get('/information/{id}', [App\Http\Controllers\CafeController::class, 'show'])->name('information.show');
    Route::get('/reservation/create', [PublicCafeController::class, 'create'])->name('reservation.create');

use App\Http\Controllers\InformationController as PublicInformationController;
    Route::get('/information', [PublicInformationController::class, 'index'])->name('information.index');

use App\Http\Controllers\MenuController as PublicMenuController;
    Route::get('/menu', [PublicMenuController::class, 'index'])->name('menu.index');

use App\Http\Controllers\ReservationController as PublicReservationController;
    Route::get('/reservation/create', [PublicReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store', [PublicReservationController::class, 'store'])->name('reservation.store');
    Route::get('/api/get-people-count', [PublicReservationController::class, 'getPeopleCount']);