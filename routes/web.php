<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\EstablecimientoController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('dashboard');

})->name('dashboard');

Route::group(['middleware' => ['auth','verified']], function () {

    /* Fotos */
    Route::post('/imagenes/store', [FotoController::class, 'store'])->name('imagenes.store');
    Route::post('/imagenes/destroy', [FotoController::class, 'destroy'])->name('imagenes.destroy');

    /* Establecimientos */
    Route::get('/establecimientos/mis_establecimientos', [EstablecimientoController::class, 'misEstablecimientos'])->name('establecimientos.mis_establecimientos');
    Route::get('/establecimientos/create', [EstablecimientoController::class, 'create'])->name('establecimientos.create');
    Route::get('/establecimientos/edit/{establecimiento}', [EstablecimientoController::class, 'edit'])->name('establecimientos.edit');
    Route::post('/establecimientos/destroy/{establecimiento}', [EstablecimientoController::class, 'destroy'])->name('establecimientos.destroy');

    /* Cupones */
    Route::get('/cupones/mis_cupones', [CuponController::class, 'misCupones'])->name('cupones.mis_cupones');
    Route::get('/cupones/create', [CuponController::class, 'create'])->name('cupones.create');
    Route::get('/cupones/edit/{cupon}', [CuponController::class, 'edit'])->name('cupones.edit');
    Route::get('/cupones/edit/{cupon}', [CuponController::class, 'edit'])->name('cupones.edit');
    Route::post('/cupones/destroy/{cupon}', [CuponController::class, 'destroy'])->name('cupones.destroy');
});


Route::get('/', [CuponController::class, 'index'])->name('cupon.index');
Route::get('/cupon/{cupon}', [CuponController::class, 'show'])->name('cupones.show');
Route::get('/category/{category}', [CuponController::class, 'category'])->name('cupones.category');
Route::get('/tag/{tag}', [CuponController::class, 'tag'])->name('cupones.tag');
Route::get('/categoria/{category}', [CuponController::class, 'categoria'])->name('cupones.categoria');

Route::get('/establecimientos/{establecimiento}', [EstablecimientoController::class, 'show'])->name('establecimientos.show');

Route::get('/aviso_de_privacidad', [InformacionController::class, 'aviso_de_privacidad'])->name('aviso_de_privacidad');
Route::get('/terminos_y_condiciones_de_uso', [InformacionController::class, 'terminos_y_condiciones_de_uso'])->name('terminos_y_condiciones_de_uso');
