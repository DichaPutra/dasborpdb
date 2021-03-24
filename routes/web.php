<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataKomoditiController;
use App\Http\Controllers\DataPdbController;
use App\Http\Controllers\KategoriSektorController;
use App\Http\Controllers\WilayahProvinsiController;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Auth::routes();

/*
 * Landing Page
 */
Route::get('/', [KategoriSektorController::class, 'index'])->name('home');
Route::get('/dashboard', [KategoriSektorController::class, 'index'])->name('dashboard');

Route::get('/contoh', [HomeController::class, 'index'])->name('contoh');
Route::post('importExcel', [HomeController::class, 'importExcel'])->name('importExcel');
Route::get('emptyExcel', [HomeController::class, 'emptyExcel'])->name('emptyExcel');
;

/*
 * Kategori Sektor
 */
Route::get('KategoriSektor', [KategoriSektorController::class, 'index'])->name('KategoriSektor');

/*
 * Wilayah Provinsi
 */
Route::get('WilayahProvinsi', [WilayahProvinsiController::class, 'index'])->name('WilayahProvinsi');

/*
 * Data Komoditi
 */
Route::get('DataKomoditi', [DataKomoditiController::class, 'index'])->name('DataKomoditi');

/*
 * Data PDRB
 */
Route::get('DataPdb', [DataPdbController::class, 'index'])->name('DataPdb');
Route::get('pdbFilter', [DataPdbController::class, 'pdbFilter'])->name('pdbFilter');
Route::post('ImportData', [DataPdbController::class, 'ImportData'])->name('ImportData');
Route::post('GenerateFormat', [DataPdbController::class, 'GenerateFormat'])->name('GenerateFormat');
Route::post('pdbDelete',[DataPdbController::class, 'pdbDelete'])->name('pdbDelete');

        

