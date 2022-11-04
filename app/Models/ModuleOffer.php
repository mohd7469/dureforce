<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleOffer extends Model
{
    use HasFactory;
    protected $table="module_offers";
    protected $guarded = [];

    public function moduleMilestones()
    {
        return $this->hasMany(ModuleOfferMilestone::class, 'module_offer_id');
    }

}
