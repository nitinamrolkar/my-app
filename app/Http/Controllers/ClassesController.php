<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class ClassesController extends Controller
{
    public function index()
    {
       return Classes::with('subjects')->get();
    }

     public function student_classes()
    {
        $stdent_with_class = Classes::with('student')->get();
        return $stdent_with_class;
    }

    public function grades()
    {
        return Classes::with('grades')->get();
    }
}
