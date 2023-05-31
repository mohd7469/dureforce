<?php

namespace App\Console\Commands;

use App\Models\DayPlanning;
use App\Models\ModuleOffer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendWorkDiaryApprovalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work_diary_approvals:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send approvals for work diary';

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
        $this->info('Approvals send are in progress');
        
        $today_date=Carbon::now()->format('Y-m-d');
        $day_plannings=DayPlanning::ApprovalsNotYetRequested()->whereDate('planning_date','<',$today_date)->get();
        foreach ($day_plannings as $key => $day_planning) {
            $day_planning->status_id = DayPlanning::STATUSES['ApprovalRequested'];
            $day_planning->save();
        }

        $this->info('Approvals has been Send');

        
    }
}
