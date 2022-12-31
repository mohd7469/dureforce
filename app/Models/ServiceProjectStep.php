<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProjectStep extends Model
{
    protected $table="service_project_steps";
    protected $guarded = ['id'];
    use HasFactory;
}
