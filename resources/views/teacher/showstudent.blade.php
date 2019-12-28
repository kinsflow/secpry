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
                <td>{{$student->first_name}}</td>
                <td>{{$student->last_name}}</td>
                <td><button class="btn-success">view profile</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection