<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Video;
use App\Models\Yayasan;
use App\Models\Artikel;

class DashboardController extends Controller
{
    public function index()
    {
      $donasi =  Donasi::count();
      $yayasan = Yayasan::count();
      $video = Video::count();
      $artikel = Artikel::count();
      return view('backend.dashboard', compact('donasi','yayasan','video','artikel'));
    }
}
