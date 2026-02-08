<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

  
    // public function addData()
    // {
    //     $addUsers = new User();
    //     $addUsers->name = 'nitin';
    //     $addUsers->email = 'tester@gmail.com';
    //     $addUsers->password = bcrypt('password');
    //     $addUsers->save();

    //     $addStudents = new Student();

    //     $addStudents->age = '32';
    //     $addStudents->date_of_birth = "19-07-1993";
    //     $addStudents->gender = "m";
    //     $addStudents->score = 99.9;
    //     $addStudents->user_id = $addUsers->id;
    //     $addStudents->save();



    //     return "User add successfully";

    // }

    // public function getData()
    // {
    //     // $getUsers = User::all();
    //     $getUsers = User::select('id', 'name')
    //     ->get();
    //     // ->where('id', 200)
    //     // ->get();
    //     return $getUsers;
    // }


    // public function updateData()
    // {
    //     // $getUsers = User::all();
    //     $updateUser = User::find(200);
    //     $updateUser->name = "testing";
    //     $updateUser->email = "Testing@gmail.com";
    //     $updateUser->update();

    //     return "Data Updated successfully";
       
    // }


    
    // public function deleteData($id)
    // {
    //     // $getUsers = User::all();
    //     $UserDelete = Student::findOrFail($id);
    //     $UserDelete->delete();
    //     return "Data deleted successfully";
    // }

    // public function whereConfditions()
    // {
    //     $UserData = Student::where('age', '>=', '28')
    //     ->where(function($query){
    //         $query->where('age', '<' , 25)
    //         ->orWhere('age', '>' , 26);
    //     })
    //     ->get();    
    //     return $UserData;
    // }


    // public function whereBetween()
    // {
    //     $item = Student::whereBetween('age', [20, 25])->get();
    //     return $item;
    // }


    //   public function notWhereBetween()
    // {
    //     $item = Student::whereNotBetween('age', [20, 25])->get();
    //     return $item;
    // }

    //   public function whereIn()
    // {
    //     // $item = Student::whereNotIn('id', [1, 2, 3, 4, 5, 6])->get();
    //     // $item = Student::where('age', 21)->where('score', 55)->get();
    //     $item = Student::whereAny(['age', 'score'], '=', 50)->get();
    //     return $item;
    // }

  

}
