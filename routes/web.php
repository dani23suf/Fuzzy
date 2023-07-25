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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/z', [App\Http\Controllers\DashboardController::class, 'z'])->name('z');
Route::get('/y', [App\Http\Controllers\DashboardController::class, 'y'])->name('y');

Route::middleware(['auth'])->group(
    function () {

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/perhitungan', [App\Http\Controllers\PerhitunganController::class, 'index'])->name('dashboard');

Route::get('/importDataBalita', [App\Http\Controllers\PerhitunganController::class, 'importDataBalita'])->name('importDataBalita');
Route::post('/import', [App\Http\Controllers\PerhitunganController::class, 'import'])->name('import');

// Rules
Route::get('/list-rules', [App\Http\Controllers\RuleController::class, 'index'])->name('list-rules');
Route::get('/create-rules', [App\Http\Controllers\RuleController::class, 'create'])->name('create-rules');
Route::post('/store-rules', [App\Http\Controllers\RuleController::class, 'store'])->name('store-rules');
Route::get('/edit-rules/{id?}', [App\Http\Controllers\RuleController::class, 'edit'])->name('edit-rules');
Route::post('/update-rules', [App\Http\Controllers\RuleController::class, 'update'])->name('update-rules');
Route::delete('/destroy-rules/{id?}', [App\Http\Controllers\RuleController::class, 'destroy'])->name('destroy-rules');

// Balita
Route::get('/list-balita', [App\Http\Controllers\BalitaController::class, 'index'])->name('list-balita');
Route::get('/create-balita', [App\Http\Controllers\BalitaController::class, 'create'])->name('create-balita');
Route::post('/store-balita', [App\Http\Controllers\BalitaController::class, 'store'])->name('store-balita');
Route::get('/edit-balita/{id?}', [App\Http\Controllers\BalitaController::class, 'edit'])->name('edit-balita');
Route::post('/update-balita', [App\Http\Controllers\BalitaController::class, 'update'])->name('update-balita');
Route::delete('/destroy-balita/{id?}', [App\Http\Controllers\BalitaController::class, 'destroy'])->name('destroy-balita');


Route::get('/perhitungan', [App\Http\Controllers\PerhitunganController::class, 'index'])->name('perhitungan');
Route::post('/proses-perhitungan', [App\Http\Controllers\PerhitunganController::class, 'perhitungan'])->name('proses-perhitungan');

Route::get('/hasil', [App\Http\Controllers\HasilController::class, 'index'])->name('list-hasil');
Route::delete('/destroy-hasil/{id?}', [App\Http\Controllers\HasilController::class, 'destroy'])->name('destroy-hasil');


Route::get('/list-user', [App\Http\Controllers\UserController::class, 'index'])->name('list.user');
Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser'); // edit User
Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser'); // update User
Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser'); // Delete Role

    }); 







