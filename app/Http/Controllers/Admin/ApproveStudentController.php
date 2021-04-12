<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Notifications\AccountApproved;
use Illuminate\Support\Facades\Notification;

class ApproveStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Student $student){
        $student->isActive = true;
        $student->save();

        // $student->notify(new AccountApproved());
        Notification::send($student, new AccountApproved());
        return back()->with('success','Student has been approved');
    }

}
