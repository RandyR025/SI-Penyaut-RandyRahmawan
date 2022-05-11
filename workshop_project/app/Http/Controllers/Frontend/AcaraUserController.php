<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraUserController extends Controller
{
    public function index()
    {
        $acara = Acara::all();
        return view('frontend.acara',compact('acara'));
    }

    public function show($id)
    {
        $acara = Acara::find($id);
        return view('frontend.detail_acara',compact('acara'));
    }
}
