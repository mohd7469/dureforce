<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    protected $guarded = ['id'];

    protected $table = "frontends";
    protected $casts = [
        'data_values' => 'object',

    ];

    public static function scopeGetContent($data_keys)
    {
        return Frontend::where('data_keys', $data_keys);
    }

    public static function parseBlogDescription($blog)
    {
        if (!empty($blog->data_values) && !empty($blog->data_values->tag)) {

            $tags = $blog->data_values->tag;
            $desc = $blog->data_values->description;
            foreach ($tags as $tag) {
                $desc = str_replace($tag, "<span class='badge  badge-danger'>$tag</span>", $desc);
            }
            return $desc;
        }
        return $blog->data_values->description;;
    }
}
