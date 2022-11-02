<?php


use App\Http\Controllers\Buyer\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('chat.')->prefix('chat')->group(function () {
    Route::middleware(['verified'])->group(function () { 
        Route::get('/get_users', [\App\Http\Controllers\Chat\ChatController::class,'getUsers'])->name('view');

    });
});
