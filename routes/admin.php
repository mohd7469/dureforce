<?php
use App\Http\Controllers\Admin\ServiceAttributeController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetCodeEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify.code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {

        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        Route::get('service-attributes', 'ServiceAttributeController@index')->name('service-attributes.index');
        Route::post('service-attributes/store', 'ServiceAttributeController@store')->name('service-attributes.store');
        Route::post('service-attributes/update', 'ServiceAttributeController@update')->name('service-attributes.update');

        Route::get('logo-attributes', 'LogoController@index')->name('logo-attributes.index');
        Route::post('logo-attributes/store', 'LogoController@store')->name('logo-attributes.store');
        Route::post('logo-attributes/update', 'LogoController@update')->name('logo-attributes.update');

        Route::get('entity-attributes', 'EntityFieldController@index')->name('entity-attributes.index');
        Route::post('entity-attributes/store', 'EntityFieldController@store')->name('entity-attributes.store');
        Route::post('entity-attributes/update', 'EntityFieldController@update')->name('entity-attributes.update');

        Route::middleware('staffaccess:1')->group(function () {
            Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');


            //Notification
            Route::get('notifications', 'AdminController@notifications')->name('notifications');
            Route::get('notification/read/{id}', 'AdminController@notificationRead')->name('notification.read');
            Route::get('notifications/read-all', 'AdminController@readAll')->name('notifications.readAll');

        });

        Route::middleware('staffaccess:29')->group(function () {
            Route::get('system-info', 'AdminController@systemInfo')->name('system.info');
        });

        Route::middleware('staffaccess:32')->group(function () {
            //Report Bugs
            Route::get('request-report', 'AdminController@requestReport')->name('request.report');
            Route::post('request-report', 'AdminController@reportSubmit');
        });

        Route::middleware('staffaccess:9')->group(function () {
            // Users Manager
            Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
            Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
            Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
            Route::get('users/email-verified', 'ManageUsersController@emailVerifiedUsers')->name('users.email.verified');
            Route::get('users/email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('users.email.unverified');
            Route::get('users/sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('users.sms.unverified');
            Route::get('users/sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('users.sms.verified');
            Route::get('users/with-balance', 'ManageUsersController@usersWithBalance')->name('users.with.balance');

            Route::get('users/{scope}/search', 'ManageUsersController@search')->name('users.search');
            Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('users.detail');
            Route::post('user/update/{id}', 'ManageUsersController@update')->name('users.update');
            Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('users.add.sub.balance');
            Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
            Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('users.email.single');
            Route::get('user/login/{id}', 'ManageUsersController@login')->name('users.login');
            Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
            Route::get('user/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
            Route::get('user/deposits/via/{method}/{type?}/{userId}', 'ManageUsersController@depositViaMethod')->name('users.deposits.method');
            Route::get('user/withdrawals/{id}', 'ManageUsersController@withdrawals')->name('users.withdrawals');
            Route::get('user/withdrawals/via/{method}/{type?}/{userId}', 'ManageUsersController@withdrawalsViaMethod')->name('users.withdrawals.method');
            // Login History
            Route::get('users/login/history/{id}', 'ManageUsersController@userLoginHistory')->name('users.login.history.single');

            Route::get('users/send-email', 'ManageUsersController@showEmailAllForm')->name('users.email.all');
            Route::post('users/send-email', 'ManageUsersController@sendEmailAll')->name('users.email.send');
            Route::get('users/email-log/{id}', 'ManageUsersController@emailLog')->name('users.email.log');
            Route::get('users/email-details/{id}', 'ManageUsersController@emailDetails')->name('users.email.details');
            Route::get('users/service/{id}', 'ManageUsersController@userService')->name('users.service');
            Route::get('users/software/{id}', 'ManageUsersController@userSoftware')->name('users.software');
            Route::get('users/job/{id}', 'ManageUsersController@userJob')->name('users.job');
            Route::get('users/service/booking/{id}', 'ManageUsersController@userServiceBooking')->name('users.service.booking');
            Route::get('users/software/purchases/{id}', 'ManageUsersController@userSoftwareBuy')->name('users.software.purchases');
        });

        Route::middleware('staffaccess:18')->group(function () {
            // Subscriber
            Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
            Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
            Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
            Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendEmail');

        });

        Route::middleware('staffaccess:5')->group(function () {
            //Manage Service
            Route::get('service', 'ServiceController@index')->name('service.index');
            Route::get('service/details/{id}', 'ServiceController@details')->name('service.details');
            Route::get('service/pending', 'ServiceController@pending')->name('service.pending');
            Route::get('service/approved', 'ServiceController@approved')->name('service.approved');
            Route::get('service/cancel', 'ServiceController@cancel')->name('service.cancel');
            Route::get('service/draft', 'ServiceController@draft')->name('service.draft');
            Route::get('service/underReview', 'ServiceController@underReview')->name('service.underReview');
            Route::post('service/featured/include', 'ServiceController@featuredInclude')->name('service.featured.include');
            Route::post('service/featured/remove', 'ServiceController@featuredNotInclude')->name('service.featured.remove');
            Route::post('service/approvedBy', 'ServiceController@approvedBy')->name('service.approvedBy');
            Route::post('service/pendingBy', 'ServiceController@pendingBy')->name('service.pendingBy');
            Route::post('service/cancelBy', 'ServiceController@cancelBy')->name('service.cancelBy');
            Route::post('service/draftBy', 'ServiceController@draftBy')->name('service.draftBy');
            Route::post('service/underReviewBy', 'ServiceController@underReviewBy')->name('service.underReviewBy');

            Route::get('service/category', 'ServiceController@serviceCategory')->name('service.category');
            Route::get('service/{scope}/search', 'ServiceController@search')->name('service.search');
            Route::post('service/destroy/{id}', 'ServiceController@destroy')->name('service.destroy');

        });

        Route::middleware('staffaccess:6')->group(function () {
            //Manage Software
            Route::get('software/index', 'SoftwareController@index')->name('software.index');
            Route::get('software/pending', 'SoftwareController@pending')->name('software.pending');
            Route::get('software/approved', 'SoftwareController@approved')->name('software.approved');
            Route::get('software/cancel', 'SoftwareController@cancel')->name('software.cancel');
            Route::get('software/draft', 'SoftwareController@draft')->name('software.draft');
            Route::get('software/underReview', 'SoftwareController@underReview')->name('software.underReview');
            Route::get('software/category', 'SoftwareController@softwareCategory')->name('software.category');
            Route::get('software/detail/{id}', 'SoftwareController@details')->name('software.details');
            Route::post('software/approvedBy', 'SoftwareController@approvedBy')->name('software.approvedBy');
            Route::post('software/cancelBy', 'SoftwareController@cancelBy')->name('software.cancelBy');
            Route::post('software/pendingBy', 'SoftwareController@pendingBy')->name('software.pendingBy');
            Route::post('software/draftBy', 'SoftwareController@draftBy')->name('software.draftBy');
            Route::post('software/underReviewBy', 'SoftwareController@underReviewBy')->name('software.underReviewBy');

            Route::get('software/{scope}/search', 'SoftwareController@search')->name('software.search');
            Route::get('software/download/{id}', 'SoftwareController@softwareFile')->name('software.download');
            Route::get('software/document/{id}', 'SoftwareController@softwareDocument')->name('document.download');
            Route::post('software/destroy/{id}', 'SoftwareController@destroy')->name('software.destroy');
            Route::post('software/featured/include', 'SoftwareController@featuredInclude')->name('software.featured.include');
            Route::post('software/featured/remove', 'SoftwareController@featuredNotInclude')->name('software.featured.remove');
        });

        Route::middleware('staffaccess:7')->group(function () {
            //Manage Job

            Route::get('job/index', 'JobController@index')->name('job.index');
            Route::get('job/closed', 'JobController@closed')->name('job.closed');
            Route::get('job/pending', 'JobController@pending')->name('job.pending');
            Route::get('job/approved', 'JobController@approved')->name('job.approved');
            Route::get('job/cancel', 'JobController@cancel')->name('job.cancel');
            Route::post('job/cancelBy', 'JobController@cancelBy')->name('job.cancelBy');
            Route::post('job/approvedBy', 'JobController@approvedBy')->name('job.approvedBy');
            Route::post('job/closedBy', 'JobController@closedBy')->name('job.closedBy');
            Route::post('job/detailCancelBy', 'JobController@detailCancelBy')->name('job.detailCancelBy');
            Route::post('job/detailApprovedBy', 'JobController@detailApprovedBy')->name('job.detailApprovedBy');
            Route::post('job/detailClosedBy', 'JobController@detailClosedBy')->name('job.detailClosedBy');
            Route::get('job/details/{uuid}', 'JobController@details')->name('job.details');
            Route::get('job/biding/list/{id}', 'JobController@jobBiding')->name('job.biding.list');
            Route::get('job/biding/details/{id}', 'JobController@jobBidingDetails')->name('job.biding.details');
            Route::get('job/category', 'JobController@jobCategory')->name('job.category');
            Route::get('job/{scope}/search', 'JobController@search')->name('job.search');
            Route::post('job/destroy/{id}', 'JobController@destroy')->name('job.destroy');
        });
        // background banner
        Route::middleware('staffaccess:33')->group(function () {
            //Manage banner
            Route::get('banner/index', 'BannerController@index')->name('banner.index');
            Route::get('banner/create', 'BannerController@bannerCreate')->name('banner.create');
            Route::post('banner/store', 'BannerController@store')->name('banner.store');
            Route::get('banner/inActive', 'BannerController@inActive')->name('banner.inActive');
            Route::get('banner/active', 'BannerController@active')->name('banner.active');
            Route::post('banner/inactiveBy', 'BannerController@inactiveBy')->name('banner.inactiveBy');
            Route::post('banner/activeBy', 'BannerController@activeBy')->name('banner.activeBy');
            Route::get('banner/details/{uuid}', 'BannerController@details')->name('banner.details');
            Route::get('banner/category', 'BannerController@category')->name('banner.category');
            Route::post('banner/destroy/{id}', 'BannerController@destroy')->name('banner.destroy');
 
        });
        //Email template
        
        //   Route::middleware('staffaccess:35')->group(function () {
            //Manage banner
            Route::get('email/index', 'EmailController@index')->name('email.index');
            Route::get('email/create', 'EmailController@emailCreate')->name('email.create');
            Route::post('email/store', 'EmailController@store')->name('email.store');
            
            Route::get('email/edit/{id}', 'EmailController@editdetails')->name('email.edit');
            Route::post('email/inactiveBy', 'EmailController@inActiveBy')->name('email.inactive');
            Route::post('email/activeBy', 'EmailController@activeBy')->name('email.active');
            Route::post('email/update/{id}', 'EmailController@emailupdate')->name('email.update');
            Route::get('/email/delete/{id}', 'EmailController@delete')->name('email.delete');
          
 
        //  });
        Route::get('soft/index', 'SoftwareDefaultStepController@index')->name('soft.index');
        Route::get('soft/create', 'SoftwareDefaultStepController@softCreate')->name('soft.create');
        Route::post('soft/store', 'SoftwareDefaultStepController@store')->name('soft.store');
        Route::get('soft/edit/{id}', 'SoftwareDefaultStepController@editdetails')->name('soft.edit');
        Route::post('soft/inactiveBy', 'SoftwareDefaultStepController@inActiveBy')->name('soft.inactive');
            Route::post('soft/activeBy', 'SoftwareDefaultStepController@activeBy')->name('soft.active');
        Route::post('soft/update/{id}', 'SoftwareDefaultStepController@softupdate')->name('soft.update');
        Route::get('/soft/delete/{id}', 'SoftwareDefaultStepController@delete')->name('soft.delete');
        //Software Template
        //Deliverables route
        Route::get('deliverable/index', 'DeliverableController@index')->name('deliverable.index');
        Route::get('deliverable/create', 'DeliverableController@Create')->name('deliverable.create');
        Route::post('deliverable/store', 'DeliverableController@store')->name('deliverable.store');

        Route::get('deliverable/edit/{id}', 'DeliverableController@editdetails')->name('deliverable.edit');
        Route::post('deliverable/inactiveBy', 'DeliverableController@inActiveBy')->name('deliverable.inactive');
        Route::post('deliverable/activeBy', 'DeliverableController@activeBy')->name('deliverable.active');
        Route::post('deliverable/update/{id}', 'DeliverableController@update')->name('deliverable.update');

        Route::get('/deliverable/delete/{id}', 'DeliverableController@delete')->name('deliverable.delete');
        //dod route
        Route::get('dod/index', 'DODController@index')->name('dod.index');
        Route::get('dod/create', 'DODController@Create')->name('dod.create');
        Route::post('dod/store', 'DODController@store')->name('dod.store');
        Route::get('dod/edit/{id}', 'DODController@editdetails')->name('dod.edit');
        Route::post('dod/inactiveBy', 'DODController@inActiveBy')->name('dod.inactive');
        Route::post('dod/activeBy', 'DODController@activeBy')->name('dod.active');
        Route::post('dod/update/{id}', 'DODController@update')->name('dod.update');
        Route::get('/dod/delete/{id}', 'DODController@delete')->name('dod.delete');
        //jobtype route
        Route::get('type/index', 'JobTypeController@index')->name('type.index');
        Route::get('type/create', 'JobTypeController@Create')->name('type.create');
        Route::post('type/store', 'JobTypeController@store')->name('type.store');
        Route::get('type/edit/{id}', 'JobTypeController@editdetails')->name('type.edit');
        Route::post('type/inactiveBy', 'JobTypeController@inActiveBy')->name('type.inactive');
        Route::post('type/activeBy', 'JobTypeController@activeBy')->name('type.active');
        Route::post('type/update/{id}', 'JobTypeController@update')->name('type.update');
        Route::get('/type/delete/{id}', 'JobTypeController@delete')->name('type.delete');
          //Feature route
          Route::get('feature/index', 'FeaturesController@index')->name('feature.index');
          Route::get('feature/create', 'FeaturesController@Create')->name('feature.create');
          Route::post('feature/store', 'FeaturesController@store')->name('feature.store');
          Route::get('feature/edit/{id}', 'FeaturesController@editdetails')->name('feature.edit');
          Route::post('feature/inactiveBy', 'FeaturesController@inActiveBy')->name('feature.inactive');
          Route::post('feature/activeBy', 'FeaturesController@activeBy')->name('feature.active');
          Route::post('feature/update/{id}', 'FeaturesController@update')->name('feature.update');
          Route::get('/feature/delete/{id}', 'FeaturesController@delete')->name('feature.delete');
           //Degree route
           Route::get('degree/index', 'DegreeController@index')->name('degree.index');
           Route::get('degree/create', 'DegreeController@Create')->name('degree.create');
           Route::post('degree/store', 'DegreeController@store')->name('degree.store');
           Route::get('degree/edit/{id}', 'DegreeController@editdetails')->name('degree.edit');
           Route::post('degree/inactiveBy', 'DegreeController@inActiveBy')->name('degree.inactive');
           Route::post('degree/activeBy', 'DegreeController@activeBy')->name('degree.active');
           Route::post('degree/update/{id}', 'DegreeController@update')->name('degree.update');
           Route::get('/degree/delete/{id}', 'DegreeController@delete')->name('degree.delete');
           //World Language route
           Route::get('world-language/index', 'WorldLanguageController@index')->name('world.language.index');
           Route::get('world-language/create', 'WorldLanguageController@Create')->name('world.language.create');
           Route::post('world-language/store', 'WorldLanguageController@store')->name('world.language.store');
           Route::get('world-language/edit/{id}', 'WorldLanguageController@editdetails')->name('world.language.edit');
           Route::post('world-language/update/{id}', 'WorldLanguageController@update')->name('world.language.update');
           Route::get('/world-language/delete/{id}', 'WorldLanguageController@delete')->name('world.language.delete');

           //World cities route
           Route::get('world-city/index', 'WorldCitiesController@index')->name('world.city.index');
           Route::get('world-city/create', 'WorldCitiesController@Create')->name('world.city.create');
           Route::post('world-city/store', 'WorldCitiesController@store')->name('world.city.store');
           Route::get('world-city/edit/{id}', 'WorldCitiesController@editdetails')->name('world.city.edit');
           Route::post('world-city/update/{id}', 'WorldCitiesController@update')->name('world.city.update');
           Route::get('/world-city/delete/{id}', 'WorldCitiesController@delete')->name('world.city.delete');

           //Budget Type route
           Route::get('budget-type/index', 'BudgetTypeController@index')->name('budget.type.index');
           Route::get('budget-type/create', 'BudgetTypeController@Create')->name('budget.type.create');
           Route::post('budget-type/store', 'BudgetTypeController@store')->name('budget.type.store');
           Route::get('budget-type/edit/{id}', 'BudgetTypeController@editdetails')->name('budget.type.edit');
           Route::post('budget-type/inactiveBy', 'BudgetTypeController@inActiveBy')->name('budget.type.inactive');
           Route::post('budget-type/activeBy', 'BudgetTypeController@activeBy')->name('budget.type.active');
           Route::post('budget-type/update/{id}', 'BudgetTypeController@update')->name('budget.type.update');
           Route::get('/budget-type/delete/{id}', 'BudgetTypeController@delete')->name('budget.type.delete');

           //Language Lavel route
           Route::get('language-level/index', 'LanguageLevelsController@index')->name('language.level.index');
           Route::get('language-level/create', 'LanguageLevelsController@Create')->name('language.level.create');
           Route::post('language-level/store', 'LanguageLevelsController@store')->name('language.level.store');
           Route::get('language-level/edit/{id}', 'LanguageLevelsController@editdetails')->name('language.level.edit');
           Route::post('language-level/inactiveBy', 'LanguageLevelsController@inActiveBy')->name('language.level.inactive');
           Route::post('language-level/activeBy', 'LanguageLevelsController@activeBy')->name('language.level.active');
           Route::post('language-level/update/{id}', 'LanguageLevelsController@update')->name('language.level.update');
           Route::get('/language-level/delete/{id}', 'LanguageLevelsController@delete')->name('language.level.delete');
        //Tag route
        Route::get('tag/index', 'TagController@index')->name('tag.index');
        Route::get('tag/create', 'TagController@Create')->name('tag.create');
        Route::post('tag/store', 'TagController@store')->name('tag.store');
        Route::get('tag/edit/{id}', 'TagController@editdetails')->name('tag.edit');
        Route::post('tag/inactiveBy', 'TagController@inActiveBy')->name('tag.inactive');
        Route::post('tag/activeBy', 'TagController@activeBy')->name('tag.active');
        Route::post('tag/update/{id}', 'TagController@update')->name('tag.update');
        Route::get('/tag/delete/{id}', 'TagController@delete')->name('tag.delete');
        //project detail
        Route::get('project/index', 'ProjectStageController@index')->name('project.index');
        Route::get('project/create', 'ProjectStageController@Create')->name('project.create');
        Route::post('project/store', 'ProjectStageController@store')->name('project.store');
        Route::get('project/edit/{id}', 'ProjectStageController@editdetails')->name('project.edit');
        Route::post('project/inactiveBy', 'ProjectStageController@inActiveBy')->name('project.inactive');
        Route::post('project/activeBy', 'ProjectStageController@activeBy')->name('project.active');
        Route::post('project/update/{id}', 'ProjectStageController@update')->name('project.update');
        Route::get('/project/delete/{id}', 'ProjectStageController@delete')->name('project.delete');
        //DeliverMode Route
        Route::get('deliver/index', 'DeliverModeController@index')->name('deliver.index');
        Route::get('deliver/create', 'DeliverModeController@Create')->name('deliver.create');
        Route::post('deliver/store', 'DeliverModeController@store')->name('deliver.store');
        Route::get('deliver/edit/{id}', 'DeliverModeController@editdetails')->name('deliver.edit');
        Route::post('deliver/inactiveBy', 'DeliverModeController@inActiveBy')->name('deliver.inactive');
        Route::post('deliver/activeBy', 'DeliverModeController@activeBy')->name('deliver.active');
        Route::post('deliver/update/{id}', 'DeliverModeController@update')->name('deliver.update');
        Route::get('/deliver/delete/{id}', 'DeliverModeController@delete')->name('deliver.delete');
        // background technology logo
        Route::middleware('staffaccess:34')->group(function () {
            //Manage technology logo
            Route::get('techlogo/index', 'TechnologyLogoController@index')->name('techlogo.index');
            Route::get('techlogo/create', 'TechnologyLogoController@bannerCreate')->name('techlogo.create');
            Route::post('techlogo/store', 'TechnologyLogoController@store')->name('techlogo.store');
            Route::get('techlogo/inActive', 'TechnologyLogoController@inActive')->name('techlogo.inActive');
            Route::get('techlogo/active', 'TechnologyLogoController@active')->name('techlogo.active');
            Route::post('techlogo/inactiveBy', 'TechnologyLogoController@inactiveBy')->name('techlogo.inactiveBy');
            Route::post('techlogo/activeBy', 'TechnologyLogoController@activeBy')->name('techlogo.activeBy');
            Route::get('techlogo/details/{uuid}', 'TechnologyLogoController@details')->name('techlogo.details');
            Route::get('techlogo/category', 'TechnologyLogoController@category')->name('techlogo.category');
            Route::post('techlogo/destroy/{id}', 'TechnologyLogoController@destroy')->name('techlogo.destroy');
 
        });

        //Manage lead images logo
        Route::get('leadImages/index', 'LeadImagesController@index')->name('leadImages.index');
        Route::get('leadImages/create', 'LeadImagesController@bannerCreate')->name('leadImages.create');
        Route::post('leadImages/store', 'LeadImagesController@store')->name('leadImages.store');
        Route::get('leadImages/inActive', 'LeadImagesController@inActive')->name('leadImages.inActive');
        Route::get('leadImages/active', 'LeadImagesController@active')->name('leadImages.active');
        Route::post('leadImages/inactiveBy', 'LeadImagesController@inactiveBy')->name('leadImages.inactiveBy');
        Route::post('leadImages/activeBy', 'LeadImagesController@activeBy')->name('leadImages.activeBy');
        Route::get('leadImages/details/{uuid}', 'LeadImagesController@details')->name('leadImages.details');
        Route::get('leadImages/category', 'LeadImagesController@category')->name('leadImages.category');
        Route::post('leadImages/destroy/{id}', 'LeadImagesController@destroy')->name('leadImages.destroy');

        //Manage project length
        Route::get('projectLength/index', 'ProjectLengthController@index')->name('projectLength.index');
        Route::get('projectLength/create', 'ProjectLengthController@bannerCreate')->name('projectLength.create');
        Route::post('projectLength/store', 'ProjectLengthController@store')->name('projectLength.store');
        Route::get('projectLength/inActive', 'ProjectLengthController@inActive')->name('projectLength.inActive');
        Route::get('projectLength/active', 'ProjectLengthController@active')->name('projectLength.active');
        Route::post('projectLength/inactiveBy', 'ProjectLengthController@inactiveBy')->name('projectLength.inactiveBy');
        Route::post('projectLength/activeBy', 'ProjectLengthController@activeBy')->name('projectLength.activeBy');
        Route::get('projectLength/details/{uuid}', 'ProjectLengthController@details')->name('projectLength.details');
        Route::get('projectLength/category', 'ProjectLengthController@category')->name('projectLength.category');
        Route::post('projectLength/destroy/{id}', 'ProjectLengthController@destroy')->name('projectLength.destroy');
        

        Route::middleware('staffaccess:34')->group(function () {
            // Manage Staff
            Route::get('staff/index', 'StaffController@index')->name('staff.index');
            Route::get('staff/create', 'StaffController@create')->name('staff.create');
            Route::post('staff/store', 'StaffController@store')->name('staff.store');
            Route::get('staff/edit/{id}', 'StaffController@edit')->name('staff.edit');
            Route::post('staff/update/{id}', 'StaffController@update')->name('staff.update');
            Route::post('staff/delete/', 'StaffController@delete')->name('staff.delete');
        });

        Route::middleware('staffaccess:13')->group(function () {
            // Deposit Gateway
            Route::name('gateway.')->prefix('gateway')->group(function () {
                // Automatic Gateway
                Route::get('automatic', 'GatewayController@index')->name('automatic.index');
                Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
                Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
                Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
                Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
                Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');


                // Manual Methods
                Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
                Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
                Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store');
                Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
                Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
                Route::post('manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
                Route::post('manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
            });
        });

        Route::middleware('staffaccess:14')->group(function () {
            // DEPOSIT SYSTEM
            Route::name('deposit.')->prefix('deposit')->group(function () {
                Route::get('/', 'DepositController@deposit')->name('list');
                Route::get('pending', 'DepositController@pending')->name('pending');
                Route::get('rejected', 'DepositController@rejected')->name('rejected');
                Route::get('approved', 'DepositController@approved')->name('approved');
                Route::get('successful', 'DepositController@successful')->name('successful');
                Route::get('details/{id}', 'DepositController@details')->name('details');

                Route::post('reject', 'DepositController@reject')->name('reject');
                Route::post('approve', 'DepositController@approve')->name('approve');
                Route::get('via/{method}/{type?}', 'DepositController@depositViaMethod')->name('method');
                Route::get('/{scope}/search', 'DepositController@search')->name('search');
                Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');

            });
        });

        Route::middleware('staffaccess:15')->group(function () {
            // WITHDRAW SYSTEM
            Route::name('withdraw.')->prefix('withdraw')->group(function () {
                Route::get('pending', 'WithdrawalController@pending')->name('pending');
                Route::get('approved', 'WithdrawalController@approved')->name('approved');
                Route::get('rejected', 'WithdrawalController@rejected')->name('rejected');
                Route::get('log', 'WithdrawalController@log')->name('log');
                Route::get('via/{method_id}/{type?}', 'WithdrawalController@logViaMethod')->name('method');
                Route::get('{scope}/search', 'WithdrawalController@search')->name('search');
                Route::get('date-search/{scope}', 'WithdrawalController@dateSearch')->name('dateSearch');
                Route::get('details/{id}', 'WithdrawalController@details')->name('details');
                Route::post('approve', 'WithdrawalController@approve')->name('approve');
                Route::post('reject', 'WithdrawalController@reject')->name('reject');


                // Withdraw Method
                Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
                Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
                Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
                Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
                Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
                Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
                Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
            });
        });

        Route::middleware('staffaccess:2')->group(function () {
            //Service Booking
            Route::get('service/booking', 'ServiceBookingController@index')->name('booking.service.index');
            Route::get('service/booking/details/{id}', 'ServiceBookingController@details')->name('booking.service.details');
            Route::get('service/booking/pending', 'ServiceBookingController@pending')->name('booking.service.pending');
            Route::get('service/booking/completed', 'ServiceBookingController@completed')->name('booking.service.completed');
            Route::get('service/booking/delivered', 'ServiceBookingController@delivered')->name('booking.service.delivered');
            Route::get('service/booking/inprogress', 'ServiceBookingController@inProgress')->name('booking.service.inProgress');
            Route::get('service/booking/dispute', 'ServiceBookingController@dispute')->name('booking.service.dispute');
            Route::get('service/booking/expired', 'ServiceBookingController@expired')->name('booking.service.expired');
            Route::get('service/booking/cacnel', 'ServiceBookingController@cacnel')->name('booking.service.cacnel');
            Route::post('service/booking/payment', 'ServiceBookingController@payment')->name('booking.service.payment');
            Route::get('service/booking/{scope}/search', 'ServiceBookingController@search')->name('booking.service.search');
            Route::get('service/booking/work/delivery/{id}', 'ServiceBookingController@workDeliveryDownload')->name('work.delivery.download');
        });

        Route::middleware('staffaccess:3')->group(function () {
            // Sales Software
            Route::get('software/sales', 'BuySoftwareController@index')->name('sales.software.index');
            Route::get('software/file/download/{id}', 'BuySoftwareController@softwareFileDownload')->name('software.file.download');
            Route::get('software/document/download/{id}', 'BuySoftwareController@softwareDocumentFile')->name('software.document.download');
            Route::get('sales/software/search', 'BuySoftwareController@search')->name('sales.software.search');
        });

        Route::middleware('staffaccess:4')->group(function () {
            // Hire Employ
            Route::get('hire/employees', 'HireEmployController@index')->name('hire.index');
            Route::get('work/completed', 'HireEmployController@completed')->name('hire.completed');
            Route::get('work/delivered', 'HireEmployController@delivered')->name('hire.delivered');
            Route::get('work/inprogress', 'HireEmployController@inprogress')->name('hire.inprogress');
            Route::get('work/expired', 'HireEmployController@expired')->name('hire.expired');
            Route::get('work/dispute', 'HireEmployController@dispute')->name('hire.dispute');
            Route::get('hire/employees/details/{id}', 'HireEmployController@details')->name('hire.details');
            Route::get('hire/file/download/{id}', 'HireEmployController@workFileDownload')->name('hire.work.file.download');
            Route::post('employees/payment', 'HireEmployController@payment')->name('employ.payment');
            Route::get('hire/employees/{scope}/search', 'HireEmployController@search')->name('hire.search');
        });

        Route::middleware('staffaccess:33')->group(function () {
            //Rank
            Route::get('rank', 'RankController@index')->name('rank.index');
            Route::post('rank/store', 'RankController@store')->name('rank.store');
            Route::post('rank/update', 'RankController@update')->name('rank.update');
        });

        Route::middleware('staffaccess:10')->group(function () {
            // Coupon
            Route::get('coupon', 'CouponController@index')->name('coupon.index');
            Route::post('coupon/store', 'CouponController@store')->name('coupon.store');
            Route::post('coupon/update', 'CouponController@update')->name('coupon.update');
            Route::post('coupon/delete', 'CouponController@delete')->name('coupon.delete');
        });

        Route::middleware('staffaccess:11')->group(function () {
            //Category
            Route::get('category', 'CategoryController@index')->name('category.index');
            Route::post('category/store', 'CategoryController@store')->name('category.store');
            Route::post('category/update', 'CategoryController@update')->name('category.update');
            Route::get('sub/category', 'CategoryController@subCategoryIndex')->name('category.subcategory.index');
            Route::post('sub/category/store', 'CategoryController@subCategoryStore')->name('category.subcategory.store');
            Route::post('sub/category/update', 'CategoryController@subCategoryUpdate')->name('category.subcategory.update');
        
            Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
            Route::get('/sub/category/delete/{id}', 'CategoryController@deleteSubCategory')->name('category.subcategory.delete');
        });

        //Email Creditional Route
        Route::get('credential', 'SystemCredentialController@index')->name('credential.index');
        Route::post('credential/store', 'SystemCredentialController@store')->name('credential.store');
        Route::post('credential/activeBy', 'SystemCredentialController@activeBy')->name('credential.activeBy');
        Route::post('credential/inactiveBy', 'SystemCredentialController@inactiveBy')->name('credential.inactiveBy');
         
        Route::post('credential/update', 'SystemCredentialController@update')->name('credential.update');
        Route::get('/credential/delete/{id}', 'SystemCredentialController@delete')->name('credential.delete');

        //Redis Creditional Route
        Route::get('redis-credential', 'RedisSystemCredentialController@index')->name('redis.credential.index');
        Route::post('redis-credential/store', 'RedisSystemCredentialController@store')->name('redis.credential.store');
        Route::post('redis-credential/activeBy', 'RedisSystemCredentialController@activeBy')->name('redis.credential.activeBy');
        Route::post('redis-credential/inactiveBy', 'RedisSystemCredentialController@inactiveBy')->name('redis.credential.inactiveBy');
        Route::post('redis-credential/update', 'RedisSystemCredentialController@update')->name('redis.credential.update');
        Route::get('/redis-credential/delete/{id}', 'RedisSystemCredentialController@delete')->name('redis.credential.delete');

        //Pusher Creditional Route
        Route::get('pusher-credential', 'PusherSystemCredentialController@index')->name('pusher.credential.index');
        Route::post('pusher-credential/store', 'PusherSystemCredentialController@store')->name('pusher.credential.store');
        Route::post('pusher-credential/activeBy', 'PusherSystemCredentialController@activeBy')->name('pusher.credential.activeBy');
        Route::post('pusher-credential/inactiveBy', 'PusherSystemCredentialController@inactiveBy')->name('pusher.credential.inactiveBy');
        Route::post('pusher-credential/update', 'PusherSystemCredentialController@update')->name('pusher.credential.update');
        Route::get('/pusher-credential/delete/{id}', 'PusherSystemCredentialController@delete')->name('pusher.credential.delete');
        
     
      

        // Route::middleware('staffaccess:12')->group(function () {
        //     //features
        //     Route::get('features', 'FeaturesController@index')->name('features.index');
        //     Route::post('features/store', 'FeaturesController@store')->name('features.store');
        //     Route::post('features/update', 'FeaturesController@update')->name('features.update');
        // });

        Route::middleware('staffaccess:8')->group(function () {
            // Advertisement
            Route::get('ads/index', 'AdvertisementController@index')->name('ads.index');
            Route::post('ads/store', 'AdvertisementController@store')->name('ads.store');
            Route::get('ads/edit/{id}', 'AdvertisementController@edit')->name('ads.edit');
            Route::post('ads/update/{id}', 'AdvertisementController@update')->name('ads.update');
            Route::post('ads/delete', 'AdvertisementController@delete')->name('ads.delete');
        });

        Route::middleware('staffaccess:17')->group(function () {
            // Report
            Route::get('report/transaction', 'ReportController@transaction')->name('report.transaction');
            Route::get('report/transaction/search', 'ReportController@transactionSearch')->name('report.transaction.search');
            Route::get('report/login/history', 'ReportController@loginHistory')->name('report.login.history');
            Route::get('report/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('report.login.ipHistory');
            Route::get('report/email/history', 'ReportController@emailHistory')->name('report.email.history');
        });

        Route::middleware('staffaccess:16')->group(function () {
            // Admin Support
//            Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
            Route::get('tickets', 'SupportTicketController@index')->name('ticket');
            Route::get('tickets/pending', 'SupportTicketController@openTickets')->name('ticket.pending');
            Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
            Route::get('tickets/answered', 'SupportTicketController@onHoldTicket')->name('ticket.answered');
//            Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
            Route::post('store-ticket-comment/{ticket_no}', 'SupportTicketController@storeComment')->name('ticket.comment.store');
            Route::post('ticket-status-change/{ticket_no}', 'SupportTicketController@changeSattus')->name('ticket.status.change');
            Route::post('ticket-priority-change/{ticket_no}', 'SupportTicketController@changePriority')->name('ticket.priority.change');

            Route::get('tickets/view/{id}', 'SupportTicketController@show')->name('ticket.view');
            Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
            Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
            Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');
        });

        Route::middleware('staffaccess:22')->group(function () {
            // Language Manager
            Route::get('/language', 'LanguageController@langManage')->name('language.manage');
            Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
            Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
            Route::post('/language/update/{id}', 'LanguageController@langUpdate')->name('language.manage.update');
            Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
            Route::post('/language/import', 'LanguageController@langImport')->name('language.importLang');

            Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
            Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
            Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');
        });


        Route::middleware('staffaccess:19')->group(function () {

            // General Setting
            Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
            Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');
        });

        Route::middleware('staffaccess:31')->group(function () {
            Route::get('optimize', 'GeneralSettingController@optimize')->name('setting.optimize');
        });

        Route::middleware('staffaccess:20')->group(function () {
            // Logo-Icon
            Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo.icon');
            Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo.icon');
        });

        Route::middleware('staffaccess:30')->group(function () {
            //Custom CSS
            Route::get('custom-css', 'GeneralSettingController@customCss')->name('setting.custom.css');
            Route::post('custom-css', 'GeneralSettingController@customCssSubmit');
        });

        Route::middleware('staffaccess:26')->group(function () {
            //Cookie
            Route::get('cookie', 'GeneralSettingController@cookie')->name('setting.cookie');
            Route::post('cookie', 'GeneralSettingController@cookieSubmit');
        });

        Route::middleware('staffaccess:21')->group(function () {
            // Plugin
            Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
            Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
            Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
            Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');
        });


        Route::middleware('staffaccess:24')->group(function () {
            // Email Setting
            Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
            Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
            Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
            Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
            Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
            Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
            Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
            Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.test.mail');
        });
        //

        Route::middleware('staffaccess:25')->group(function () {
            // SMS Setting
            Route::get('sms-template/global', 'SmsTemplateController@smsTemplate')->name('sms.template.global');
            Route::post('sms-template/global', 'SmsTemplateController@smsTemplateUpdate')->name('sms.template.global');
            Route::get('sms-template/setting', 'SmsTemplateController@smsSetting')->name('sms.templates.setting');
            Route::post('sms-template/setting', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.setting');
            Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
            Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
            Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
            Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.test.sms');
        });

        Route::middleware('staffaccess:23')->group(function () {
            // SEO
            Route::get('seo', 'FrontendController@seoEdit')->name('seo');
        });


        Route::middleware('staffaccess:27')->group(function () {
            Route::name('frontend.')->prefix('frontend')->group(function () {
                Route::get('templates', 'FrontendController@templates')->name('templates');
                Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');
            });
        });
        Route::middleware('staffaccess:28')->group(function () {
            // Frontend
            Route::name('frontend.')->prefix('frontend')->group(function () {
                Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
                Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
                Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
                Route::post('remove', 'FrontendController@remove')->name('remove');

            });
        });
    });
});


