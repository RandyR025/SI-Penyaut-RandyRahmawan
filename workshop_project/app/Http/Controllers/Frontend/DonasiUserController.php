<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\DetailDonasi;
use Carbon\Carbon;
use Redirect;
use Auth;


class DonasiUserController extends Controller
{
    public function index()
    {
        # code...
        $donasi = Donasi::where('is_active','1')->paginate(6);
        return view('frontend.donasi',compact('donasi'));
    }

    public function show($id)
    {
        if (!Auth::user()) {
            # code...
            return redirect()->route('login')->with('error','Silahkan Login terlebih Dahulu');
        }
        $donasi = Donasi::find($id);
        return view('frontend.donate',compact('donasi'));
    }

    public function donate(Request $request)
    {
        # code...
        $this->validate($request, [
            'keterangan' => 'required',
            'metode' => 'required',
            'nominal' => 'required|numeric',
         ]);
        $id = Auth::user()->id;
        $date = Carbon::now()->toDateTimeString();
        $donate = new DetailDonasi;
        $donate->donasi = $request->donasi;
        $donate->keterangan = $request->keterangan;
        $donate->tanggal = $date;
        $donate->nominal = $request->nominal; 
        $donate->konfirmasi = 0;
        $donate->metode_pembayaran = $request->metode;
        $donate->users = $id;
        $donate->save();
        return view('frontend.rekeningbank');
    }

    public function list()
    {
        # code...
        $no = 1;
        $id = Auth::user()->id;
        $donasi = DetailDonasi::join('donasi', 'detail_donasi.donasi', '=', 'donasi.id')->where('users',$id)->get(['detail_donasi.*', 'donasi.nama_donasi']);
        return view('frontend.listdonasi', compact('donasi','no'));
    }

    public function uploadbukti($id)
    {
        # code...
        $detail = DetailDonasi::findOrFail($id);
        return view('frontend.buktidonasi', compact('detail'));
    }
    
    public function updatebukti(Request $request)
    {
        # code...
        $this->validate($request, [
            'bukti'=>'required|mimes:png,jpeg,jpg,jfif',
         ]);
        if ($request->hasfile('bukti')) {
            $bukti = $request->file('bukti');
            $namabukti = $request->id.'-'.$bukti->getClientOriginalName();
            $pathbukti = $bukti->move('images/buktitransfer',$namabukti);
            $detail = DetailDonasi::find($request->id);
            $detail->bukti_transfer = $namabukti;
            $detail->konfirmasi = 2;
            $detail->save();
        }

        return redirect()->route('donasiuser.list');
    }
}
