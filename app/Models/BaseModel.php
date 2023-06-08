<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BaseModel extends Model
{

    public function scopeIsPublished($query)
    {
        return $query->where('is_published',1);

    }
    public function scopeIsActive($query)
    {
        return $query->where('is_active',1);

    }
    public function scopeOnlyUnread($query){
        return $query->where('is_read', false);
    }
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

}
