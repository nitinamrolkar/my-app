<?php

use App\Http\Controllers\SeconfController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Teachers;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about-us', function(){
//     return "This is ABout Page";
// });


///Grouping of Route

// Route::prefix('details')->group(function(){

//     Route::get('/students', function()
//     {
//      return "This is Student Page";
//     });

//     Route::get('/teachers', function()
//     {
//     return "This is a Teachers Route";
//     });

// });

// Route::get('student/{id}', function($id){
//     return 'student number'. $id;
// });


// Route::get('contact-us', function(){
//  return view('contactus');
// });

// Route::view('contact-us', 'contactus');

// Route::get('about-us/{name}/{id}', function($name, $id){
//     // $name = 'Teacher';
//     // $email = 'test@gmail.com';
//     //return view('about-us')->with('name', $name)->with('email', $email);
//     //return view('about-us', compact('name', 'email'));
//     //return view('about-us', ['name'=>$name, 'email'=>$email]);
//     return view('about-us', compact('name', 'id'));
// });

//Route::view('contact-us', 'contactus', ['name' =>'Nitin', 'email'=>'Nitin@gmail.com']);

// Route::view('contact-us/{name}/{id}', 'contactus');


// // Route::get('/about-us', function(){
// //     return view('about-us');
// // })->name('profile');

// // Route::get('about-us', [UserController::class, 'index']);

// Route::view('test','test');
// Route::view('contact-us', 'contactus');
//  Route::get('students', [StudentController::class, 'index']);
// Route::get('about-us', [StudentController::class, 'aboutus']);

Route::controller(StudentController::class)->group(function()
{
    Route::get('students', 'index');
    Route::get('about-us', 'aboutus');

});

Route::get('/test', TestController::class);
Route::resource('second', SeconfController::class);

Route::controller(TeachersController::class)->group(function()
{
        Route::get('teachers', 'index');
        Route::get('add-teachers', 'add');
        Route::get('show-teachers/{id}', 'show');
        Route::get('update-teachers/{id}', 'update');
        Route::get('delete-teachers/{id}', 'delete');
});


Route::fallback(function(){
    return 'This is a not found please try again';
});