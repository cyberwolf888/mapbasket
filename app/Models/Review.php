<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public function lapangan()
    {
        return $this->belongsto('App\Models\Lapangan', 'id_lapangan');
    }

    public function club()
    {
        return $this->belongsTo('App\Models\Club', 'id_club');
    }

    public function getStatusTextAttribute($value)
    {
        $status = ['1'=>'Approved', '2'=>'Verification', '0'=>'Rejected'];
        //die($this->status);

        return $status[$this->status];
    }
}
