<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Club;
use App\Models\Review;
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

    public function lapangan()
    {
        $model = Lapangan::where('status',1)->orderBy('created_at','desc')->paginate(10);

        return view('frontend.lapangan', ['model'=>$model]);
    }

    public function club()
    {
        $model = Club::where('status',1)->orderBy('created_at','desc')->paginate(10);

        return view('frontend.club', ['model'=>$model]);
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
}
