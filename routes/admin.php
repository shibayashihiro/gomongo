<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest', 'namespace' => 'General'], function () {
    Route::post('login', 'GeneralController@login')->name('login_post');
    Route::get('login', 'GeneralController@Panel_Login')->name('login');
    Route::get('forgot_password', 'GeneralController@Panel_Pass_Forget')->name('forgot_password');
    Route::post('forgot_password', 'GeneralController@ForgetPassword')->name('forgot_password_post');
});

Route::group(['middleware' => 'Is_Admin'], function () {
    Route::get('/', 'General\GeneralController@Admin_dashboard')->name('dashboard');
    Route::get('/profile', 'General\GeneralController@get_profile')->name('profile');
    Route::post('/profile', 'General\GeneralController@post_profile')->name('post_profile');
    Route::get('/update_password', 'General\GeneralController@get_update_password')->name('get_update_password');
    Route::post('/update_password', 'General\GeneralController@update_password')->name('update_password');
    Route::get('/site_settings', 'General\GeneralController@get_site_settings')->name('get_site_settings');
    Route::post('/site_settings', 'General\GeneralController@site_settings')->name('site_settings');
    Route::group(['namespace' => 'Admin'], function () {
        // User Module
        Route::get('user/listing', 'UsersController@listing')->name('user.listing');
        Route::get('user/status_update/{id}', 'UsersController@status_update')->name('user.status_update');
        Route::resource('user', 'UsersController')->except(['create', 'store']);

        //New User Module
        Route::get('new-user/listing', 'NewUsersController@listing')->name('new-user.listing');
        Route::get('new-user/status_update/{id}', 'NewUsersController@status_update')->name('new-user.status_update');
        Route::resource('new-user', 'NewUsersController')->except(['create', 'store']);

        // Subscription Plans
        Route::get('subscription/listing', 'SubscriptionPlansController@listing')->name('subscription.listing');
        Route::get('subscription/status_update/{id}', 'SubscriptionPlansController@status_update')->name('subscription.status_update');
        Route::resource('subscription', 'SubscriptionPlansController')->except(['create', 'store']);

        // Transaction
        Route::get('transaction/listing', 'TransactionsController@listing')->name('transaction.listing');
        Route::resource('transaction', 'TransactionsController')->except(['create', 'store']);

        // Pending Finance
        Route::get('pending_finance/listing', 'FinanceController@listing_pending_finance')->name('pending_finance.listing');
        Route::get('pending_finance/index', 'FinanceController@index_pending_finance')->name('pending_finance.index');
        Route::get('pending_finance/view/{id}', 'FinanceController@view_pending_finance')->name('pending_finance.view');
        Route::post('pending_finance/status_change', 'FinanceController@status_change_pending_finance')->name('pending_finance.status_change');

        // Pending Finance
        Route::get('accepted_finance/listing', 'FinanceController@listing_accepted_finance')->name('accepted_finance.listing');
        Route::get('accepted_finance/index', 'FinanceController@index_accepted_finance')->name('accepted_finance.index');
        Route::get('accepted_finance/view/{id}', 'FinanceController@view_accept_finance')->name('accepted_finance.view');

        // Content Module
        Route::resource('content', 'ContentController')->except(['show', 'create', 'store', 'destroy']);
        Route::get('content/listing', 'ContentController@listing')->name('content.listing');
    });
});

