<?php


use App\Http\Controllers\Buyer\HomeController;
use App\Http\Controllers\Buyer\ServiceController;
use App\Http\Controllers\Buyer\SoftwareController;
use App\Http\Controllers\Buyer\WorkDiaryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('buyer.')->prefix('buyer')->group(function () {
    
    Route::middleware(['verified','is-client'])->group(function () {

        Route::view('/contract', 'templates.basic.buyer.contract.contract-list');
        Route::view('/contract_detail', 'templates.basic.buyer.contract.contract_details')->name('contract_detail');

        // Route::view('/payment_method_list', 'templates.basic.buyer.payment-method.payment_list')->name('contract_detail');
        Route::get('/payment_method_list/{id?}',[\App\Http\Controllers\Buyer\PayMethodController::class,'getUserProfile'] )->name('payment_method_list');
        Route::post('/save-payment-methods', [\App\Http\Controllers\Buyer\PayMethodController::class,'savePaymentMethod'])->name('save.payment.methods');
        Route::get('/buyer-change-payment-status/{id}/{module_offer_id?}', [\App\Http\Controllers\Buyer\PayMethodController::class,'buyerstatuschange'])->name('payment.change.status');
        Route::delete('/buyer-payment-destroy/{id}', [\App\Http\Controllers\Buyer\PayMethodController::class,'buyerdestroy'])->name('payment.destroy');

        Route::name('basic.')->prefix('buyer')->group(function () {
            Route::middleware(['verified','is-client'])->group(function () {
                Route::get('/','Buyer\ProfileController@buyerProfile')->name('profile')->middleware('is-profile-completed');
                Route::post('/profle/password/change', 'Buyer\ProfileController@buyerprofilePasswordChange')->name('profile.password.change');
                Route::post('/profile/skills', 'ProfileController@saveSkills')->name('skills.save');
                Route::post('/user-profile', 'Buyer\ProfileController@buyersaveUserBasics')->name('profile.save');
                Route::post('/save-payment-methods', 'Buyer\ProfileController@buyersavePaymentMethod')->name('profile.save.payment.methods');
                // Route::post('/save-company', 'Buyer\ProfileController@saveCompany')->name('profile.save.company');
                Route::post('/experience/save', 'Profile\ProfileController@store')->name('profile.experience.save');
                Route::post('/education/save', 'Profile\ProfileController@storeEducation')->name('education.save');
                Route::post('/save-company', 'Buyer\ProfileController@buyersaveCompany')->name('profile.save.company');
                Route::delete('/buyer-payment-destroy/{id}', 'Buyer\ProfileController@buyerdestroy')->name('profile.payment.destroy');
                Route::get('/user_payment_methods','Buyer\ProfileController@getPaymentMethods')->name('payment.methods');
                
            });
        });

        Route::namespace('Buyer')->group(function () {


            
            Route::middleware('is-profile-completed')->group(function () {

                //profile
                Route::name('profile.')->prefix('profile')->group(function () {

                    Route::post('/save-company', [\App\Http\Controllers\Buyer\ProfileController::class,'saveCompany'])->name('save.company');
                    Route::post('/save-payment-methods', [\App\Http\Controllers\Buyer\ProfileController::class,'savePaymentMethod'])->name('save.payment.methods');
                    Route::post('/payment/save', [\App\Http\Controllers\Buyer\ProfileController::class,'storePayment'])->name('payment.save');
                    Route::get('/view', [\App\Http\Controllers\Buyer\ProfileController::class,'getUserProfile'])->name('view');
                    Route::post('/update_picture', [\App\Http\Controllers\Buyer\ProfileController::class,'updateProfilePicture'])->name('update.picture');

                });
                Route::name('service.')->prefix('service')->group(function () {
                    Route::get('/book/{uuid}', [ServiceController::class,'bookService'])->name('book');
                });

                Route::name('software.')->prefix('software')->group(function () {
                    Route::get('/book/{uuid}', [SoftwareController::class,'bookSoftware'])->name('book');
                });

                Route::name('job.')->group(function(){
                    
                    Route::get('job/create',            [\App\Http\Controllers\Buyer\JobController::class,'create'] )->name('create');
                    Route::post('job/job_data_validate',[\App\Http\Controllers\Buyer\JobController::class,'jobDataValidate'] )->name('validate');
                    Route::post('job/store',            [\App\Http\Controllers\Buyer\JobController::class,'store'] )->name('store');
                    Route::get('job/index',             [\App\Http\Controllers\Buyer\JobController::class,'index'] )->name('index');
                    Route::get('job/edit/{id}',         [\App\Http\Controllers\Buyer\JobController::class,'edit'] )->name('edit');
                    Route::post('job/update/{id}',      [\App\Http\Controllers\Buyer\JobController::class,'update'] )->name('update');
                    Route::get('job/destroy/{id}',      [\App\Http\Controllers\Buyer\JobController::class,'destroy'] )->name('destroy');
                    Route::post('job/cancel',           [\App\Http\Controllers\Buyer\JobController::class,'cancelBy'] )->name('cancel');
                    Route::get('job/single-job/{uuid}', [\App\Http\Controllers\Buyer\JobController::class,'singleJob'] )->name('single.view');

                });
                
                Route::post('approve-day-planning', [WorkDiaryController::class,'approveDayPlanning'])->name('day.planning.status.update');

                Route::post('job-offer-send', [\App\Http\Controllers\Buyer\OfferController::class,'sendOffer'])->name('offer.save');
                Route::get('job-offer-sent/{id?}', [\App\Http\Controllers\Buyer\OfferController::class,'offerSent'])->name('offer.sent');
                
                Route::get('job-offer-send-response', [\App\Http\Controllers\Buyer\OfferController::class,'offerSuccessfullySubmitted'])->name('offer.success.alert');

                // Route::view('/send-offer/{uuid}','templates.basic.buyer.propsal.send-offer')->name('send.offer');
                Route::get('send-offer/{uuid}',    [\App\Http\Controllers\Buyer\ProposalController::class,'offerSend'] )->name('send.offer');
                Route::get('/withdraw-offer/{uuid}',  [\App\Http\Controllers\Buyer\OfferController::class,'withdrawOffer'] )->name('offer.withdraw');

                Route::get('view-proposal/{uuid}',    [\App\Http\Controllers\Buyer\ProposalController::class,'show'] )->name('proposal.show');
                Route::get('shortlist-proposal/{id}',    [\App\Http\Controllers\Buyer\ProposalController::class,'shortlist'] )->name('proposal.shortlist');
                Route::get('remove-shortlist-proposal/{id}',    [\App\Http\Controllers\Buyer\ProposalController::class,'removeShortlist'] )->name('proposal.remove.shortlist');
                Route::get('shortlisted-proposal/{uuid}',    [\App\Http\Controllers\Buyer\ProposalController::class,'shortlistedProposals'] )->name('proposal.shortlisted');
                Route::get('all-proposal/{uuid}',     [\App\Http\Controllers\Buyer\ProposalController::class,'jobPropsals'] )->name('job.all.proposals');
                Route::get('all-offer/{uuid}',     [\App\Http\Controllers\Buyer\OfferController::class,'jobOffers'] )->name('job.all.offers');
                Route::get('invite-freelancer/{uuid}',[\App\Http\Controllers\Buyer\JobController::class,'inviteFreelancer'] )->name('job.invite.freelancer');
                Route::post('save-invitation/{uuid}',[\App\Http\Controllers\Buyer\InviteFreelancerController::class,'saveInvitation'] )->name('job.save.invite.freelancer');
                Route::get('invited-freelancer/{uuid}',[\App\Http\Controllers\Buyer\InviteFreelancerController::class,'invitedFreelancer'] )->name('job.invited.freelancer');
                //
                Route::get('/job/attachment',[\App\Http\Controllers\Buyer\JobController::class,'downnloadAttach'] )->name('job.download');

            });


        });
    });


});
Route::get('/delete-user/{email}',[HomeController::class,'deleteUser']);

