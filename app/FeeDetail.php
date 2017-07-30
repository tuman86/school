<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeDetail extends Model
{
    //
    protected $fillable = ['student_fee_id', 'amount', 'fee_id', 'deposited_fee', 'balance_fee'];

    public function student_fee()
    {
        return $this->belongsTo('App\StudentFee');
    }

    public function fee()
    {
        return $this->belongsTo('App\Fee');
    }

}
