<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
       $classesWithTeachers = Classes::with('teacher')->get();
        return $classesWithTeachers;
    }

     public function student_classes()
    {
        $stdent_with_class = Classes::with('student')->get();
        return $stdent_with_class;
    }
}
