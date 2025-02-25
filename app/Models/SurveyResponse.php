<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'response_text'];

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'survey_response_answers')
                    ->withTimestamps();
    }

    // Relasi ke user, jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke pertanyaan
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
