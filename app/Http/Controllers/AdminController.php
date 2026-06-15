<?php

namespace App\Http\Controllers;

use App\Models\StudentApplication;
use App\Models\TeacherApplication;

class AdminController extends Controller
{
    public function index()
    {
        $students = StudentApplication::latest()->get();
        $teachers = TeacherApplication::latest()->get();

        return view('admin.dashboard', compact('students', 'teachers'));
    }
    public function viewStudent($id)
{
    $student = StudentApplication::with('program')->findOrFail($id);
    return view('admin.student-view', compact('student'));
}

public function approveStudent($id)
{
    $student = StudentApplication::findOrFail($id);
    $student->status = 'approved';
    $student->save();

    return back()->with('success', 'Student Approved Successfully!');
}

public function approveTeacher($id)
{
    $teacher = TeacherApplication::findOrFail($id);

    $teacher->status = 'approved';
    $teacher->save();

    return back()->with('success', 'Teacher approved successfully!');
}
}
