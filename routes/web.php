<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FcmController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ContentController::class, 'main']);
Route::get('/world', [ContentController::class, 'worldLive']);

Route::get('/region', [ContentController::class, 'regionApi']);
Route::get('/worldApi', [ContentController::class, 'worldApi']);

Route::get('/fcm', [FcmController::class, 'index']);
Route::get('/saveToken', [FcmController::class, 'saveToken']);
Route::get('/sendNoti', [FcmController::class, 'sendNoti']);