<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'id',
        'title',
        'image_url',
        'image_public_id',
        'slug'
    ];
}
