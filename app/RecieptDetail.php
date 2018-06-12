<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecieptDetail extends Model
{
    //
    protected $fillable = ['student_fee_id', 'amount', 'fee_id'];

    public function student_fee()
    {
        return $this->belongsTo('App\StudentFee');
    }

    public function fee()
    {
        return $this->belongsTo('App\Fee');
    }

    public function school_session()
    {
        return $this->belongsTo('App\SchoolSession');
    }

}
