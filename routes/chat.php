<?php


use App\Http\Controllers\Buyer\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('chat.')->prefix('chat')->group(function () {
    Route::middleware(['verified'])->group(function () { 

        Route::get('/user', 'CommonProfileController@userChat')->name('inbox');
        Route::get('/get_users', [\App\Http\Controllers\Chat\ChatController::class,'getUsers'])->name('users');
        Route::post('/messages', [\App\Http\Controllers\Chat\ChatController::class,'getUserChat'])->name('messges');
        Route::post('save/message', [\App\Http\Controllers\Chat\ChatController::class,'saveMessage'])->name('message.save');
        Route::delete('delete/message/{chat_message_id}', [\App\Http\Controllers\Chat\ChatController::class,'deleteMessage'])->name('message.save');

    });
});
