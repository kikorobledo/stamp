<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CodigosController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComentarioController;
use App\Http\Controllers\Admin\EstablecimientoController;

Route::group(['middleware' => ['administrador','auth','verified']], function () {

    Route::get('', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('establecimientos', EstablecimientoController::class)->names('admin.establecimientos');
    Route::resource('roles', RoleController::class)->names('admin.roles');
    Route::resource('tags', TagController::class)->names('admin.tags');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('cupons', CuponController::class)->names('admin.cupones');
    Route::resource('codigos', CodigosController::class)->names('admin.codigos');
    Route::resource('comentarios', ComentarioController::class)->names('admin.comentarios');
    Route::resource('banners', BannerController::class)->names('admin.banners');
});
