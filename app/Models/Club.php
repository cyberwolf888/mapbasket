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

    public function prestasi()
    {
    	return $this->hasMany( 'App\Models\Prestasi', 'id_club', 'id');
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

	public function getTxtIuranAttribute($value)
	{
		$tipe_iuran = ['1'=>'Month', '2'=>'Week'];

		if(!is_null($this->iuran)){
			if($this->iuran == 0){
				return "Free";
			}
			return number_format( $this->iuran,0,',','.').' /'.$tipe_iuran[$this->type_iuran];
		}

		return "Free";

	}

	public function getTxtRecruitmentAttribute($value)
	{
		$tipe = ['1'=>'Open', '0'=>'Closed'];


		return $tipe[$this->recruitment];

	}
}
