<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherApplication;

class TeacherApplicationController extends Controller
{
  

public function store(Request $request)
{
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'qualification' => 'required',
        'subject' => 'required',
        'cv' => 'nullable|file|mimes:pdf,doc,docx',
    ]);

    $cvName = null;

    if ($request->hasFile('cv')) {
        $file = $request->file('cv');
        $cvName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/cv'), $cvName);
    }

    TeacherApplication::create([
        'full_name'     => $request->full_name,
        'email'         => $request->email,
        'phone'         => $request->phone,
        'qualification' => $request->qualification,
        'subject'       => $request->subject,
        'experience'    => $request->experience,
        'cv'            => $cvName,
    ]);

    return back()->with('success', 'Application submitted successfully!');
}
}
