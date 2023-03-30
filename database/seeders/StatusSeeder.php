<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statuses = [
            ["id"=>1, "name"=>"Pending", "slug"=>"pending", "type"=>NULL, "color"=>'badge--primary', "module_id"=>Module::$Job],
            ["id"=>2, "name"=>"Approved", "slug"=>"approved", "type"=>NULL, "color"=>'badge--success', "module_id"=>Module::$Job],
            ["id"=>3, "name"=>"Closed", "slug"=>"closed", "type"=>NULL, "color"=>'badge--danger', "module_id"=>Module::$Job],
            ["id"=>4, "name"=>"Open", "slug"=>"open", "type"=>"App\\Models\\SupportTicket", "color"=>'badge--primary', "module_id"=>Module::$Job],
            ["id"=>5, "name"=>"Closed", "slug"=>"closed", "type"=>"App\\Models\\SupportTicket", "color"=>'badge--danger', "module_id"=>Module::$Job],
            ["id"=>6, "name"=>"On Hold", "slug"=>"on-hold", "type"=>"App\\Models\\SupportTicket", "color"=>'badge--dark', "module_id"=>Module::$Job],
            ["id"=>7, "name"=>"High", "slug"=>"high", "type"=>"priority", "color"=>'badge--dark', "module_id"=>Module::$Job],
            ["id"=>8, "name"=>"Medium", "slug"=>"medium", "type"=>"priority", "color"=>'badge--dark', "module_id"=>Module::$Job],
            ["id"=>9, "name"=>"Low", "slug"=>"low", "type"=>"priority", "color"=>'badge--dark', "module_id"=>Module::$Job],
            ["id"=>10, "name"=>"Canceled", "slug"=>"canceled", "type"=>"", "color"=>'badge--dark', "module_id"=>Module::$Job],
            ["id"=>11, "name"=>"Pending", "slug"=>"pending", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--primary', "module_id"=>Module::$Job],
            ["id"=>12, "name"=>"Accepted", "slug"=>"accepted", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--success', "module_id"=>Module::$Job],
            ["id"=>13, "name"=>"Rejected", "slug"=>"rejected", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--warning', "module_id"=>Module::$Job],
            ["id"=>14, "name"=>"Withdraw", "slug"=>"withdraw", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--warning', "module_id"=>Module::$Job],
            ["id"=>15, "name"=>"Closed", "slug"=>"close", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--danger', "module_id"=>Module::$Job],
            ["id"=>16, "name"=>"Expired", "slug"=>"expired", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--dark', "module_id"=>Module::$Job],
            ["id"=>17, "name"=>"Draft", "slug"=>"draft", "type"=>"App\\Models\\Service", "color"=>'badge--dark', "module_id"=>Module::$Service],
            ["id"=>18, "name"=>"Pending", "slug"=>"pending", "type"=>"App\\Models\\Service", "color"=>'badge--primary', "module_id"=>Module::$Service],
            ["id"=>19, "name"=>"Approved", "slug"=>"approved", "type"=>"App\\Models\\Service", "color"=>'badge--success', "module_id"=>Module::$Service],
            ["id"=>20, "name"=>"Cancelled", "slug"=>"cancelled", "type"=>"App\\Models\\Service", "color"=>'badge--danger', "module_id"=>Module::$Service],
            ["id"=>21, "name"=>"Under Review", "slug"=>"under_review", "type"=>"App\\Models\\Service", "color"=>'badge--warning', "module_id"=>Module::$Service],
            ["id"=>22, "name"=>"Draft", "slug"=>"draft", "type"=>"App\\Models\\Software", "color"=>'badge--dark', "module_id"=>Module::$Software],
            ["id"=>23, "name"=>"Pending", "slug"=>"pending", "type"=>"App\\Models\\Software", "color"=>'badge--primary', "module_id"=>Module::$Software],
            ["id"=>24, "name"=>"Approved", "slug"=>"approved", "type"=>"App\\Models\\Software", "color"=>'badge--success', "module_id"=>Module::$Software],
            ["id"=>25, "name"=>"Cancelled", "slug"=>"cancelled", "type"=>"App\\Models\\Software", "color"=>'badge--danger', "module_id"=>Module::$Software],
            ["id"=>26, "name"=>"Under Review", "slug"=>"under_review", "type"=>"App\\Models\\Software", "color"=>'badge--warning', "module_id"=>Module::$Software],
            ["id"=>27, "name"=>"Featured", "slug"=>"Featured-software", "type"=>"App\\Models\\Software", "color"=>'badge--info', "module_id"=>Module::$Software],
            ["id"=>28, "name"=>"Featured", "slug"=>"Featured-service", "type"=>"App\\Models\\Service", "color"=>'badge--info', "module_id"=>Module::$Service],
            ["id"=>29, "name"=>"Submitted", "slug"=>"submitted-proposal", "type"=>"App\\Models\\Proposal", "color"=>'badge--success', "module_id"=>Module::$Job],
            ["id"=>30, "name"=>"Archived", "slug"=>"archive-proposal", "type"=>"App\\Models\\Proposal", "color"=>'badge--success', "module_id"=>Module::$Job],
            ["id"=>31, "name"=>"Active", "slug"=>"active-proposal", "type"=>"App\\Models\\Proposal", "color"=>'badge--primary', "module_id"=>Module::$Job],
            
            ["id"=>32, "name"=>"Pending", "slug"=>"pending", "type"=>"App\\Models\\ModuleOffer", "color"=>'badge--primary', "module_id"=>Module::$Job],
            ["id"=>33, "name"=>"In Progress", "slug"=>"in_progress", "type"=>"App\\Models\\Contract", "color"=>'badge--info', "module_id"=>Module::$Job],
            ["id"=>34, "name"=>"Terminated", "slug"=>"terminated", "type"=>"App\\Models\\Contract", "color"=>'badge--warning', "module_id"=>Module::$Job],
            ["id"=>35, "name"=>"Completed", "slug"=>"completed", "type"=>"App\\Models\\Contract", "color"=>'badge--success', "module_id"=>Module::$Job],

            ["id"=>36, "name"=>"Requested", "slug"=>"requested", "type"=>"App\\Models\\UserTestimonial", "color"=>'badge--primary', "module_id"=>null],
            ["id"=>37, "name"=>"Waiting For Approval", "slug"=>"waiting_approval", "type"=>"App\\Models\\UserTestimonial", "color"=>'badge--info', "module_id"=>null],
            ["id"=>38, "name"=>"Accepted", "slug"=>"accepted", "type"=>"App\\Models\\UserTestimonial", "color"=>'badge--success', "module_id"=>null],
            ["id"=>39, "name"=>"Rejected", "slug"=>"rejected", "type"=>"App\\Models\\UserTestimonial", "color"=>'badge--warning', "module_id"=>null],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Status::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach( $statuses as $status){
           Status::create($status);
        }


    }
}
