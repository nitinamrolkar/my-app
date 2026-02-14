@extends('layouts.app')

@section('style')

@endsection

@section('maincontent')

@endsection

@section('content')
<div class="card-header bg-primary text-white text-center fs-1">
    <h3 class="mb-2 mt-2">Student registration</h3>

</div>

   </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<div class="card-body">
   
    <form action="{{URL('student/create')}}" method="post">
        @csrf
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-1">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
             <div class="mb-1">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="date_of_birth" name="date_of_birth">
            </div>
            <div class="mb-1">
                <label for="age" class="form-label">Age</label>
                <input type="text" class="form-control" id="age" name="age">
            </div>
            <div class="mb-1">
                <label for="score" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender">
            </div>
            <div class="mb-1">
                <label for="score" class="form-label">Score</label>
                <input type="text" class="form-control" id="score" name="score">
            </div>
            <button class="btn btn-success mt-3" type="submit"> Add Student</button>
    </form>

</div>

@endsection

@section('scripts')

@endsection