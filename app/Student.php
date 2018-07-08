<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'gender', 'admission_number', 'date_of_birth', 'admission_date', 'address', 'city', 'state', 'country', 'zip_code', 'aadhar_number', 'bank_account_number', 'ifsc_code', 'comments', 'category', 'religion', 'mothier_tongue', 'rte_act', 'medium_instruction', 'house', 'session', 'class', 'section', 'nationality', 'student_photo', 'father_name', 'mother_name', 'mobile'];

    public function student_fees()
    {
        return $this->hasMany('App\StudentFee');
    }

    public function reciepts()
    {
        return $this->hasMany('App\Reciept');
    }

    public function guardians()
    {
        return $this->hasMany('App\Guardian');
    }

    public function student_session_records()
    {
        return $this->hasMany('App\StudentClassRecord');
    }
}
