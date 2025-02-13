<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlusianKitImage extends Model
{
    use HasFactory;

    protected $fillable = ['plusian_kit_id', 'image_url', 'image_public_id'];

    public function plusianKit()
    {
        return $this->belongsTo(PlusianKit::class, 'plusian_kit_id');
    }
}
