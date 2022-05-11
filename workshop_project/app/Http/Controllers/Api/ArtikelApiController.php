<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;

class ArtikelApiController extends Controller
{
    public function index()
    {
        # code...
        $artikel = Artikel::all();
        return response()->json(['kode' => 201,'pesan' => 'success', 'data' => $artikel  ]);
    }

    public function show($id)
    {
        # code...
        $artikel = Artikel::find($id)->first();
        return response()->json($artikel, 201);
    }

    public function search(){ 

            $search_text = $_GET['query'];
            $artikel = DB::table('artikel')->where('judul_artikel', 'LIKE','%'.$search_text.'%')->get();
            return response()->json(['data'=>$artikel]);
    }
}
