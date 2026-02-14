<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use PhpParser\Lexer\TokenEmulator\ReadonlyFunctionTokenEmulator;

use function Termwind\renderUsing;

class StudentController extends Controller
{

   public function index(Request $request)
{

   $students = Student::with('user')
    ->when($request->search, function($query, $search) {
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('age', 'like', "%{$search}%");
        });
    })
    ->paginate(10);
    // $students = Student::with('user')
    //     ->when($request->search, function ($query, $search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('age', 'like', "%{$search}%")
    //               ->orWhere('date_of_birth', 'like', "%{$search}%");
    //         })
    //         ->orWhereHas('user', function ($q) use ($search) {
    //             $q->where('name', 'like', "%{$search}%")
    //               ->orWhere('email', 'like', "%{$search}%");
    //         });
    //     })
    //     ->get();

    return view('students.index', compact('students'));
}

public function addStudents(Request $request)
{


    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'age' => 'required|integer|min:18|max:30',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:m,f',
        'score' => 'required|integer|min:45|max:100',
    ]);
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt('password');

        $User->save();


        $Student = new Student();
        $Student->date_of_birth = $request->date_of_birth;
        $Student->age = $request->age;
        $Student->gender = $request->gender;
        $Student->score = $request->score;
        $Student->user_id = $User->id;
        $Student->save();

        return redirect('student');

}

public function editStudent($id)
{

    $student = Student::with('user')->findOrFail($id);

    return view('students.edit', compact('student'));

}

public function updateStudent(Request $request, $id)
{
    
    $student = Student::with('user')->findOrFail($id);

    $student->user->name  = $request->name;
    $student->user->email = $request->email;
    $student->user->update();

   
    $student->age           = $request->age;
    $student->date_of_birth = $request->date_of_birth;
    $student->gender        = $request->gender;
    $student->score         = $request->score;
    $student->update();

  
    return redirect('student');
}

public function deletetudent($id)
{
       $item = User::findOrFail($id)->delete();
        return redirect('student');
}

    // protected $name;
    // protected $age;


    // public function __construct()
    // {
    //    $this->name = "Testing Name";
    //    $this->age = 20;
    // }
    // public function index(){
    //     return "This is Student controller";
            
    // }

    // public function aboutus(){
    //     // return 'ID no=='.$id.  '</br>'.'Name == '.$name;
    //     $name = $this->privatefunction();
    //     $age = $this->age;
    //     return view('about-us', compact('name', 'age'));
    // }

    // private function privatefunction() {
    //     return $name = "This is my private name";
    
        
    // }


    //  public function deleteData($id)
    // {
    //     // $getUsers = User::all();
    //     $StudentDelete = Student::findOrFail($id);
    //     $StudentDelete->delete();
    //     return "Data deleted successfully";
    // }

    // public function getData()
    // {
    //     //$items = Student::all();
    //     // $items = Student::withTrashed()->get();
    //     $items = Student::withTrashed()->find(1)->restore();
    //     return $items;
    // }

    // public function onlyTrashed()
    // {
    //    //$items = Student::onlyTrashed()->get(); 
    //    $items = Student::onlyTrashed()->get();
    //    return response()->json($items);
    // }

    // public function deleteData()
    // {
    //     Student::find(1)->forceDelete();
    //     return 'Deleted Successfully';
    // }

}
