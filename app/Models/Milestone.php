<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;
    protected $fillable = ['description','start_date','end_date','amount','completed','proposal_id','user_id','module_id','module_type'];


    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id');
    }
}
