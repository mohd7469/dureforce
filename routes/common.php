<?php

use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ServiceController;
use App\Http\Controllers\Seller\SoftwareController;

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

    Route::get('/service', 'ServiceController@index')->name('service');
    Route::get('/software', 'SoftwareController@index')->name('software');


    Route::name('service.')->group(function () {
        Route::get('/service/details/{uuid}', [ServiceController::class,'show'])->name('view');
    });
    Route::name('software.')->group(function () {
        Route::get('/software/details/{uuid}', [SoftwareController::class,'show'])->name('view');
    });

    Route::get('/view-user-protfolio/{id?}', 'CommonProfileController@getUserProfile')->name('profile.portfolio');
    Route::post('/file-upload', 'FileUploadController@uploadFile')->name('file.upload');



    Route::get('job/single-job/{uuid}', [\App\Http\Controllers\Buyer\JobController::class,'singleJob'] )->name('single.view');
    Route::get('/user-profile/{id?}', 'CommonProfileController@getUserProfile')->name('seller.profile');
    Route::get('view-proposal/{uuid}',    [\App\Http\Controllers\Buyer\ProposalController::class,'show'] )->name('proposal.show');
    
});