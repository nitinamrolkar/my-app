<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $fillable = ['user_id', 'age', 'date_of_birth'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

       public function teacher()
    {
        return $this->hasOneThrough(
            Teacher::class,
            Classes::class,
            'id',
            'id',
            'class_id',
            'teacher_id'
        );
    }

}
