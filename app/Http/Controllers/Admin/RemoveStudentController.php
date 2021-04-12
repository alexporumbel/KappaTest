<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Student;

class RemoveStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(Student $student){
        $student->delete();
        return back()->with('success','Student has been deleted');;
    }

}
