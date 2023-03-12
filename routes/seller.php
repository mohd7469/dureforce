<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('seller.')->group(function () {

    Route::middleware(['verified','is-freelancer'])->group(function () {
        
        Route::namespace('Seller')->prefix('seller')->group(function () {

            Route::view('/service-list', 'templates.basic.services.service-list');
            Route::view('/software-list', 'templates.basic.software.software-list');

            Route::get('/offer-view/{uuid}',        [\App\Http\Controllers\Seller\JobController::class,'OfferView'] )->name('offer.view');

            //profile without middleware of profile complte
            Route::name('profile.')->prefix('profile')->group(function () {

                Route::post('/education/save', [\App\Http\Controllers\Seller\ProfileController::class,'saveEducation'])->name('education.save');
                Route::post('/experience/save', [\App\Http\Controllers\Seller\ProfileController::class,'saveExperience'])->name('experience.save');
                Route::post('/experience/add', [\App\Http\Controllers\Seller\ProfileController::class,'addExperience'])->name('experience.add');
                Route::post('/experience/edit/{id}', [\App\Http\Controllers\Seller\ProfileController::class,'editExperience'])->name('experience.edit');
                Route::post('/education/add', [\App\Http\Controllers\Seller\ProfileController::class,'addEducation'])->name('education.add');
                Route::post('/education/edit/{id}', [\App\Http\Controllers\Seller\ProfileController::class,'editEducation'])->name('education.edit');
                Route::post('/profile/skills', [\App\Http\Controllers\Seller\ProfileController::class,'saveSkills'])->name('skills.save');
                Route::get('/view', [\App\Http\Controllers\Seller\ProfileController::class,'getUserProfile'])->name('view')->middleware('is-profile-completed');

                Route::get('/portfolio', [\App\Http\Controllers\Seller\ProfileController::class,'getUserProfile'])->name('portfolio');
                Route::get('/portfolio/edit/{uuid}', [\App\Http\Controllers\Seller\ProfileController::class,'getUserProfile'])->name('portfolio.edit');
                Route::get('/portfolio/delete/{uuid}', [\App\Http\Controllers\Seller\ProfileController::class,'deletePortfolio'])->name('portfolio.delete');
                Route::post('/portfolio/save', [\App\Http\Controllers\Seller\ProfileController::class,'saveUserPortfolio'])->name('portfolio.store');
                Route::post('/testimonial/request', [\App\Http\Controllers\Seller\ProfileController::class,'requestForTestimonial'])->name('testimonial.request');

                Route::get('/password-security', [\App\Http\Controllers\Seller\ProfileController::class,'getpassword'])->name('password.security');
                Route::post('/seller/password/change', [\App\Http\Controllers\Seller\ProfileController::class,'sellerprofilePasswordChange'])->name('seller.password.change');
                Route::post('/profile-picture-update', [\App\Http\Controllers\Seller\ProfileController::class,'profilePictureUpdate'])->name('picture.update');
              
            });

            // profile completed  routes
            Route::middleware('is-profile-completed')->group(function () {

                // Route::get('/jobs-listing-old/{category?}', [\App\Http\Controllers\Seller\JobController::class,'index'] )->name('jobs.listing.old');
                Route::get('/jobs-listing/{category?}', [\App\Http\Controllers\Seller\JobController::class,'indexNew'] )->name('jobs.listing');
                Route::get('/save-job/{uuid}', [\App\Http\Controllers\Seller\JobController::class,'saveJob'] )->name('jobs.save.listing');
                Route::get('/save-single-job-view/{uuid}', [\App\Http\Controllers\Seller\JobController::class,'saveSingleJobView'] )->name('jobs.save.single.view.listing');
                Route::get('/remove-saved-job/{uuid}', [\App\Http\Controllers\Seller\JobController::class,'removeSavedJob'] )->name('jobs.remove.saved.listing');
                Route::get('/remove-saved-single-job-view/{uuid}', [\App\Http\Controllers\Seller\JobController::class,'removeSavedSingleJobView'] )->name('jobs.remove.saved.single.view.listing');
                Route::get('/job-detail/{uuid}',        [\App\Http\Controllers\Seller\JobController::class,'jobView'] )->name('job.jobview');
                Route::view('/my-proposal-list','templates.basic.buyer.propsal.my-proposal-list');
               
                Route::name('proposal.')->group(function () {

                    Route::get('/create-proposal/{uuid}',  [\App\Http\Controllers\Seller\ProposalController::class,'createProposal'] )->name('create');
                    Route::post('/validate-proposal',      [\App\Http\Controllers\Seller\ProposalController::class,'validatePropsal'] )->name('validate');
                    Route::post('proposal-store/{uuid}',   [\App\Http\Controllers\Seller\ProposalController::class,'savePropsal'])->name('store');
                    Route::get('proposal-lists/{type?}',           [\App\Http\Controllers\Seller\ProposalController::class,'index'])->name('index');
                    Route::get('proposal-detail/{uuid}',           [\App\Http\Controllers\Seller\ProposalController::class,'details'])->name('detail');

                });

                

            });

            Route::name('service.')->prefix('service')->group(function () {
                Route::post('/store-proposal', [\App\Http\Controllers\Seller\ServiceController::class,'storeProposal'] )->name('store.proposal');
            });

            Route::name('software.')->prefix('software')->group(function () {
                Route::post('/store-proposal', [\App\Http\Controllers\Seller\SoftwareController::class,'storeProposal'] )->name('store.proposal');
            });

        });
    });
});