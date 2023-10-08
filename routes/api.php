<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/users', UserController::class);
Route::apiResource('/stores', StoreController::class);
Route::apiResource('/books', BookController::class);
Route::apiResource('/socials', SocialController::class);
Route::apiResource('/categories', CategoryController::class);
















// Route::get('/users', [UserController::class, 'index']);
// Route::get('/user/{user:id}', [UserController::class, 'show']);
// Route::post('/user', [UserController::class, 'store']);
// Route::delete('/user/delete/{id}', [UserController::class, 'delete']);
// Route::put('/user/update/{id}', [UserController::class, 'update']);


// Route::get('/stores', [StoreController::class, 'index']);
// Route::get('/store/{store:id}', [StoreController::class, 'show']);
// Route::post('/store', [StoreController::class, 'store']);
// Route::put('/store/{store:id}', [StoreController::class, 'update']);

Route::get('/book/{filename}', [UploadController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);


