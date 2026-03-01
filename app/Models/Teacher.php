<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

     public function students()
    {
        return $this->hasManyThrough(Student::class, Classes::class, 'teacher_id', 'class_id');
    }

}
