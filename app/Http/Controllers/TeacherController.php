<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public  function show()
    {
        return view('teacher.showstudent');
    }
    public function add()
    {
        return view('teacher.addstudent');
    }
    public function crete(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

}
