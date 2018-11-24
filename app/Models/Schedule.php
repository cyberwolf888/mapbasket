<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    const APPROVED = 1;
    const VERIFICATION = 2;
    const CANCELED = 0;
    protected $table = 'schedule';

    public function lapangan() {
        return $this->belongsTo('App\Models\Lapangan', 'id_lapangan');
    }

    public function club() {
        return $this->belongsTo('App\Models\Club', 'id_club');
    }

    public function getTableColorAttribute($value)
    {
        $color = ['1'=>'table-success', '2'=>'', '0'=>'table-danger'];

        return $color[$this->status];
    }

    public function getStatusTextAttribute($value)
    {
        $status = ['1'=>'Approved', '2'=>'Verification', '0'=>'Rejected'];
        //die($this->status);

        return $status[$this->status];
    }
    

}
