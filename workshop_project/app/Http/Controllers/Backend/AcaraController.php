<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;
use File;
use DB;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acara = Acara::all();
        $no = 1;
        return view('backend.data_acara',compact('acara','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tambah_acara');
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
            'acara' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'deskripsi'=>'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg,jfif',
            'link' => 'required',
            'tempat' => 'required'
         ]);
        $acara =  new Acara();
        $acara->nama_acara = $request->acara;
        $acara->jam_acara = $request->jam;
        $acara->tanggal_acara = $request->tanggal;
        $acara->deskripsi_acara = $request->deskripsi;
        $acara->link_acara = "http://".$request->link;
        $acara->tempat = $request->tempat;
        $sampul = $request->thumbnail;
        $sampulName = $sampul->getClientOriginalName();
        $sampul->move(public_path('images/thumbnail'),$sampulName);
        $acara->thumbnail = $sampulName;
        $acara->save();
        return redirect()->route('acara.index')->with('success', 'Data Acara Berhasil di Simpan!');
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
        $acara = Acara::where('id',$id)->first();
        return view('backend.tambah_acara',compact('acara'));

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
        $acara = Acara::find($id);
        $acara->nama_acara = $request->acara;
        $acara->jam_acara = $request->jam;
        $acara->tanggal_acara = $request->tanggal;
        $acara->deskripsi_acara = $request->deskripsi;
        $acara->link_acara = $request->link;
        if ($request->hasFile('thumbnail')) {
            $gambar = DB::table('acara')->where('id',$id)->first();
            File::delete('images/thumbnail/'.$gambar->thumbnail);
            $sampul = $request->thumbnail;
            $sampulName = $sampul->getClientOriginalName();
            $sampul->move(public_path('images/thumbnail'),$sampulName);
            $acara->thumbnail = $sampulName;
        }
        $acara->save();
        return redirect()->route('acara.index')->with('success','Data Acara Telah Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = DB::table('acara')->where('id',$id)->first();
        File::delete('images/thumbnail/'.$gambar->thumbnail);
        Acara::find($id)->delete();
        return redirect()->route('acara.index')->with('error', 'Data Artikel Berhasil di Hapus!');
    }
}
