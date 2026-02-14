<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
       $teachers = Teacher::with('user')->when($request->search, function ($query, $search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('age', 'like', "%{$search}%");

            });

       })->paginate(10);
       
       return view('teachers.index', compact('teachers'));
       
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function updateTeacher(Request $request, $id)
    {

        

        $teachers = Teacher::with('user')->findOrFail($id);

        $users = User::findOrFail($teachers->user_id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->update();
       
        $teachers->age = $request->age;
        $teachers->date_of_birth = $request->date_of_birth;
        $teachers->gender = $request->gender;

        $teachers->update();

        return redirect('teacher');

    }

   

   

}