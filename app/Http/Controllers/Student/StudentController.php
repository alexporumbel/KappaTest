<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class StudentController extends Controller
{

    public function index()
    {
        return view('student.register');
    }

    public function store(StudentStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['birthDate'] = Carbon::createFromFormat('d-m-Y', $validated['birthDate']);

        Student::create($validated);

        return back()->with('success','Registration Complete');
    }
}
