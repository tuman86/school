<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    //
    protected $fillable = ['student_id', 'first_name', 'last_name', 'email', 'contact_number'];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

}
