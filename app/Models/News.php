<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function club()
    {
        return $this->belongsTo('App\Models\Club', 'id_club', 'id');
    }

    public function getStatusTextAttribute($value)
    {
        $status = ['1'=>'Active', '0'=>'Expired'];
        //die($this->status);

        return $status[$this->status];
    }
}
