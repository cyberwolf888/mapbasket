<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FotoClub;

class Club extends Model
{
    protected $table = 'club';

    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }

    public function foto()
    {
        return $this->hasMany('App\Models\FotoClub', 'id_club');
    }

    public function schedule()
    {
        return $this->hasMany('App\Models\Schedule', 'id_club', 'id');
    }

    public function news()
    {
        return $this->hasMany('App\Models\News', 'id_club', 'id');
    }   

    public function getActiveScheduleAttribute($value)
    {
        return Schedule::where('id_club',$this->id)->where('tgl','>=',date('Y-m-d'))->where('status',1)->orderBy('tgl','ASC')->get();
    }

    public function getThumbImgAttribute($value)
    {
        $foto = FotoClub::where('id_club', $this->id)->orderBy('created_at','ASC')->first();
        if($foto){
            return url('assets/images/club/'.$this->id.'/thumb_'.$foto->file);
        }

        return null;
        
    }
}
