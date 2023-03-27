<?php

use App\Http\Controllers\v1;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('logout', [AuthController::class, 'logout']);

    Route::namespace('App\Http\Controllers\v1')->prefix('v1')->group(function(){
        Route::prefix('department')->namespace('department')->group(function (){
            Route::post('/', StoreController::class)->name('department.store')->middleware('can:create_department');
            Route::get('/', IndexController::class)->name('department.index')->middleware('can:show_department');
            Route::get('/all', 'IndexController@all')->name('department.all');
            Route::get('/one/{id}', 'IndexController@getDepartment')->name('department.one');
            Route::patch('/{department}', UpdateController::class)->name('department.update')->middleware('can:edit_department');
        });

        Route::prefix('speciality')->namespace('speciality')->group(function (){
            Route::post('/', IndexController::class)->name('speciality.index');
            Route::post('/create', StoreController::class)->name('speciality.store');
            Route::patch('/{speciality}', UpdateController::class)->name('speciality.update');
            Route::get('/one/{id}', 'IndexController@one')->name('speciality.one');
        });

        Route::prefix('cabinet')->namespace('cabinet')->group(function (){
            Route::post('/', StoreController::class)->name('cabinet.store');
            Route::get('/', IndexController::class)->name('cabinet.index');
            Route::get('/all', 'IndexController@all')->name('cabinet.all');
            Route::get('/one/{id}', 'IndexController@getCabinet')->name('cabinet.one');
            Route::patch('/{cabinet}', UpdateController::class)->name('cabinet.update');
        });

        Route::prefix('area')->namespace('area')->group(function (){
            Route::post('/', IndexController::class)->name('area.index');
            Route::post('/create', StoreController::class)->name('area.store');
            Route::patch('/{area}', UpdateController::class)->name('area.update');
            Route::get('/one/{id}', 'IndexController@one')->name('area.one');
        });

        Route::prefix('user')->namespace('user')->group(function (){
            Route::post('/', IndexController::class)->name('user.index');
            Route::get('/one', 'IndexController@one')->name('user.one');

            //       Route::post('/create', StoreController::class)->name('speciality.store');
       //     Route::patch('/{speciality}', UpdateController::class)->name('speciality.update');
         //   Route::get('/one/{id}', 'IndexController@one')->name('speciality.one');
        });

    });


});

