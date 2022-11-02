<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'slug', 'module_id'];
    protected $table = "statuses";

    //Jobs Statuses
    public static $Pending=1;
    public static $Approved=2;
    public static $Closed=3;

    //Priority
    public static $High=7;
    public static $Medium=8;
    public static $Low=9;




    public function jobs()
    {
        return $this->hasMany(Job::class,'status_id');
    }
    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class,'status_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
