<?php

namespace App\Http\Controllers\Operator;

use Auth;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $club = Auth::user()->club;
	    $model = Prestasi::where('id_club', $club->id)->orderBy('created_at','DESC')->get();
	    return view('operator.prestasi.index', ['club'=>$club, 'model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $club = Auth::user()->club;
	    return view('operator.prestasi.form', ['club'=>$club]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $club = Auth::user()->club;

	    $model = new Prestasi();
	    $model->id_club = $club->id;
	    $model->prestasi = $request->prestasi;
	    $model->save();

	    return redirect()->route('operator.prestasi.manage');
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
	    $model = Prestasi::find($id);
	    $model->delete();
	    return redirect()->back();
    }
}
