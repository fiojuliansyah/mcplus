<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    
    protected $fillable = ['slug', 'name'];

    public function timetables()
    {
        return $this->hasMany(TimeTable::class);
    }

    public function promos()
    {
        return $this->hasMany(ClassPromo::class);
    }
}
