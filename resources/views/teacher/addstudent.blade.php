@extends('teacher.header')
@section('content')

    <div class="col-sm-8">
        <h2>Create New Student Profile</h2>
        <form id="add_student_form" action="{{route('teacher.create')}}" method="post" enctype="multipart/form-data">
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
{{--//to be done in edit profile--}}
            {{--<div class="form-group">--}}
                {{--<label for="photo">Student Passport:</label>--}}
                {{--<input type="file" class="form-control" id="photo"  name="photo">--}}
            {{--</div>--}}

            <div class="form-group">
                <label for="guardian_phone_number">Guardian Phone Number: </label>
                <input class="form-control" type="tel" name="guardian_phone_number">
            </div>
            <div class="form-group">
                <label for="guardian_email">Guardian Email: </label>
                <input class="form-control" type="email" name="guardian_email">
            </div>
            <div>
                <label for="home_address"> Home Address: </label>
                <textarea class="form-control" name="home_address"></textarea>
            </div><br>
            <button type="submit" id="submit_form" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px; min-width: 300px">
    <div class="toast" style="position: absolute; top: auto; right: 0;" data-delay="10000">
        <div class="toast-header">

        </div>
        <div class="toast-body text-white">

        </div>
    </div>
    </div>


    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submit_form").click(function(e){
            e.preventDefault();

            $.ajax({
                url:'{{route('teacher.create')}}',
                method:"POST",
                // data: new FormData(this),
                data: $('#add_student_form').serialize(),
                dataType: 'json',
                // contentType:false,
                cache: false,
                processData: false,
                success:function(data){
                    $('.toast-body').html(data.message + '<br>')
                    $('.toast').toast('show').addClass(data.class_name);
                    $('.toast-header').text('Add New Student Record');

                }
            });
        });
    </script>


@stop

