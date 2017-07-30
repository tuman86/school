<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    //
    protected $fillable = ['student_fee_id', 'amount', 'fee_id', 'student_id', 'user_id'];

    public function student_fee()
    {
        return $this->belongsTo('App\StudentFee');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

}
