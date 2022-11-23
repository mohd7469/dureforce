<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['verified'])->group(function () {
    Route::prefix('ticket')->group(function () {
        Route::get('/', 'TicketController@supportTicket')->name('ticket');
        Route::post('/ticket-validation', 'TicketController@validateTicket')->name('ticket.validate');
        Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
//    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
        Route::get('/create-ticket', 'TicketController@create')->name('ticket.create');
        Route::post('/store-ticket', 'TicketController@store')->name('ticket.store');
        Route::post('/store-ticket-comment/{ticket_no}', 'TicketController@storeComment')->name('ticket.comment.store');
//    Route::get('/view/{ticket}', 'TicketController@show')->name('ticket.view');
        Route::get('/view-ticket/{ticket}', 'TicketController@show')->name('ticket.view');
        Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
        Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
    });
});