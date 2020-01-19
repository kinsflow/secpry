@extends('teacher.header')
@section('content')

    <div class="container">
        @if(Session::has('failure'))
            <div class="alert alert-danger col-sm-5">
                {{Session::get('failure')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success col-sm-5">
                {{Session::get('success')}}
            </div>
        @endif

        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Student Profile</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>First Name: </h6>
                                <p>
                                    {{$student->first_name}}
                                </p>
                                <h6>Last Name: </h6>
                                <p>
                                    {{$student->last_name}}
                                </p>
                            </div>
                            <div class="col-md-6">

                                <hr>
                                <span class="badge badge-primary"><i class="fa fa-user"></i> {{$student->class}}</span>
                            </div>
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> More Details
                                </h5>
                                <table class="table table-sm table-hover table-striped">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <strong>Date Of Birth: </strong> {{$student->date_of_birth}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Date Of Admission: </strong> {{ $student->date_of_admission }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Guardian's Email: </strong> {{$student->guardian_email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Guardian's Phone
                                                Number: </strong> {{$student->guardian_phone_number}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Home Address: </strong> {{ $student->home_address }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/row-->
                    </div>

                    <div class="tab-pane" id="edit">
                        <form action="{{route('teacher.update_student_profile', $student->id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" value="{{$student->first_name}}"
                                       placeholder="Enter FirstName" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" value="{{$student->last_name}}"
                                       placeholder="Enter LastName" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date Of Birth:</label>
                                <input type="date" class="form-control" id="date_of_birth"
                                       value="{{$student->date_of_birth}}" name="date_of_birth">
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date Of Admission:</label>
                                <input type="date" class="form-control" id="date_of_admission"
                                       value="{{$student->date_of_admission}}" name="date_of_admission">
                            </div>
                            <div class="form-group">
                                <label for="guardian_phone_number">Guardian Phone Number: </label>
                                <input class="form-control" type="tel" value="{{$student->guardian_phone_number}}"
                                       name="guardian_phone_number">
                            </div>
                            <div class="form-group">
                                <label for="guardian_email">Guardian Email: </label>
                                <input class="form-control" type="email" value="{{$student->guardian_email}}"
                                       name="guardian_email">
                            </div>
                            <div>
                                <label for="home_address"> Home Address: </label>
                                <textarea class="form-control" name="home_address">{{$student->home_address}}</textarea>
                            </div>
                            <br>
                            <button type="submit" id="submit_form" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-1 text-center">
                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                <h6 class="mt-2">Upload a different photo</h6>
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">Choose file</span>
                </label>
            </div>
        </div>
    </div>

@endsection