<?php

use App\Http\Controllers\ContractsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\ServiceController;
use App\Http\Controllers\Seller\SoftwareController;
use App\Http\Controllers\Seller\WorkDiaryController;

Route::middleware(['verified','is-profile-completed','auth'])->group(function () {
    Route::name('notification.')->prefix('notification')->group(function () {
        Route::get('all', [NotificationController::class, 'notification'])->name('list');
        Route::get('read/{notification_uuid}', [NotificationController::class, 'read'])->name('read');

    });
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

    Route::name('contracts.')->group(function () {

        Route::get('/contract',  [ContractsController::class,'index'])->name('index');
        Route::get('/contract_detail/{uuid}',  [ContractsController::class,'show'])->name('show');
        Route::get('/contract_feedback/{uuid}',  [ContractsController::class,'feedback'])->name('feedback');
        Route::get('/loadreason',  [ContractsController::class,'loadReason'])->name('loadReason');
        });


        Route::post('contract/feedback', [\App\Http\Controllers\ContractFeedbackController::class, 'store'])->name('feedback.store');


    Route::name('work-diary.')->prefix('work-diary')->group(function () {
        
        Route::get('/tasks/{uuid}',  [WorkDiaryController::class,'workDiaryDetail'])->name('detail');
        Route::get('/day_planning/delete/{uuid}',  [WorkDiaryController::class,'delete'])->name('day.planning.delete');
        Route::get('/day_planning/request_approval/{uuid}',  [WorkDiaryController::class,'RequestApproval'])->name('day.planning.request.approval');
        
        Route::get('/task/comments/{uuid}',  [WorkDiaryController::class,'taskComments'])->name('day.planning.task.comments');
        Route::post('/task/comments',  [WorkDiaryController::class,'storetaskComment'])->name('day.planning.store.task.comment');

        Route::get('/tasks/delete/{uuid}',  [WorkDiaryController::class,'deleteWorkDiaryTask'])->name('task.delete');

        Route::get('/list/{uuid?}',  [\App\Http\Controllers\Seller\WorkDiaryController::class,'index'] )->name('index');
        Route::post('/store',  [\App\Http\Controllers\Seller\WorkDiaryController::class,'store'] )->name('store');

    });

    Route::get('/portfolio/view/{uuid}', [\App\Http\Controllers\Seller\ProfileController::class,'getUserProfile'])->name('profile.portfolio.view');

    Route::get('/view-user-protfolio/{id?}', 'CommonProfileController@getUserProfile')->name('profile.portfolio');
    Route::post('/file-upload', 'FileUploadController@uploadFile')->name('file.upload');

    Route::name('offers.')->group(function () {
        Route::get('/offer',  [OffersController::class,'index'])->name('index');
    });
    Route::get('/offer-detail/{id}', [\App\Http\Controllers\Buyer\OfferController::class,'offerDetail'])->name('offer.detail');
    Route::get('job/single-job/{uuid}', [\App\Http\Controllers\Buyer\JobController::class,'singleJob'] )->name('single.view');
    Route::get('/user-profile/{id?}', 'CommonProfileController@getUserProfile')->name('seller.profile');
    Route::get('profile/view/{uuid}', 'Buyer\ProfileController@buyerProfile')->name('buyer.profile');

    Route::get('view-proposal/{uuid}',    [\App\Http\Controllers\Buyer\ProposalController::class,'show'] )->name('proposal.show');

    Route::get('proposal-update/{uuid}',  [\App\Http\Controllers\Seller\ProposalController::class,'changeStatus'])->name('proposal.update');

});