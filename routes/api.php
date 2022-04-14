<?php

use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;

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

 Route::post('login', [PassportAuthController::class, 'login'])->name('auth.login');
 Route::post('savepost', [\App\Http\Controllers\PostsController::class, 'index']);
Route::get('post', [\App\Http\Controllers\PostsController::class, 'getposts']);
Route::post('postdel/{id}', [\App\Http\Controllers\PostsController::class, 'destroy']);
Route::get('showpost/{id}', [\App\Http\Controllers\PostsController::class, 'showpost']);
Route::post('filedelete/{id}', [\App\Http\Controllers\PostsController::class, 'destroyfile']);
Route::post('updatepost/{id}', [\App\Http\Controllers\PostsController::class, 'update']);
Route::get('/livesearch', [\App\Http\Controllers\PostsController::class, 'searching']);
Route::get('/searchdata/{id}', [\App\Http\Controllers\PostsController::class, 'searchdata']);

Route::middleware('auth:api')->group(function () {
    Route::get('me', [PassportAuthController::class, 'me'])->name('auth.me');
    Route::post('logout', [PassportAuthController::class, 'logout'])->name('auth.logout');
});
