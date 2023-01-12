<?php

use App\Http\Controllers\Admin\ServiceAttributeController;
use App\Http\Controllers\Job\JobController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});
Route::get('coming-soon', function () {
    return view('errors.cooming_soon');
});


Route::get('/jobs-listing-old', [\App\Http\Controllers\Seller\JobController::class,'index'] )->name('jobs.listing.old');
Route::get('/job-skills', 'SkillCategoryController@getSkills')->name('job.skills');
// ---------------------------------------------------------------------------------------------------------------
// latest routes dont change them
Route::middleware('verified')->group(function () {

    Route::get('/user', 'CommonProfileController@profile')->name('user.basic.profile');
    Route::post('/user-profile-update', 'CommonProfileController@editUserBasics')->name('user.profile.basics.edit');
    Route::post('/user-profile', 'CommonProfileController@saveUserBasics')->name('user.profile.basics.save');
    Route::get('/profile-basics-data', 'CommonProfileController@getProfileData')->name('profile.basics.data');
    Route::get('/get-cities', 'CommonProfileController@getCities')->name('get-cities');
    Route::get('/user-profile/{id?}', 'CommonProfileController@getUserProfile')->name('seller.profile');


});

// --------------------------------------------------------------------------------------------------------------


Route::get('booking/service/cron', 'CronController@service')->name('service.cron');
Route::get('job/hire/cron', 'CronController@job')->name('job.cron');

// route for signup design
Route::view('/password/code-verif-design', 'templates.basic.user.auth.passwords.code_verify_design');
Route::view('/password/reset-design', 'templates.basic.user.auth.passwords.email_design');
Route::view('/verify-design', 'auth.verify_design');


// route for offer pages design
Route::view('/withdraw-offer', 'templates.basic.offer.withdraw_offer');
Route::view('/offer-description', 'templates.basic.offer.offer_description');
Route::view('/offer-sent', 'templates.basic.offer.offer_sent');
// freelancer design
Route::view('/selection-design', 'auth.user_selection_design');
Route::view('/freelancer-profile-design', 'templates.basic.profile.partials.profile_basic_design');
// Offer page design design
Route::view('/offers', 'templates.basic.offers.view-offer');

//varification code pages
Route::view('/verification', 'templates.basic.verification.identity_verification');
Route::view('/code-verification', 'templates.basic.verification.code_verification');
Route::view('/address-verification', 'templates.basic.verification.address_verification');
//Email verification page
Route::view('/email-verification', 'email-template.job.email_template');
Route::view('/job-email-verification', 'email-template.job.job_email_template');
Route::view('/job-email', 'templates.basic.job_email');
//seller All Proposal
Route::view('/seller-proposal', 'templates.basic.seller_proposal.all_proposal');
Route::view('/proposal-details', 'templates.basic.seller_proposal.proposal_details');



Route::view('/current-hires', 'templates.basic.offers.current-offer');
Route::view('/post-hire', 'templates.basic.offers.post-hire');
//support-ticket-create
Route::view('/support-listing', 'templates.basic.supports.sport_listing');
Route::view('/ticket-details', 'templates.basic.supports.ticket_details');



//Seller Add Portfolio pages


Route::get('hello', [\App\Http\Controllers\CommonProfileController::class,'hello'])->name('hello');

Route::view('/portfolio', 'templates.basic.portfolio.index');

Route::view('/job-listing', 'templates.basic.offers.myjob');

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'Paypal\ProcessController@ipn')->name('Paypal');
    Route::get('paypal-sdk', 'PaypalSdk\ProcessController@ipn')->name('PaypalSdk');
    Route::post('perfect-money', 'PerfectMoney\ProcessController@ipn')->name('PerfectMoney');
    Route::post('stripe', 'Stripe\ProcessController@ipn')->name('Stripe');
    Route::post('stripe-js', 'StripeJs\ProcessController@ipn')->name('StripeJs');
    Route::post('stripe-v3', 'StripeV3\ProcessController@ipn')->name('StripeV3');
    Route::post('skrill', 'Skrill\ProcessController@ipn')->name('Skrill');
    Route::post('paytm', 'Paytm\ProcessController@ipn')->name('Paytm');
    Route::post('payeer', 'Payeer\ProcessController@ipn')->name('Payeer');
    Route::post('paystack', 'Paystack\ProcessController@ipn')->name('Paystack');
    Route::post('voguepay', 'Voguepay\ProcessController@ipn')->name('Voguepay');
    Route::get('flutterwave/{trx}/{type}', 'Flutterwave\ProcessController@ipn')->name('Flutterwave');
    Route::post('razorpay', 'Razorpay\ProcessController@ipn')->name('Razorpay');
    Route::post('instamojo', 'Instamojo\ProcessController@ipn')->name('Instamojo');
    Route::get('blockchain', 'Blockchain\ProcessController@ipn')->name('Blockchain');
    Route::get('blockio', 'Blockio\ProcessController@ipn')->name('Blockio');
    Route::post('coinpayments', 'Coinpayments\ProcessController@ipn')->name('Coinpayments');
    Route::post('coinpayments-fiat', 'Coinpayments_fiat\ProcessController@ipn')->name('CoinpaymentsFiat');
    Route::post('coingate', 'Coingate\ProcessController@ipn')->name('Coingate');
    Route::post('coinbase-commerce', 'CoinbaseCommerce\ProcessController@ipn')->name('CoinbaseCommerce');
    Route::get('mollie', 'Mollie\ProcessController@ipn')->name('Mollie');
    Route::post('cashmaal', 'Cashmaal\ProcessController@ipn')->name('Cashmaal');
});



/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/
Route::view('/seller-dashboard', 'templates.basic.user.seller.seller_dashboard');

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('verified')->group(function () {

        Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'home'])->name('home')->middleware(['is-profile-completed']);

        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send.verify.code');
        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify.email');
        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify.sms');
        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

        // Route::middleware()->group(function () {
        Route::namespace('Seller')->prefix('seller')->group(function () {

            Route::middleware('is-profile-completed')->group(function () {


                Route::get('profile-setting', 'UserController@profile')->name('profile.setting');
                Route::post('profile-setting', 'UserController@submitProfile');
                Route::get('change-password', 'UserController@changePassword')->name('change.password');
                Route::post('change-password', 'UserController@submitPassword');

                //2FA
                Route::get('twofactor', 'UserController@show2faForm')->name('twofactor');
                Route::post('twofactor/enable', 'UserController@create2fa')->name('twofactor.enable');
                Route::post('twofactor/disable', 'UserController@disable2fa')->name('twofactor.disable');

                // Withdraw
                Route::get('/withdraw', 'UserController@withdrawMoney')->name('withdraw');
                Route::post('/withdraw', 'UserController@withdrawStore')->name('withdraw.money');
                Route::get('/withdraw/preview', 'UserController@withdrawPreview')->name('withdraw.preview');
                Route::post('/withdraw/preview', 'UserController@withdrawSubmit')->name('withdraw.submit');
                Route::get('/withdraw/history', 'UserController@withdrawLog')->name('withdraw.history');

                //Home Controller
                Route::get('service/booking/', 'HomeController@serviceBookeds')->name('booking.service');
                Route::get('service/booking/details/{id}', 'HomeController@serviceBookingDetails')->name('booking.service.details');
                Route::post('booking/confirm', 'HomeController@bookingConfirm')->name('booking.confirm');
                Route::post('work/upload', 'HomeController@workUpload')->name('work.upload');
                Route::get('work/file/download/{id}', 'HomeController@workFileDownload')->name('work.file.download');
                Route::get('/software/sales', 'HomeController@salesSoftware')->name('software.sales');
                Route::get('/job/list', 'HomeController@jobVacancy')->name('job.vacancy');
                Route::get('/job/list/detail/{id}', 'HomeController@jobListDetails')->name('seller.job.list.details');
                Route::get('/follow/{id}', 'HomeController@follow')->name('follow');
                Route::get('transactions', 'HomeController@transactions')->name('seller.transactions');

                
                //Service
                Route::get('/service/index', 'ServiceController@index')->name('service.index');
                Route::get('/service/create/{id?}', 'ServiceController@create')->name('service.create');
                Route::post('/service/store', 'ServiceController@store')->name('service.store');

                Route::post('/service/store-overview', 'ServiceController@storeOverview')->name('service.store.overview');
                Route::post('/service/store-banner', 'ServiceController@storeBanner')->name('service.store.banner');
                Route::post('/service/store-pricing', 'ServiceController@storePricing')->name('service.store.pricing');
                Route::post('/service/store-requirement', 'ServiceController@storeRequirements')->name('service.store.requirement');
                Route::post('/service/store-review', 'ServiceController@storeReview')->name('service.store.review');

                Route::post('/service/update/{id}', 'ServiceController@update')->name('service.update');
                Route::get('/service/edit/{slug}/{id}', 'ServiceController@edit')->name('service.edit');
                Route::post('/service/delete/{id}', 'ServiceController@destroy')->name('service.destroy');
                Route::post('/optional/image', 'ServiceController@optionalImageRemove')->name('optional.image');
                Route::get('/category', 'UserController@category')->name('category');
                // Route::get('/category', 'UserController@skillSubCategory')->name('category');


                Route::post('/favorite/service/', 'UserController@serviceFavorite')->name('favorite.service');
                Route::post('/favorite/software', 'UserController@softwareFavorite')->name('favorite.software');

                //Software
                Route::get('/software', 'SoftwareController@index')->name('software.index');
                Route::get('/software/file/download/{id}', 'SoftwareController@softwareFileDownload')->name('software.file.download');
                Route::get('/software/document/download/{id}', 'SoftwareController@softwareDocumentFile')->name('software.document.download');

                Route::get('/software/create/{id?}', 'SoftwareController@create')->name('software.create');

                Route::post('/software/store-overview', 'SoftwareController@storeOverview')->name('software.store.overview');
                Route::post('/software/store-banner', 'SoftwareController@storeBanner')->name('software.store.banner');
                Route::post('/software/store-pricing', 'SoftwareController@storePricing')->name('software.store.pricing');
                Route::post('/software/store-requirement', 'SoftwareController@storeRequirements')->name('software.store.requirement');
                Route::post('/software/store-review', 'SoftwareController@storeReview')->name('software.store.review');

                Route::post('/software/store', 'SoftwareController@store')->name('software.store');
                Route::get('/software/edit/{slug}/{id}', 'SoftwareController@edit')->name('software.edit');
                Route::post('/software/destroy/{id}', 'SoftwareController@destroy')->name('software.destroy');
                Route::post('/software/update/{id}', 'SoftwareController@update')->name('software.update');
            });

            Route::prefix('profile')->group(function () {

                // Route::get('/freelancer-profile-design', 'ProfileController@profile')->name('profile.create');

                Route::post('/save-basic', 'UserController@saveProfile')->name('profile.save');
                Route::post('/save-skills', 'UserController@saveSkills')->name('profile.save.skills');
                Route::post('/save-education', 'UserController@saveEducation')->name('profile.save.education');
                Route::post('/save-experience', 'UserController@saveExperience')->name('profile.save.experience');
                Route::post('/save-rates', 'UserController@saveRates')->name('profile.save.rates');
                Route::post('/save-company', 'UserController@saveCompany')->name('profile.save.company');

                Route::post('/save-payment-methods', 'UserPaymentMethodController@store')->name('profile.save.payment-methods');
                Route::get('/change-payment-status/{id}', 'UserPaymentMethodController@changeStatus')->name('profile.change-payment-status');
                Route::delete('/destroy-payment/{id}', 'UserPaymentMethodController@destroy')->name('profile.destroy.payment');
                Route::get('/edit/{id}', 'UserController@editProfile')->name('edit.profile');
            });

        });


        Route::any('/deposit', 'Gateway\PaymentController@deposit')->name('deposit');
        Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
        Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
        Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
        Route::get('deposit/manu
        
        al', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
        Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');

        Route::namespace('Buyer')->prefix('buyer')->group(function () {

            Route::get('deposit/history', 'HomeController@depositHistory')->name('deposit.history');
            Route::get('transactions', 'HomeController@transactions')->name('buyer.transactions');
            Route::get('work/delivered/download/{id}', 'HomeController@workDeliveryDownload')->name('work.delivery.download');
            //service
            Route::get('service/booked', 'HomeController@serviceBookingItem')->name('buyer.service.booked');
            Route::get('service/booking/details/{id}', 'HomeController@serviceBookingDetails')->name('buyer.service.booked.details');
            Route::get('favorite/service/item', 'HomeController@serviceFavoriteItem')->name('service.favorite');
            Route::get('favorite/software/item', 'HomeController@softwareFavoriteItem')->name('software.favorite');
            Route::post('work/delivery/approved', 'HomeController@workDeliveryApproved')->name('work.delivery.approved');
            Route::post('work/dispute', 'HomeController@workDispute')->name('work.dispute');
            //software
            Route::get('software/purchases/list', 'HomeController@softwarePurchases')->name('software.purchases');
            Route::get('software/file/download/{id}', 'HomeController@buyerSoftwareFileDownload')->name('buyer.software.file.download');
            Route::get('software/document/download/{id}', 'HomeController@buyerSoftwareDocumentFile')->name('buyer.software.document.download');
            Route::get('hire/employees', 'HomeController@hireEmploy')->name('buyer.hire.employ');
            Route::get('hire/employees/details/{id}', 'HomeController@hireEmployDetails')->name('buyer.hire.employ.details');


        });


        //JobBiding
        Route::post('job/biding', 'JobBidingController@store')->name('job.biding.store');
        //Conversation
        Route::post('conversation', 'ConversationController@store')->name('conversation.store');
        Route::get('inbox', 'ConversationController@inbox')->name('conversation.inbox');
        Route::get('chat/{id}', 'ConversationController@chat')->name('conversation.chat');
        Route::post('message/store', 'ConversationController@messageStore')->name('message.store');

        //Comment
        Route::post('comment', 'CommentController@store')->name('comment.store');
        Route::post('comment/reply', 'CommentController@commentReply')->name('comment.reply');

        //Service Booking
        Route::get('service/booking/{slug}/{id}', 'BookingController@serviceBooking')->name('service.booking');
        Route::get('service/coupon/apply', 'BookingController@applyCoupon')->name('service.coupon.apply');
        Route::post('service/booked', 'BookingController@serviceBooked')->name('service.booked');
        Route::get('payment/method', 'BookingController@payment')->name('payment.method');
        Route::post('payment/insert', 'BookingController@paymentInsert')->name('payment.insert');

        //Software Buy
        Route::get('software/buy/{slug}/{id}', 'SoftwareBuyController@softwareBuy')->name('software.buy');
        Route::get('software/coupon/apply', 'SoftwareBuyController@applyCouponSoftware')->name('software.coupon.apply');
        Route::post('software/buy/store', 'SoftwareBuyController@softwareBuyStore')->name('software.buy.store');

        // Job Biding
        Route::get('job/biding/order/{slug}/{id}', 'BidingOrderController@jobBiding')->name('job.biding.order');
        Route::post('hire/employ', 'BidingOrderController@hireEmploy')->name('hire.employ');

        //Review
        Route::post('review', 'ReviewController@store')->name('review.store');
        // });
    });
});

Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');
Route::get('/cookie/accept', 'SiteController@cookieAccept')->name('cookie.accept');
Route::get('blog', 'SiteController@blog')->name('blog');
Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');
Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholder.image');

//Service
Route::get('/', 'SiteController@index')->name('home');//Landing Page

// Route::get('/cdf', 'SiteController@index')->name('user.home');//extra
Route::get('/featured-services', 'ServiceController@featured')->name('featured.service');
Route::get('/service/details/{slug}/{id}', 'SiteController@serviceDetails')->name('service.details');
Route::get('/search/item/filter', 'FilterController@allServiceSearch')->name('home.search.item');
Route::get('/service/search', 'FilterController@serviceSearch')->name('service.search');
Route::get('/service/filter', 'FilterController@serviceDefault')->name('service.filter');
Route::get('/service/category/{slug}/{id}', 'FilterController@serviceCategory')->name('service.category');
Route::get('/service/sub/category/{slug}/{id}', 'FilterController@serviceSubCategory')->name('service.sub.category');

//software
//Route::get('/software', 'SoftwareController@index')->name('software');
Route::get('/featured-software', 'SoftwareController@featured')->name('featured.software');
Route::get('/software/details/{slug}/{id}', 'SiteController@softwareDetails')->name('software.details');
Route::get('/software/search/filter', 'FilterController@softwareItemSearch')->name('software.search.filter');
Route::get('/software/category/{slug}/{id}', 'FilterController@softwareCategory')->name('software.category');
Route::get('/software/sub/category/{slug}/{id}', 'FilterController@softwareSubCategory')->name('software.sub.category');
Route::get('/software/search/', 'FilterController@softwareSearch')->name('software.search');


//job
Route::get('/job', 'JobController@index')->name('job');
Route::get('/job/details/{slug}/{id}', 'SiteController@jobDeatils')->name('job.details');
Route::get('/job/filter/search/', 'FilterController@jobItemSearch')->name('job.filter.search');
Route::get('/job/category/{slug}/{id}', 'FilterController@jobCategory')->name('job.category');
Route::get('/job/sub/category/{slug}/{id}', 'FilterController@jobSubCategory')->name('job.sub.category');
Route::get('/job/search', 'FilterController@jobSearch')->name('job.search');


Route::get('/user/{username}/portfolio', 'SiteController@userProfile')->name('profile')->middleware('is-profile-completed');
Route::get('/user/service/{username}', 'SiteController@userService')->name('profile.service');
Route::get('/user/software/{username}', 'SiteController@userSoftware')->name('profile.software');
Route::get('/user/job/{username}', 'SiteController@userJob')->name('profile.job');
Route::get('/add/{id}', 'SiteController@adclicked')->name('add.clicked');


//Job Filter Search


Route::post('/subscribe', 'SiteController@subscribe')->name('subscribe');
Route::get('{slug}/{id}', 'SiteController@footerMenu')->name('footer.menu');
Route::get('/skills', 'SkillCategoryController@skills')->name('skills');

Route::get('/profile/view', 'ProfileController@buyerProfile');







