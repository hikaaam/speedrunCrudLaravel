<?php

use App\Http\Controllers\booksController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("author", [userController::class, 'index']);
Route::post("author", [userController::class, 'store']);
Route::put("author/{id}", [userController::class, 'update']);
Route::delete("author/{id}", [userController::class, 'destroy']);

Route::get("book", [booksController::class, 'index']);
Route::post("book", [booksController::class, 'store']);
Route::put("book/{id}", [booksController::class, 'update']);
Route::delete("book/{id}", [booksController::class, 'destroy']);
