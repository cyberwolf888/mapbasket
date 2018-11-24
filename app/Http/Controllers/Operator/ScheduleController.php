<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
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
        $club = Auth::user()->club;
        $model = Schedule::where('id_club', $club->id)->orderBy('created_at', 'DESC')->get();
        return view('operator.schedule.index', ['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Schedule();
        return view('operator.schedule.form', ['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_lapangan'=>'required',
            'tgl'=>'required|date',
            'start'=>'required|date_format:H:i',
            'end'=>'required|date_format:H:i|after:start'
        ]);

        $model = new Schedule();
        $model->id_lapangan = $request->id_lapangan;
        $model->id_club = Auth::user()->club->id;
        $model->tgl = date('Y-m-d', strtotime($request->tgl));
        $model->start = $request->start;
        $model->end = $request->end;
        $model->status = Schedule::VERIFICATION;
        $model->save();

        return redirect()->route('operator.schedule.manage');
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
}
