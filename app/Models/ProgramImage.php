<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramImage extends Model
{
    use HasFactory;

    protected $fillable = ['program_id', 'image_url', 'image_public_id'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
