<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('buyer.')->prefix('buyer')->group(function () {
    
    Route::middleware('verified')->group(function () {
        
        Route::namespace('Buyer')->group(function () {

            //profile
            Route::name('profile.')->prefix('profile')->group(function () {

                Route::post('/save-company', 'ProfileController@saveCompany')->name('save.company');
                Route::post('/save-payment-methods', 'ProfileController@savePaymentMethod')->name('save.payment.methods');
                Route::post('/payment/save', 'Profile\ProfileController@storePayment')->name('payment.save');

            });
            
            Route::middleware('is-profile-completed')->group(function () {

                Route::name('job.')->group(function(){

                    Route::get('job/create', 'JobController@create')->name('create');
                    Route::post('job/job_data_validate', 'JobController@jobDataValidate')->name('validate');
                    Route::post('job/store', 'JobController@store')->name('store');
                    Route::get('job/index', 'JobController@index')->name('index');
                    Route::get('job/edit/{id}', 'JobController@edit')->name('edit');
                    Route::post('job/update/{id}', 'JobController@update')->name('update');
                    Route::get('job/destroy/{id}', 'JobController@destroy')->name('destroy');
                    Route::post('job/cancel', 'JobController@cancelBy')->name('cancel');
                    Route::get('job/single-job/{uuid}', 'JobController@singleJob')->name('single.view');

                });

                Route::get('view-proposal/{uuid}', 'ProposalController@show')->name('proposal.buyer.show');
                Route::get('all-proposal/{uuid}', 'ProposalController@jobPropsals')->name('job.all.proposals');
                Route::get('invite-freelancer/{uuid}', 'JobController@inviteFreelancer')->name('job.invite.freelancer');
                Route::get('/job/attachment', 'Buyer\JobController@downnloadAttach')->name('job.download');

            });


        });
    });

});