<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer_text','question_id', 'slug'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
