<?php

namespace App\Http\Controllers\Master;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\User;
use App\Models\FotoClub;
use File;
use Image;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Club::orderBy('created_at','DESC')->get();
        return view('master.club.index',['model'=>$model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Club();
        return view('master.club.form', ['model'=>$model]);
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
            'email' => 'required|string|email|max:255|unique:users',
            'telp' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'alamat' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->isActive = $request->status;
        $user->type = User::OPERATOR;
        $user->save();

        $model = new Club();
        $model->id_user = $user->id;
        $model->nama = $request->nama;
        $model->telp = $request->telp;
        $model->alamat = $request->alamat;
        $model->lat = $request->lat;
        $model->long = $request->long;
		$model->recruitment = $request->recruitment;
	    $model->pelatih = $request->pelatih;
	    $model->jml_anggota = $request->jml_anggota;
	    $model->iuran = $request->iuran;
	    $model->difable = $request->difable;
	    $model->type_iuran = $request->type_iuran;
        $model->keterangan = $request->keterangan;
        $model->status = $request->status;
        $model->save();

        

        return redirect()->route('master.club.foto.create', ['id'=>$model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Club::find($id);
        return view('master.club.detail', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Club::find($id);
        return view('master.club.form', ['model'=>$model, 'update'=>true]);
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

        $model = Club::find($id);
        $user = $model->user;

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
        $user->type = User::OPERATOR;
        $user->save();

        
        $model->id_user = $user->id;
        $model->nama = $request->nama;
        $model->telp = $request->telp;
        $model->alamat = $request->alamat;
        $model->lat = $request->lat;
        $model->long = $request->long;
	    $model->recruitment = $request->recruitment;
	    $model->pelatih = $request->pelatih;
	    $model->jml_anggota = $request->jml_anggota;
	    $model->iuran = $request->iuran;
	    $model->difable = $request->difable;
	    $model->type_iuran = $request->type_iuran;
        $model->keterangan = $request->keterangan;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('master.club.manage', ['id'=>$model->id]);
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
        $club = Club::find($id);
        $model = FotoClub::where('id_club',$id)->get();

        return view('master.club.foto.index',['club'=>$club, 'model'=>$model]);

    }

    public function foto_create($id)
    {
        $club = Club::find($id);

        return view('master.club.foto.form',['club'=>$club]);
    }

    public function foto_store(Request $request, $id)
    {
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

        return redirect()->route('master.club.foto.manage',$id);
    }

    public function foto_destroy($id)
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


    public function prestasi_index($id)
    {
	    $club = Club::find($id);
	    $model = Prestasi::where('id_club',$id)->get();

	    return view('master.club.prestasi.index',['club'=>$club, 'model'=>$model]);
    }

	public function prestasi_create($id)
	{
		$club = Club::find($id);

		return view('master.club.prestasi.form',['club'=>$club]);
	}

	public function prestasi_store(Request $request, $id)
	{
		$model = new Prestasi();
		$model->id_club = $id;
		$model->prestasi = $request->prestasi;
		$model->save();

		return redirect()->route('master.club.prestasi.manage', ['id'=>$id]);
	}

	public function prestasi_destroy($id)
	{
		$model = Prestasi::find($id);
		$model->delete();
		return redirect()->back();
	}

}
