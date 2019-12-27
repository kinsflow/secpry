@extends('teacher.header')
@section('content')

    <div class="col-sm-8">
        <h2>Create New Student Profile</h2>
        <form action="{{route('teacher.create')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" placeholder="Enter FirstName" name="first_name">
            </div><div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" placeholder="Enter LastName" name="last_name">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date Of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth"  name="date_of_birth">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date Of Admission:</label>
                <input type="date" class="form-control" id="date_of_admission"  name="date_of_admission">
            </div>

            <div class="form-group">
                <label for="photo">Student Passport:</label>
                <input type="file" class="form-control" id="photo"  name="photo">
            </div>

            <div class="form-group">
                <label for="guardian_phone_number">Guardian Phone Number: </label>
                <input class="form-control" type="tel" name="guardian_phone_number">
            </div>
            <div class="form-group">
                <label for="guardian_email">Guardian Email: </label>
                <input class="form-control" type="email" name="guardian_email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@stop