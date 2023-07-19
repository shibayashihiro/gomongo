<?php

use App\Http\Requests\ImportAutoTradersData;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Api\V1', 'prefix' => 'V1'], function () {

    Route::post('login', 'GuestController@login');
    Route::post('signup', 'GuestController@signup');
    Route::post('forgot_password', 'GuestController@forgot_password');
    Route::get('content/{type}', 'GuestController@content');
    Route::post('forgot_password', 'GuestController@forgot_password');
    Route::post('check_ability', 'GuestController@check_ability');
    Route::post('version_checker', 'GuestController@version_checker');

    //            Country Selection apis here
    Route::group(['middleware' => 'ApiTokenChecker'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('getProfile', 'UserController@getProfile');
            Route::get('logout', 'UserController@logout');
        });
    });
});

Route::post('v1/updateDB', function () {
    // $importRequest = new ImportAutoTradersData(null);
    // $importRequest->importDataFromFile();
    return response()->json(['msg' => 'success']);
});
