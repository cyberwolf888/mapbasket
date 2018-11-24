<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FotoLapangan;
use App\Models\Schedule;
use App\Models\Review;
use App\Models\Club;

class Lapangan extends Model
{
    protected $table = 'lapangan';

    public function foto()
    {
        return $this->hasMany('App\Models\FotoLapangan', 'id_lapangan');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Review', 'id_lapangan', 'id');
    }

    public function can_review($id)
    {
        $review = Review::where('id_lapangan', $this->id)->where('id_club', $id)->where('status', '<>', 0)->get();
        if($review->count() > 0){
            return false;
        }

        return true;
        
    }

    public function getThumbImgAttribute($value)
    {
        $foto = FotoLapangan::where('id_lapangan', $this->id)->orderBy('created_at','ASC')->first();
        if($foto){
            return url('assets/images/lapangan/'.$this->id.'/thumb_'.$foto->file);
        }
        
        return null;
    }

    public function getActiveScheduleAttribute($value)
    {
        return Schedule::where('id_lapangan',$this->id)->where('tgl','>=',date('Y-m-d'))->where('status',1)->orderBy('tgl','ASC')->get();
    }

    public function getRatingAttribute($value)
    {
        $query = Review::where('id_lapangan', $this->id)->where('status', '=', 1);
        $sum = $query->sum('rating');
        $count = $query->count();

        return $query->count() > 0 ? round($sum/$count,2) : 0;
        
    }

}
