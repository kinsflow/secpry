@extends('teacher.header')
@section('content')



    <div class="container">
        <h2>Student's List</h2><br>
        <table class="table">
            <thead>
            <tr>
                <th>Firstname</th>
                <th colspan="2">Lastname</th>

            </tr>
            </thead>
            <tbody>
            @foreach($all_student as $student)
            <tr>
                <td class="font-weight-bold">{{$student->first_name}}</td>
                <td class="font-weight-bold">{{$student->last_name}}</td>
                <td><a href="{{route('teacher.view_student_profile', $student->id)}}"><button class=" btn btn-success">view profile</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection