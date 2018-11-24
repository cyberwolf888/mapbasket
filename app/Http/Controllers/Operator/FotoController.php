<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\FotoClub;
use Image;
use File;


class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Auth::user()->club;
        $model = FotoClub::where('id_club', $club->id)->orderBy('created_at','DESC')->get();
        return view('operator.foto.index', ['club'=>$club, 'model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = Auth::user()->club;
        return view('operator.foto.form', ['club'=>$club]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->club->id;
        $this->validate($request, [
            'image' => 'required|image'
        ]);
    
        $model = new FotoClub();
        $path = base_path('assets/images/club/'.$id.'/');
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
        Image::make($request->file('image'))->crop(270, 311)->encode('jpg', 80)->save($path.'thumb_'.$file->basename);

        $model->id_club = $id;
        $model->file = $file->basename;
        $model->save();

        return redirect()->route('operator.foto.manage');
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
        $model = FotoClub::find($id);
        $id_club = $model->id_club;
        $path = base_path('assets/images/club/'.$id_club.'/');
        if(is_file($path.$model->file)){
            unlink($path.$model->file);
            unlink($path.'thumb_'.$model->file);
        }
        $model->delete();
        return redirect()->back();
    }
}
