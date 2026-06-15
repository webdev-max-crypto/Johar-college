<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    protected $fillable = [
        'full_name', 'father_name', 'cnic_bform', 'email', 'phone',
        'gender', 'dob', 'address', 'city', 'program_id', 'session_id',
        'matric_marks', 'matric_total', 'inter_marks', 'inter_total',
        'photo', 'cnic_document', 'cnic_bform', 'documents', 'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
