<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_text','type', 'image_url', 'image_public_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
