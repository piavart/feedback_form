<?php

use Illuminate\Http\Request;

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

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::middleware('auth:api')->group(function () {
        // информация о пользователе
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});


Route::post('/feedback-create', 'FeedbackController@FeedbackCreate');
Route::get('/get-feedbacks', 'FeedbackController@GetFeedbacks');
Route::post('/feedback-complete', 'FeedbackController@FeedbackComplete');
