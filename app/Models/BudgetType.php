<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetType extends Model
{
    use HasFactory;
    public function jobs()
    {
        return $this->hasMany(Job::class,'budget_type_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
