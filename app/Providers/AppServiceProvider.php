<?php

namespace App\Providers;

use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\Category;
use App\Models\Features;
use App\Models\Rank;
use App\Models\Service;
use App\Models\Software;
use App\Models\Job;
use App\Models\Withdrawal;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {   if(config('app.app_force_https')){ 
            $this->app['request']->server->set('HTTPS', true);
         } else
         {
            $this->app['request']->server->set('HTTPS', false);
        }
        $this->app->bind('path.public', function() {
            return base_path().'/';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        $activeTemplate = activeTemplate();
        $general = GeneralSetting::first();
        $viewShare['paginator']=Paginator::useBootstrap();
        $viewShare['general'] = $general;
        $viewShare['activeTemplate'] = $activeTemplate;
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['language'] = Language::all();
        $viewShare['categorys'] = Category::where('status', 1)->orderby('id', 'DESC')->inRandomOrder()->get();
        $viewShare['ranks'] = Rank::where('status', 1)->get();
        $viewShare['features'] = Features::latest()->get();
        $viewShare['fservices'] = Service::where('status', 1)->where('featured', 1)->whereHas('category', function($q){
            $q->where('status', 1);
        })->paginate(4);
        view()->share($viewShare);
        
        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'banned_users_count'           => User::where('is_active', 0)->count(),
                'email_unverified_users_count' => User::where('email_verified_at', null)->count(),
                'sms_unverified_users_count'   => User::where('sms_verified_at', null)->count(),
                'pending_ticket_count'         => SupportTicket::where('status_id',SupportTicket::$Open)->count(),
                'close_ticket_count'         => SupportTicket::where('status_id',SupportTicket::$Closed)->count(),
                'onhold_ticket_count'         => SupportTicket::where('status_id',SupportTicket::$OnHold)->count(),
                'pending_deposits_count'    => Deposit::all()->count(),
                'pending_withdraw_count'    => Withdrawal::all()->count(),
                'servicePending'    => Service::all()->count(),
                'softwarePending'    => Software::all()->count(),
                'jobPending'    => Job::where('status_id', 1)->count(),
                'jobApproved'    => Job::where('status_id', 2)->count(),
                'jobClosed'    => Job::where('status_id', 3)->count(),
                'jobCanceled'    => Job::where('status_id', 10)->count(),

            ]);
        });

        view()->composer('admin.partials.topnav', function ($view) {
            $view->with([
                'adminNotifications'=>AdminNotification::where('read_status',0)->with('user')->orderBy('id','desc')->get(),
            ]);
        });


        view()->composer('partials.seo', function ($view) {
            $seo = Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });

        if(config('app.app_force_https')){ 
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
