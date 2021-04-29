<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class,'index']);
Route::get('/{product}', [ProductController::class,'show']);
Route::post('/', [ProductController::class,'store']);
Route::put('/{product}', [ProductController::class,'update']);
Route::delete('/{product}', [ProductController::class,'destroy']);

