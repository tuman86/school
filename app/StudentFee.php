<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    //
    protected $fillable = ['student_id', 'fee_id', 'amount', 'fee_date', 'user_id', 'school_session_id'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function fee()
    {
        return $this->belongsTo('App\Fee');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function school_session()
    {
        return $this->belongsTo('App\SchoolSession');
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
}
