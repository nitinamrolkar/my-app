<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use PhpParser\Lexer\TokenEmulator\ReadonlyFunctionTokenEmulator;

use function Termwind\renderUsing;

class StudentController extends Controller
{
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

    public function getData()
    {
        //$items = Student::all();
        // $items = Student::withTrashed()->get();
        $items = Student::withTrashed()->find(1)->restore();
        return $items;
    }

    public function onlyTrashed()
    {
       //$items = Student::onlyTrashed()->get(); 
       $items = Student::onlyTrashed()->get();
       return response()->json($items);
    }

    public function deleteData()
    {
        Student::find(1)->forceDelete();
        return 'Deleted Successfully';
    }

}
