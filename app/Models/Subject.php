<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\classes;


class Subject extends Model
{

public function classes()
{
    return $this->belongsToMany(Classes::class, 'class_subjects', 'subject_id', 'class_id');
}
  
}
