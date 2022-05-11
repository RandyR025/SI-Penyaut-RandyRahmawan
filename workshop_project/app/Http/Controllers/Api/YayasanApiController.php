<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yayasan;
use Illuminate\Support\Facades\DB;

class YayasanApiController extends Controller
{
    public function index()
    {
        # code...
        $yayasan = Yayasan::all();
        return response()->json(['code' => 201,'message' => 'success', 'data' => $yayasan  ]);
    }

    public function search(){ 

        $search_text = $_GET['query'];
        $yayasan = DB::table('yayasan')->where('nama_yayasan', 'LIKE','%'.$search_text.'%')->get();
        return response()->json(['data'=>$yayasan]);
}
}
