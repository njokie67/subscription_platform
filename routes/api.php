<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::post('create_post', 'App\Http\Controllers\PostsController@create_post');
Route::post('create_subscription', 'App\Http\Controllers\SubscriptionsController@create_subscription');

// Route::get('/create_post',[PostsController::class, 'create_post']);
