<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataTableController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/datatable/tags', [DataTableController::class, 'tags'])->name('datatable.tags');
Route::get('/datatable/categories', [DataTableController::class, 'categories'])->name('datatable.categories');
Route::get('/datatable/users', [DataTableController::class, 'users'])->name('datatable.users');
Route::get('/datatable/establecimientos', [DataTableController::class, 'establecimientos'])->name('datatable.establecimientos');
Route::get('/datatable/cupones', [DataTableController::class, 'cupones'])->name('datatable.cupones');
Route::get('/datatable/codigos', [DataTableController::class, 'codigos'])->name('datatable.codigos');
Route::get('/datatable/comentarios', [DataTableController::class, 'comentarios'])->name('datatable.comentarios');
