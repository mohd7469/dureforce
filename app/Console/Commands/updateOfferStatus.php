<?php

namespace App\Console\Commands;

use App\Models\ModuleOffer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class updateOfferStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire_offer_update:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update status of expired offers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Expire Offers Command Executing');
        
        $today_date=Carbon::now()->format('Y-m-d');
        $all_offers=ModuleOffer::all();
        foreach ($all_offers as $key => $offer) {
           if($offer->status_id==ModuleOffer::STATUSES['PENDING'] && $offer->expire_at<$today_date){
                $offer->status_id=ModuleOffer::STATUSES['EXPIRED'];
                $offer->save();
           }
        }
        $this->info(' Expire Offers Command Executing End');

        
    }
}
