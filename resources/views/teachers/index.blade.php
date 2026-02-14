@extends('layouts.app')

@section('style')

@endsection

@section('maincontent')

@endsection

@section('content')
  <section>
    <div>
        <h2>Teachers</h2>
    </div>
    <form action={{URL('teacher')}} method="get">
    <div>
        <input class="search" type="text" id="search" name="search" placeholder="Secrch"|>
      <button type="submit" class="btn btn-outline-success btn-sm">Search</button>
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
             
                 @foreach ($teachers as $teacher)
               
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->User->name}}</td>
                        <td>{{$teacher->User->email}}</td>
                        <td>{{$teacher->age}}</td>
                        <td>{{$teacher->date_of_birth}}</td>
                        <td>@if ($teacher->gender == 'm')
                                Male
                            @elseif ($teacher->gender == 'f')
                                Female
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{$teacher->score}}</td>
                        <td><a href="{{URL('teacher/edit', $teacher->id)}}" class="btn btn-sm btn-success">Edit</a></td>
                        <form action="{{URL('student/delete')}}" method="post" onsubmit="return confirm('Are You want to delete this Student')">
                           @csrf
                           
                         <td><button type="submit" class="btn btn-sm btn-danger">Delete</button></td>

                         </form>
                    </tr>
                
                @endforeach
                
        </tbody>
        </table>

      <nav>
  <ul class="pagination">
     {{$teachers->appends(request()->query())->links('pagination::bootstrap-5')}}
  </ul>
</nav>

      
  </section>
@endsection

@section('scripts')

@endsection
