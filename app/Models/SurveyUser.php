<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'classroom_id'];

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class, 'user_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
