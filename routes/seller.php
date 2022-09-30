<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('seller.')->group(function () {
    
    Route::middleware(['verified','is-freelancer'])->group(function () {
        
        Route::namespace('Seller')->prefix('seller')->group(function () {

            //profile without middleware of profile complte
            Route::name('profile.')->prefix('profile')->group(function () {

                Route::post('/education/save', 'Profilecontroller@saveEducation')->name('education.save');
                Route::post('/experience/save', 'Profilecontroller@saveExperience')->name('experience.save');
                Route::post('/profile/skills', 'ProfileController@saveSkills')->name('skills.save');

            });

            // profile completed  routes
            Route::middleware('is-profile-completed')->group(function () {

                Route::get('/jobs-listing/{category?}', [\App\Http\Controllers\Seller\JobController::class,'index'] )->name('jobs.listing');
                Route::get('/job-detail/{uuid}',        [\App\Http\Controllers\Seller\JobController::class,'jobView'] )->name('job.jobview');
               
                Route::name('proposal.')->group(function () {
                    Route::get('/create-proposal/{uuid}',  [\App\Http\Controllers\Seller\ProposalController::class,'createProposal'] )->name('create');
                    Route::post('/validate-proposal',      [\App\Http\Controllers\Seller\ProposalController::class,'validatePropsal'] )->name('validate');
                    Route::post('proposal-store/{uuid}',   [\App\Http\Controllers\Seller\ProposalController::class,'savePropsal'])->name('store');
                    Route::get('proposal-lists',           [\App\Http\Controllers\Seller\ProposalController::class,'index'])->name('index');
                });

            });

        });
    });
});