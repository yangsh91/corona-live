<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
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
Route::get('/getNotify', [ContentController::class, 'getNotify']);

Route::get('/fcm', [FcmController::class, 'index']);
Route::post('/saveToken', [FcmController::class, 'saveToken']);
Route::get('/sendNoti', [FcmController::class, 'sendNoti']);

Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::get('/auth/logout', [UserController::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
    Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');
    Route::post('auth/saveUserInfo', [UserController::class, 'saveUserInfo'])->name('auth.saveUserInfo');
    Route::post('/auth/findUserId', [UserController::class, 'findUserId'])->name('auth.findUserId');
    Route::post('/auth/findUserPass', [UserController::class, 'findUserPass'])->name('auth.findUserPass');
});

