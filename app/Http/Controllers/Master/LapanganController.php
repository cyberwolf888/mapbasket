<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use App\Models\FotoLapangan;
use Image;
use File;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Lapangan::orderBy('created_at','DESC')->get();
        return view('master.lapangan.index',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Lapangan();
        return view('master.lapangan.form',['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'luas' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $model = new Lapangan();
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->lat = $request->lat;
        $model->long = $request->long;
	    $model->luas = $request->luas;
        $model->keterangan = $request->keterangan;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('master.lapangan.foto.create', ['id'=>$model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Lapangan::find($id);
        return view('master.lapangan.detail',['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Lapangan::find($id);
        return view('master.lapangan.form',['model'=>$model,'update'=>true]);
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
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'luas' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $model = Lapangan::find($id);
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->lat = $request->lat;
        $model->long = $request->long;
	    $model->luas = $request->luas;
        $model->keterangan = $request->keterangan;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('master.lapangan.manage');
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


    public function foto_index($id)
    {
        $lapangan = Lapangan::find($id);
        $model = FotoLapangan::where('id_lapangan',$id)->get();

        return view('master.lapangan.foto.index',['lapangan'=>$lapangan, 'model'=>$model]);

    }

    public function foto_create($id)
    {
        $lapangan = Lapangan::find($id);

        return view('master.lapangan.foto.form',['lapangan'=>$lapangan]);
    }

    public function foto_store(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);
    
        $model = new FotoLapangan();
        $path = base_path('assets/images/lapangan/'.$id.'/');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        Image::make($request->file('image'))->crop(270, 311)->encode('jpg', 80)->save($path.'thumb_'.$file->basename);

        $model->id_lapangan = $id;
        $model->file = $file->basename;
        $model->save();

        return redirect()->route('master.lapangan.foto.manage',$id);
    }

    public function foto_destroy($id)
    {
        $model = FotoLapangan::find($id);
        $id_lapangan = $model->id_lapangan;
        $path = base_path('assets/images/lapangan/'.$id_lapangan.'/');
        if(is_file($path.$model->file)){
            unlink($path.$model->file);
            unlink($path.'thumb_'.$model->file);
        }
        $model->delete();
        return redirect()->back();
    }
}
