<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Classes extends Model
{
    
    public function student()
    {
         return $this->belongsTo(student::class, 'class_id');
    }

     public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subjects', 'class_id', 'subject_id');
    }

      public function grades()
    {
        return $this->belongsToMany(Subject::class, 'grades', 'student_id', 'subject_id')->withPivot('grade')->withTimestamps();
    }
}
