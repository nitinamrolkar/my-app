<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

  
    public function addData()
    {
        $addUsers = new User();
        $addUsers->name = 'nitin';
        $addUsers->email = 'tester@gmail.com';
        $addUsers->password = bcrypt('password');
        $addUsers->save();

        $addStudents = new Student();

        $addStudents->age = '32';
        $addStudents->date_of_birth = "19-07-1993";
        $addStudents->gender = "m";
        $addStudents->score = 99.9;
        $addStudents->user_id = $addUsers->id;
        $addStudents->save();



        return "User add successfully";

    }

    public function getData()
    {
        // $getUsers = User::all();
        $getUsers = User::select()
        ->find(200);
        // ->where('id', 200)
        // ->get();
        return $getUsers;
    }


    public function updateData()
    {
        // $getUsers = User::all();
        $updateUser = User::find(200);
        $updateUser->name = "testing";
        $updateUser->email = "Testing@gmail.com";
        $updateUser->update();

        return "Data Updated successfully";
       
    }


    
    public function deleteData($id)
    {
        // $getUsers = User::all();
        $UserDelete = User::findOrFail($id);
        $UserDelete->delete();
        return "Data deleted successfully";
    }

    public function whereConfditions()
    {
        $UserData = Student::where('age', '>=', '28')
        ->where(function($query){
            $query->where('age', '<' , 25)
            ->orWhere('age', '>' , 26);
        })
        ->get();    
        return $UserData;
    }


    public function whereBetween()
    {
        $item = Student::whereBetween('age', [20, 25])->get();
        return $item;
    }


    // public function craecreateUserAndStudent()
    // {

        
    //     $name = "Tester";
    //     $email = "tester@gmail.com";
    //     $password = bcrypt('password');
    //     $age = 23;
    //     $date_of_birth = "19-07-1993";

    //      $user = User::create([
    //         'name' => $name,
    //         'email' => $email,
    //         'password' => $password,
    //     ]);

    //     $student = Student::create([
    //         'age' => $age,
    //         'date_of_birth' => $date_of_birth,
    //         'user_id' => $user->id,
    //     ]);
    //     return "User and Student created";

    // }

    // public function getData()
    // {
    //     $items = DB::table('students')
    //     // ->limit(2)
    //     // ->count();
    //     // ->max('score');
    //     // ->min('score');
    //     ->avg('score');
    //     // ->get();
    //     return $items;
    // }

    // public function updateData()
    // {
    //     DB::table('users')->where('id', 203)->update([
    //         'name' => 'nitin',
    //         'email' => 'nitinamrolkar@gmail.com',
    //     ]);

    //     return "Data Update Successfully";
    // }

    // public function deleteData()
    // {
    //     DB::table('users')->where('id', 203)->delete();
    //      return "Data Deleted Successfully";
    // }
    


}
