<?php

namespace App\Http\Controllers;


use App\Models\Program;
use App\Models\AcademicSession;
use Illuminate\Http\Request;
use App\Models\StudentApplication;
use App\Models\TeacherApplication;

class AdmissionController extends Controller
{
    public function create()
    {
        $programs = Program::all();
        $sessions = AcademicSession::all();
       
        return view('admission.create', compact(
            'programs',
            'sessions'
        ));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'full_name'     => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'father_name'   => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email'         => 'required|email',
            'gender'        => 'required',
            'city'          => 'required',
            'address'       => 'required',
            'program_id'    => 'required',
            'session_id'    => 'required',
            'phone'         => 'required|min:10|max:15',
            'cnic_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $data = [
            'full_name'   => $request->full_name,
            'father_name' => $request->father_name,
            'email'       => $request->email,
            'gender'      => $request->gender,
            'city'        => $request->city,
            'address'     => $request->address,
            'program_id'  => $request->program_id,
            'session_id'  => $request->session_id,
            'dob'         => $request->dob,
            'phone'       => '+92' . $request->phone,
        ];

        if ($request->hasFile('cnic_document')) {
            $data['cnic_document'] = $request->file('cnic_document')->store('cnic_documents', 'public');
        }

        StudentApplication::create($data);

        return redirect()->route('admission.create')->with('success', 'Application Submitted Successfully');
    }}