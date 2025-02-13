<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormProgram extends Model
{
    use HasFactory;
    
    protected $fillable = 
    [
        'program_id',
        'title',
        'link'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
