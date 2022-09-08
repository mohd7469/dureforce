<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalAttachment extends Model
{
    use HasFactory;
    protected $fillable = ['name','uploaded_name ','url','type','is_published','user_id','module_id','module_type','deleted_at'];

    public function module()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
