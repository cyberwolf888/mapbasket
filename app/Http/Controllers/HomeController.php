<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Club;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('q') && $request->has( 'category')){
        	if($request->category == 0){
		        $lapangan = Lapangan::where('status',1)->where('nama','like', \DB::raw('"%'.$request->q.'%"'))->get();
		        $club = Club::where('status',1)->where('nama','like',\DB::raw('"%'.$request->q.'%"'))->get();
	        }elseif ($request->category == 1){
		        $lapangan = Lapangan::where('status',1)->where('nama','like', \DB::raw('"%'.$request->q.'%"'))->get();
		        $club = [];
	        }elseif ($request->category == 2){
		        $club = Club::where('status',1)->where('nama','like',\DB::raw('"%'.$request->q.'%"'))->get();
		        $lapangan = [];
	        }

        }else{
            $lapangan = Lapangan::where('status',1)->get();
            $club = Club::where('status',1)->get();
        }
        

        return view('frontend.home', ['lapangan'=>$lapangan, 'club'=>$club, 'request'=>$request]);
    }

    public function lapangan(Request $request)
    {
	    $query = Lapangan::where('status',1);
	    if($request->has('q') && $request->q != ''){
		    $query->whereRaw(DB::raw('nama like "%'.$request->q.'%"'));
	    }

	    if($request->has( 'order') && $request->order != ''){
		    if($request->order == 0){
			    $model = $query->get()->sortByDesc('rating');
		    }elseif ($request->order == 1){
			    $model = $query->get()->sortByDesc('luas');
		    }elseif ($request->order == 2){
			    $model = $query->get()->sortBy('luas');
		    }
	    }else{
		    $model = $query->get()->sortByDesc('rating');
	    }

        return view('frontend.lapangan', ['model'=>$model]);
    }

    public function club(Request $request)
    {
        $query = Club::where('status',1);
        if($request->has('q') && $request->q != ''){
        	$query->whereRaw(DB::raw('nama like "%'.$request->q.'%"'));
        }

        if($request->has('recruitment') && $request->recruitment != 0){
        	if($request->recruitment == 2){
		        $query->where('recruitment',0);
	        }elseif($request->recruitment == 1){
		        $query->where('recruitment',1);
	        }
        }

	    if($request->has('coach') && $request->coach != 0){
		    if($request->coach == 2){
			    $query->whereRaw(DB::raw('pelatih IS NULL'));
		    }elseif($request->coach == 1){
			    $query->whereRaw(DB::raw('pelatih IS NOT NULL'));
		    }
	    }

	    if($request->has('difable') && $request->difable != 0){
		    if($request->difable == 2){
			    $query->whereRaw(DB::raw('difable = 0'));
		    }elseif($request->difable == 1){
			    $query->whereRaw(DB::raw('difable = 1'));
		    }
	    }


	    if($request->has( 'order') && $request->order != ''){
		    if($request->order == 0){
			    $model = $query->get()->sortByDesc('jml_anggota');
		    }elseif ($request->order == 1){
			    $model = $query->get()->sortBy('iuran');
		    }elseif ($request->order == 2){
			    $model = $query->get()->sortByDesc('iuran');
		    }elseif ($request->order == 3){
			    $model = $query->get()->sortByDesc(function ($value, $key) {
				    return $value->prestasi->count();
			    });
		    }elseif ($request->order == 4){
			    $model = $query->get()->sortByDesc('id');
		    }elseif ($request->order == 5){
			    $model = $query->get()->sortBy('id');
		    }
	    }else{
		    $model = $query->get()->sortByDesc('jml_anggota');
	    }


	    $jarak= [];
	    $link = '';
	    if($request->has( 'lat') && $request->lat != '' && $request->has( 'lon') && $request->lon != '' ){
        	$destinations = "";
        	foreach ($model as $mod){
		        $destinations.= $mod->lat.','.$mod->long.'|';
	        }
		    $destinations = substr( $destinations, 0,-1);
        	$origins = $request->lat.','.$request->lon;
        	$link = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$origins.'&destinations='.$destinations.'&key='.env( 'MAP_API_KEY');

		    $json = file_get_contents($link);
		    $obj = json_decode($json);
		    $jarak = $obj->rows[0]->elements;

	    }

        return view('frontend.club', ['model'=>$model, 'jarak'=>$jarak, 'link'=>$link]);
    }

    public function detail_lapangan($id)
    {
        $model = Lapangan::find($id);
        if($model){
            return view('frontend.detail_lapangan', ['model'=>$model]);
        }

        return redirect()->back();
    }

    public function detail_club($id)
    {
        $model = Club::find($id);
        if($model){
            return view('frontend.detail_club', ['model'=>$model]);
        }

        return redirect()->back();
    }

    public function post_review(Request $request)
    {
        $this->validate($request,[
            'rating'=>'required',
            'review'=>'required'
        ]);

        $model = new Review();
        $model->id_lapangan = $request->id_lapangan;
        $model->id_club = $request->id_club;
        $model->rating = 6-$request->rating;
        $model->review = $request->review;
        $model->status = 2;
        $model->save();

        return redirect()->back();
    }

    public function difable_mode($mode)
    {
	    session(['difable_mode'=> $mode]);

	    return redirect()->back();
    }
}
