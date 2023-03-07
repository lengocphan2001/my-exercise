<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function (){
        Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('index');
        Route::get('/make', [\App\Http\Controllers\User\UserController::class, 'make'])->name('make');
        Route::post('/change', [\App\Http\Controllers\User\UserController::class, 'change'])->name('change');
    });
    Route::get('/department', [App\Http\Controllers\Department\DepartmentController::class, 'index'])->name('department.index');
    Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::group(['prefix' => 'department', 'as' => 'department.', 'namespace' => 'Department'], function () {
            Route::get('/', [App\Http\Controllers\Department\DepartmentController::class,'index'])->name('index');
            Route::get('add', [App\Http\Controllers\Department\DepartmentController::class,'add'])->name('add');
            Route::post('store', [App\Http\Controllers\Department\DepartmentController::class, 'store'])->name('store');
            Route::get('{id}', [App\Http\Controllers\Department\DepartmentController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit', [App\Http\Controllers\Department\DepartmentController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [App\Http\Controllers\Department\DepartmentController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {
            Route::get('/', [App\Http\Controllers\User\UserController::class, 'index'])->name('index');
            Route::get('create', [App\Http\Controllers\User\UserController::class, 'create'])->name('create');
            Route::post('store', [App\Http\Controllers\User\UserController::class, 'store'])->name('store');
            Route::get('{id}', [App\Http\Controllers\User\UserController::class, 'destroy'])->name('destroy');
            Route::get('{id}/edit', [App\Http\Controllers\User\UserController::class, 'edit'])->name('edit');
            Route::put('{id}/update', [App\Http\Controllers\User\UserController::class, 'update'])->name('update');
        });
    });
});
