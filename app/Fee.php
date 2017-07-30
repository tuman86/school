<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //
    protected $fillable = ['title', 'fee_amount'];

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
}
