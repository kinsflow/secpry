<?php

namespace App\Http\Controllers;

use App\AllClass;
use App\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function show()
    {
        $all_student = StudentProfile::where('class_id', Auth::id())->get();
        return view('teacher.showstudent', ['all_student' => $all_student]);
    }

    public function add()
    {
        return view('teacher.addstudent');
    }

    public function view_student_profile($id)
    {
        $students = StudentProfile::where('id', $id)->get();
        foreach ($students as $student) {
//            dd($student->home_address);
            $student->class = AllClass::where('id', $student->class_id)->pluck('name')->first();
        }
        return view('teacher.view_student_profile', ['student' => $student]);
    }

    public function update_student_profile($id, Request $request)
    {
        $input = $request->all();
//        dd($input);
        $sql = StudentProfile::find($id)->update($input);
        if ($sql) {
            return redirect()->back()->with('success', 'student profile updated successfully');
        } else {
            return redirect()->back()->with('failure', 'student profile update was unsuccessful');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $input['class_id'] = Auth::user()->teacher->classes->id;

//        dd($input);
        $validation = Validator::make($input, [
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'date_of_birth' => 'required|date|max:10|min:2',
            'date_of_admission' => 'required|date|max:10|min:2',
            'guardian_phone_number' => 'required|string|max:14|min:7',
            'guardian_email' => 'required|string|email',
            'home_address' => 'required|string',
        ]);
//        $input['photo'] = $request->file('photo');
//        return $input;
        if ($validation->passes()) {
            $sql = StudentProfile::create($input);
            return response()->json([
                'message' => 'Image Uploaded Successfully',
                'class_name' => 'bg-primary'
            ]);
        } else {
            $message = $validation->errors()->all();
            return response()->json([
                'message' => $message,
                'class_name' => 'bg-danger'
            ]);

        }


    }

}
