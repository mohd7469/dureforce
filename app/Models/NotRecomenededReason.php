<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotRecomenededReason extends Model
{
    use HasFactory;

    public static $Model_Name_Space = "App\Models\NotRecomenededReason";
    protected $table='not_recomended_reasons';
    public static $Is_Active = 1;

    protected $fillable = [
        'name','slug','is_active','role_id'
    ];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
