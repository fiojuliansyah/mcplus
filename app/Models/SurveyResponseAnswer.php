<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyResponseAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['survey_response_id', 'answer_id'];
    
    public function surveyResponses()
    {
        return $this->belongsToMany(SurveyResponse::class, 'survey_response_answers')
                    ->withTimestamps();
    }
}
