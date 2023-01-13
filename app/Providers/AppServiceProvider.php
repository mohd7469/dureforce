<?php

namespace App\Providers;

use App\Models\AdminNotification;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Deliverable;
use App\Models\Deposit;
use App\Models\Features;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\Job;
use App\Models\Language;
use App\Models\Rank;
use App\Models\Service;
use App\Models\Software\Software;
use App\Models\Software\SoftwareDefaultStep;
use App\Models\SupportTicket;
use App\Models\Tag;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.app_force_https')) {
            $this->app['request']->server->set('HTTPS', true);
        } else {
            $this->app['request']->server->set('HTTPS', false);
        }
        $this->app->bind('path.public', function () {
            return base_path() . '/';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Log::info(["Previous URL"=>url()->full()]);
        Log::info(["Previous URL"=>url()->previous()]);
        Log::info(["Request data"=>\Request::all()]);

        LogViewer::auth(function ($request) {
            return Auth::guard('admin')->user();
        });

        $activeTemplate = activeTemplate();
        $general = GeneralSetting::first();
        $viewShare['paginator'] = Paginator::useBootstrap();
        $viewShare['general'] = $general;
        $viewShare['activeTemplate'] = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language'] = Language::all();
        $viewShare['categorys'] = Category::where('status', 1)->orderby('id', 'DESC')->inRandomOrder()->get();
        $viewShare['ranks'] = Rank::where('status', 1)->get();
        $viewShare['features'] = Features::latest()->get();
        $viewShare['deliverables'] = Deliverable::latest()->get();
        $viewShare['software_module_titles'] = SoftwareDefaultStep::latest()->get();

        $viewShare['tags'] = Tag::latest()->get();


        $viewShare['fservices'] = Service::where('status_id', 1)->whereHas('category', function ($q) {
            $q->where('status_id', 1);
        })->paginate(4);

        view()->share($viewShare);


        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'banned_users_count' => User::where('is_active', 0)->count(),
                'active_users_count' => User::where('is_active', 1)->count(),
                'email_unverified_users_count' => User::where('email_verified_at', null)->count(),
                'sms_unverified_users_count' => User::where('sms_verified_at', null)->count(),
                'pending_ticket_count' => SupportTicket::where('status_id', SupportTicket::$Open)->count(),
                'close_ticket_count' => SupportTicket::where('status_id', SupportTicket::$Closed)->count(),
                'onhold_ticket_count' => SupportTicket::where('status_id', SupportTicket::$OnHold)->count(),
                'pending_deposits_count' => Deposit::all()->count(),
                'pending_withdraw_count' => Withdrawal::all()->count(),
                'servicePending' => Service::where('status_id', 18)->count(),
                'serviceApprove' => Service::where('status_id', 19)->count(),
                'serviceCanceled' => Service::where('status_id', 20)->count(),
                'serviceUnderReview' => Service::where('status_id', 21)->count(),
                'serviceDraft' => Service::where('status_id', 17)->count(),
                'softwarePending' => Software::where('status_id', Software::STATUSES['PENDING'])->count(),
                'softwareApprove' => Software::where('status_id', Software::STATUSES['APPROVED'])->count(),
                'softwareCanceled' => Software::where('status_id', Software::STATUSES['CANCELLED'])->count(),
                'softwareUnderReview' => Software::where('status_id', Software::STATUSES['UNDER_REVIEW'])->count(),
                'softwareDraft' => Software::where('status_id', Software::STATUSES['DRAFT'])->count(),
                'jobPending' => Job::where('status_id', 1)->count(),
                'jobApproved' => Job::where('status_id', 2)->count(),
                'jobClosed' => Job::where('status_id', 3)->count(),
                'jobCanceled' => Job::where('status_id', 10)->count(),
                'bannerActive' => Banner::where('document_type', 'Background')->where('is_active', 1)->count(),
                'bannerInactive' => Banner::where('document_type', 'Background')->where('is_active', 0)->count(),
                'technologyLogoActive' => Banner::where('document_type', 'Technology Logo')->where('is_active', 1)->count(),
                'technologyLogoInactive' => Banner::where('document_type', 'Technology Logo')->where('is_active', 0)->count(),

            ]);
        });

        view()->composer('admin.partials.topnav', function ($view) {
            $view->with([
                'adminNotifications' => AdminNotification::where('read_status', 0)->with('user')->orderBy('id', 'desc')->get(),
            ]);
        });


        view()->composer('partials.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

        if (config('app.app_force_https')) {
            \URL::forceScheme('https');
        }

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->greeting('Hello ')
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url)
                ->line('If you did not create an account, no further action is required.')
                ->markdown('mail.verify');
        });

        Paginator::useBootstrap();

    }
}
