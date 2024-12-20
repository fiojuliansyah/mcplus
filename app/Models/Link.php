<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'id',
        'title',
        'bio_id',
        'link',
        'icon_url',
        'icon_public_id',
        'created_at'
    ];

    public function bio()
    {
        return $this->belongsTo(Bio::class);
    }
}
