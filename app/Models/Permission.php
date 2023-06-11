<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    const ADMIN_PERMISSIONS = [
        'Dashboard'         =>1,
        'Service Booking'   =>2,
        'Sales Software'    => 3,
        'Hire Employ'       => 4,
        'Manage Service'    => 5,
        'Manage Software'   => 6,
        'Manage job'        => 7,
        'All Advertises'    => 8,
        'Manage User'       => 9,
        'Setup Coupon'      => 10,
        'Manage Category'   => 11,
        'Features'          => 12,
        'Payment Gateways'  => 13,
        'Deposits'          => 14,
        'Withdrawals'       => 15,
        'Support Ticket'    => 16,
        'Report'            => 17,
        'Subscribers'       => 18,
        'General Setting'   => 19,
        'Logo & Favicon'    => 20,
        'Extensions'        => 21,
        'Language'          => 22,
        'Seo Manager'       => 23,
        'Email Manager'     => 24,
        'SMS Manager'       => 25,
        'CDPR Cookie'       => 26,
        'Manage Templates'  => 27,
        'Manage Section'    => 28,
        'System Information'=> 29,
        'Custom CSS'        => 30,
        'Clear Cache'       => 31,
        'Report and Request'=> 32,
        'Manage Rank'       => 33,
        'Manage Staff'      => 34
    ];
}
