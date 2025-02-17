<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'class'];

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class, 'user_id');
    }
}
