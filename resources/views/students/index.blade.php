@extends('layouts.app')

@section('style')

@endsection

@section('maincontent')

@endsection

@section('content')
  <section>
    <div>

     <h2>Nitin</h2>
        <h2>Students</h2>
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
    <form action={{URL('students')}} method="get">
    <div>
        <input class="search" type="text" id="search" name="search" placeholder="Secrch"|>
      <button type="submit" class="btn btn-outline-success btn-sm">Success</button>
        <a href="{{URL('student/add-student')}}" class="btn btn-outline-warning btn-sm">Add Student</a>
    </div>
</form>
   
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Age</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Score</th>
            <th scope="col" colspan="3">Actions</th>
        
            </tr>
        </thead>
        <tbody>
            @csrf
                 @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->User->name}}</td>
                        <td>{{$student->User->email}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->date_of_birth}}</td>
                        <td>@if ($student->gender == 'm')
                                Male
                            @elseif ($student->gender == 'f')
                                Female
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{$student->score}}</td>
                        <td><a href="{{URL('student/edit', $student->id)}}" class="btn btn-sm btn-success">Edit</a></td>
                        <form action="{{URL('student/delete', $student->User->id)}}" method="post" onsubmit="return confirm('Are You want to delete this Student')">
                           @csrf
                           
                         <td><button type="submit" class="btn btn-sm btn-danger">Delete</button></td>

                         </form>
                    </tr>
                @endforeach
        </tbody>
        </table>

      <nav>
  <ul class="pagination">
     {{$students->appends(request()->query())->links('pagination::bootstrap-5')}}
  </ul>
</nav>

      
  </section>
@endsection

@section('scripts')

@endsection
