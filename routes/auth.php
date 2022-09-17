<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('test', function () {
    return "auth route";
});

//Auth::routes();

// Route::name('user.')->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('/login', 'Auth\LoginController@login');
    // Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Route::get('verify', 'Auth\AccountVerifyController@showVerifyForm')->name('verification.notice');

    // Route::post('/email/verification-notification', function (Request $request) {
    //     $request->user()->sendEmailVerificationNotification();
    //     $notify[] = ['success', 'Verification link sent!'];
    //     return back()->withNotify($notify);
    // })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');
    // Route::post('check-mail', 'Auth\RegisterController@checkUser')->name('checkUser');

    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetCodeEmail')->name('password.email');
    // Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code.verify');
    // Route::get('password/resend-code', 'Auth\ForgotPasswordController@resendCodeEmail')->name('password.code.resend');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify.code');
// });