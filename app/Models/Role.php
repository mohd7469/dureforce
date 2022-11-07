<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    public static $Freelancer=1;
    public static $FreelancerName="Freelancer";
    public static $Client=2;
    public static $ClientName="Client";
    public static $Admin=3;
    public static $AdminName="Admin";



}
