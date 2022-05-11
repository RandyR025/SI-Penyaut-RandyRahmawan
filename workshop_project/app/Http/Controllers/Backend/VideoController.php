<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Video;
use Storage;
use Auth;
use File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        $no = 1;
        //dd($video);
        // $videos = $video->video;
        // $coba = Storage::url('Video/'.$videos);
        //dd($coba);
        return view('backend.list_video', compact('video','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tambah_video');
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
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi'=>'required|min:10',
         ]);
        $id = Auth::user()->id;
        $tanggal = Carbon::parse($request->tanggal);
        $judul = $request->judul;
        $videos = new Video;
        $videos->judul = $request->judul;
        $videos->tanggal = $tanggal;
        if ($request->hasFile('video')) {
            $files = $request->file('video');
            $newFileName = "";
            $fileExt = $files->extension();
            $newFileName = $judul . '.' . $fileExt;
            $path = public_path().'/videos';
            $files->move($path, $newFileName);
            $videos->video = $newFileName;
        }
        $videos->deskripsi = $request->deskripsi;
        //Storage::move('public/Video/temps/'.$file, 'public/Video/'.$namafile);
        $videos->user = $id;
        $videos->save();
        return redirect()->route('video.index')->with('success','Video Telah Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('backend.show_video', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('backend.tambah_video', compact('video'));
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
        $tanggal = Carbon::parse($request->tanggal);
        $video = Video::find($request->id);
        $video->judul = $request->judul;
        $video->tanggal = $tanggal;
        $video->deskripsi = $request->deskripsi;
        $video->save();
        return redirect()->route('video.index')->with('succes', 'Video Berhasil di perbaharui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::where('id', $id)->first();
        $path = public_path().'/videos/';
        File::delete($path.$video->video);
        $video->delete();
        return redirect()->route('video.index')->with('error', 'Video Berhasil di Hapus!');
    }
}
