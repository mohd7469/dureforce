<?php

use Illuminate\Support\Facades\Route;


Route::middleware('verified')->group(function () {

    Route::get('/user', 'CommonProfileController@profile')->name('user.basic.profile');
    Route::post('/user-profile-update', 'CommonProfileController@editUserBasics')->name('user.profile.basics.edit');
    Route::post('/user-profile', 'CommonProfileController@saveUserBasics')->name('user.profile.basics.save');
    Route::get('/profile-basics-data', 'CommonProfileController@getProfileData')->name('profile.basics.data');
    Route::get('/get-cities', 'CommonProfileController@getCities')->name('get-cities');
    Route::get('/user-profile/{id?}', 'CommonProfileController@getUserProfile')->name('seller.profile');


});