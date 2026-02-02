<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Lexer\TokenEmulator\ReadonlyFunctionTokenEmulator;

use function Termwind\renderUsing;

class StudentController extends Controller
{
    protected $name;
    protected $age;

    public function __construct()
    {
       $this->name = "Testing Name";
       $this->age = 20;
    }
    public function index(){
        return "This is Student controller";
            
    }

    public function aboutus(){
        // return 'ID no=='.$id.  '</br>'.'Name == '.$name;
        $name = $this->privatefunction();
        $age = $this->age;
        return view('about-us', compact('name', 'age'));
    }

    private function privatefunction() {
        return $name = "This is my private name";
    
        
    }
}
