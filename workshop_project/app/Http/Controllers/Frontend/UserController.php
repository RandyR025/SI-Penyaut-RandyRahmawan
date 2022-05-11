<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\Yayasan;
use App\Models\Acara;
class UserController extends Controller
{
    public function index()
    {
        # code...
        $donasi = Donasi::where('is_active','1')->paginate(3);
        $artikel = Artikel::paginate(3);
        $yayasan = Yayasan::paginate(3);
        $acara = Acara::paginate(2);
        $countAcara = Acara::count();
        $countDonasi = Donasi::where('is_active',1)->count();
        $countYayasan = Yayasan::count();
        $countArtikel = Artikel::count();
        return view('frontend.home', compact('artikel','donasi','yayasan','acara','countAcara','countDonasi','countYayasan','countArtikel'));
    }
}
