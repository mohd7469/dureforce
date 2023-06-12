<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            ["id"=> 1, 'name' => 'Dashboard', 'guard_name' => 'manage-users', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 2, 'name' => 'Service Booking', 'guard_name' => 'service-booking', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 3, 'name' => 'Sales Software', 'guard_name' => 'sales-software', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 4, 'name' => 'Hire Employ', 'guard_name' => 'hire-employ', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 5, 'name' => 'Manage Service', 'guard_name' => 'manage-service', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 6, 'name' => 'Manage Software', 'guard_name' => 'manage-software', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 7, 'name' => 'Manage job', 'guard_name' => 'manage-job', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 8, 'name' => 'All Advertises', 'guard_name' => 'all-advertises', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 9, 'name' => 'Manage User', 'guard_name' => 'manage-users', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 10, 'name' => 'Setup Coupon', 'guard_name' => 'setup-coupon', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 11, 'name' => 'Manage Category', 'guard_name' => 'manage-category', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 12, 'name' => 'Features', 'guard_name' => 'features', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 13, 'name' => 'Payment Gateways', 'guard_name' => 'payment-gateways', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 14, 'name' => 'Deposits', 'guard_name' => 'deposits', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 15, 'name' => 'Withdrawals', 'guard_name' => 'withdrawals', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 16, 'name' => 'Support Ticket', 'guard_name' => 'support-ticket', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 17, 'name' => 'Report', 'guard_name' => 'report', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 18, 'name' => 'Subscribers', 'guard_name' => 'subscribers', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 19, 'name' => 'General Setting', 'guard_name' => 'general-setting', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 20, 'name' => 'Logo & Favicon', 'guard_name' => 'logo-and-favicon', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 21, 'name' => 'Extensions', 'guard_name' => 'extensions', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 22, 'name' => 'Language', 'guard_name' => 'language', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 23, 'name' => 'Seo Manager', 'guard_name' => 'seo-manager', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 24, 'name' => 'Email Manager', 'guard_name' => 'email-manager', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 25, 'name' => 'SMS Manager', 'guard_name' => 'sms-manager', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 26, 'name' => 'CDPR Cookie', 'guard_name' => 'cdpr-cookie', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 27, 'name' => 'Manage Templates', 'guard_name' => 'manage-templates', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 28, 'name' => 'Manage Section', 'guard_name' => 'manage-section', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 29, 'name' => 'System Information', 'guard_name' => 'system information', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 30, 'name' => 'Custom CSS', 'guard_name' => 'custom-css', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 31, 'name' => 'Clear Cache', 'guard_name' => 'clear-cache', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 32, 'name' => 'Report and Request', 'guard_name' => 'report-and-request', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 33, 'name' => 'Manage Rank', 'guard_name' => 'manage-rank', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 34, 'name' => 'Manage Staff', 'guard_name' => 'manage-staff', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 35, 'name' => 'Lead images', 'guard_name' => 'lead_images', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 36, 'name' => 'Project Lenght', 'guard_name' => 'project_lenght', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 37, 'name' => 'Email image settings', 'guard_name' => 'email_image_settings', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 38, 'name' => 'Software Default', 'guard_name' => 'software_default', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 39, 'name' => 'Deliverables', 'guard_name' => 'deliverables', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 40, 'name' => 'DODS', 'guard_name' =>'dods','created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 41, 'name' => 'Delivery Mode', 'guard_name' => 'delivery_mode', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 42, 'name' => 'System Credentials', 'guard_name' => 'system_credentials', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 43, 'name' => 'Jobs Type', 'guard_name' => 'jobs_type', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 44, 'name' => 'Budget Type', 'guard_name' => 'budget_type', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 45, 'name' => 'Degrees', 'guard_name' => 'degrees', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 46, 'name' => 'World Countries', 'guard_name' => 'world_countries', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 47, 'name' => 'World Cities', 'guard_name' => 'world_cities', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 48, 'name' => 'World Languags', 'guard_name' => 'world_languags', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 49, 'name' => 'Language Levels', 'guard_name' => 'language_levels', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 50, 'name' => 'Project Stages', 'guard_name' => 'project_stages', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 51, 'name' => 'Tags', 'guard_name' => 'tags', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 52, 'name' => 'Blogs', 'guard_name' => 'blogs', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 53, 'name' => 'Logs', 'guard_name' => 'logs', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 54, 'name' => 'Flush Redis Data', 'guard_name' => 'flush_redis_data', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 55, 'name' => 'Technology Logo', 'guard_name' => 'technology_logo', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 56, 'name' => 'Background Banner', 'guard_name' => 'background_banner', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 57, 'name' => 'Manage Attributes', 'guard_name' => 'manage_attributes', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ["id"=> 58, 'name' => 'Manage Testimonials', 'guard_name' => 'manage_testimonials', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],




        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach( $permissions as $permission){
            Permission::create($permission);
        }

    }
}
