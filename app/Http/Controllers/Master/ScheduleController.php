<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Schedule::orderBy('created_at', 'DESC')->get();
        return view('master.schedule.index', ['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve(Request $request)
    {
        $model = Schedule::find($request->id);

        $valid = Schedule::whereRaw("id_lapangan = ? AND tgl = ? AND (? > start AND ? < end) AND id <> ?", [$model->id_lapangan, $model->tgl, $model->end, $model->start, $model->id])->get();
        
        if($valid->count() > 0){
            \Session::flash('message', 'This schedule is conflict with other schedule. Do you want to approve this schedule?');
            \Session::flash('id', $model->id);
        }else{
            $model->status = Schedule::APPROVED;
            $model->keterangan = $request->keterangan;
            $model->save();
        }

        return redirect()->back();
    }

    public function force_approve(Request $request)
    {
        $model = Schedule::find($request->id);
        $model->status = Schedule::APPROVED;
        $model->keterangan = $request->keterangan;
        $model->save();
        return redirect()->back();
    }

    public function reject(Request $request)
    {
        $model = Schedule::find($request->id);
        $model->status = Schedule::CANCELED;
        $model->keterangan = $request->keterangan;
        $model->save();

        return redirect()->back();
    }
}
