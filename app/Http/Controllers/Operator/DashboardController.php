<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Club;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Club::where('id_user',Auth::user()->id)->first();
        return view('operator.dashboard.index', ['model'=>$model]);
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
    public function update(Request $request)
    {
        $model = Club::where('id_user',Auth::user()->id)->first();
        $user = Auth::user();

        $rules = [
            'nama' => 'required',
            'email' => 'required|string|email|max:255',
            'telp' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ];
        if($request->password != ""){
            $rules['password'] = 'required|string|min:6|confirmed';
            $user->password = \Hash::make($request->password);
        }

        if($user->email != $request->email){
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }

        $this->validate($request, $rules);

        $user->name = $request->nama;
        $user->email = $request->email;
        $user->isActive = $request->status;
        $user->save();

        $model->nama = $request->nama;
        $model->telp = $request->telp;
        $model->alamat = $request->alamat;
        $model->lat = $request->lat;
        $model->long = $request->long;
        $model->keterangan = $request->keterangan;
        $model->status = $request->status;
        $model->save();

        return redirect()->back();
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
