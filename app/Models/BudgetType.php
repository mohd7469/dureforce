<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetType extends Model
{
    use HasFactory;
    protected $fillable = ['title','module_id'];
    public function jobs()
    {
        return $this->hasMany(Job::class,'budget_type_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
