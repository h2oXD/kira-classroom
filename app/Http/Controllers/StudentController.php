<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW_CLIENT = 'clients.students.';
    public function dashboard()
    {

        $student = Student::with(['classrooms'])->where('user_id', Auth::user()->id)->first();
        return view(self::PATH_VIEW_CLIENT . __FUNCTION__,compact('student'));
    }
    public function classrooms()
    {
        $classrooms = Classroom::with(['teacherUsers', 'subjects'])->paginate(10);
        return view(self::PATH_VIEW_CLIENT . __FUNCTION__, compact('classrooms'));
    }
    public function index()
    {
        $students = Student::with('classroom')->paginate(10);
        return view('admins.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
