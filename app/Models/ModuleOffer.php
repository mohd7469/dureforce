<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleOffer extends Model
{
    use HasFactory;
    protected $table="module_offers";

    public function module_milestones()
    {
        return $this->belongsToMany(Mode::class, 'module_id');
    }

}
