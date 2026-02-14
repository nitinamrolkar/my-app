@extends('layouts.app')

@section('style')

@endsection

@section('maincontent')

@endsection

@section('content')
<div class="container-fluid p-2 bg-primary text-white text-center">
  <h4>Edit Students</h4>
  {{$student->name}}
</div>
<form action="{{URL('student/update', $student->id)}}" method="POST">
    @csrf
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-8">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->user->name }}">
            </div>
            <div class="col-sm-8">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email"  value="{{ $student->user->email }}">
            </div>
             <div class="col-sm-8">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $student->date_of_birth }}">
            </div>
            <div class="col-sm-8">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" id="age" name="age" value="{{ $student->age }}">
            </div>
            <div class="col-sm-8">
                <label for="score" class="form-label">Gender</label>
               <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="male" value="m" 
                        {{$student->gender == 'm' ? 'checked' : ''}}
                    > <label for="form-check-label" for="male">Male</label>

               </div>

               <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="female" value="f" 
                        {{$student->gender == 'f' ? 'checked' : ''}}
                    > <label for="form-check-label" for="female">Female</label>

               </div>
            </div>
            <div class="col-sm-8">
                <label for="score" class="form-label">Score</label>
                <input type="text" class="form-control" id="score" name="score" value="{{ $student->score }}">
            </div>

            <div>
               <button type="submit" class="btn btn-outline-info mt-3">Update Student</button>
            </div>
  
  </div>
</div>
</form>
@endsection

@section('scripts')

@endsection