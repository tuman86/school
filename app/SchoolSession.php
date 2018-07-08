<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolSession extends Model
{
    protected $fillable = ['school_session'];

    public function student_fees()
    {
        return $this->hasMany('App\StudentFee');
    }

    public function fee_details()
    {
        return $this->hasMany('App\FeeDetail');
    }

    public function reciept_details()
    {
        return $this->hasMany('App\RecieptDetail');
    }

    public function reciepts()
    {
        return $this->hasMany('App\Reciept');
    }

    public function student_session_records()
    {
        return $this->hasMany('App\StudentClassRecord');
    }
}
