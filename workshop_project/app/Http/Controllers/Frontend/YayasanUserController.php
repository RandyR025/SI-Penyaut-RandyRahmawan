<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yayasan;

class YayasanUserController extends Controller
{
    public function index()
    {
        $yayasan = Yayasan::all();
        return view('frontend.yayasan',compact('yayasan'));
    }

    public function show($id)
    {
        $yayasan = Yayasan::find($id);
        return view('frontend.detail_yayasan',compact('yayasan'));
    }
}
