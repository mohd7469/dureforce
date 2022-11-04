<?php


use App\Http\Controllers\Buyer\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('chat.')->prefix('chat')->group(function () {
    Route::middleware(['verified'])->group(function () { 
        Route::get('/get_users', [\App\Http\Controllers\Chat\ChatController::class,'getUsers'])->name('view');
        Route::post('/messages', [\App\Http\Controllers\Chat\ChatController::class,'getUserChat'])->name('view');
        Route::post('save/message', [\App\Http\Controllers\Chat\ChatController::class,'saveMessage'])->name('view');

    });
});
