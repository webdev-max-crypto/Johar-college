<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherApplication extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone', 'cnic',
        'qualification', 'specialization',
        'experience_years', 'experience',
        'subject', 'cv', 'photo',
        'cover_letter', 'status',
    ];
}
