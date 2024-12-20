<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bio extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'name',
        'slug',
        'image_url',
        'image_public_id',
    ];

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
