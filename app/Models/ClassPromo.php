<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassPromo extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'classroom_id',
        'name', 
        'normal_price', 
        'discount_price', 
        'tutor_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
