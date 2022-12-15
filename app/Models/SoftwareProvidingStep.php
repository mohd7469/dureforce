<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareProvidingStep extends Model
{
    use HasFactory;
    protected $table = "software_providing_steps";
    protected $guarded= ['id'];
}
