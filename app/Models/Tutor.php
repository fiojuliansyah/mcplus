<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutor extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'category_id',
        'slug',
        'name',
        'image_url',
        'image_public_id',
        'video_url',
        'video_public_id',

    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
