<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClassRecord extends Model
{
    //
    protected $fillable = ['class', 'school_session_id', 'student_id'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function school_session()
    {
        return $this->belongsTo('App\SchoolSession');
    }
}
