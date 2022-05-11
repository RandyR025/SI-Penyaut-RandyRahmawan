<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donasi;
use App\Models\DetailDonasi;
use Carbon\Carbon;
use Auth;

class DonasiApiController extends Controller
{
    public function index()
    {
        # code...
        $donasi = Donasi::where('is_active','1')->get();
        return response()->json(['code' => 201,'message' => 'success', 'data' => $donasi  ]);
    }

    public function donate(Request $request)
    {

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

        $response = [
            'data' => $donate
        ];

        return response()->json($response);
    }

    public function listDonate()
    {
        $id = Auth::user()->id;
        $donate = DetailDonasi::Where('users',$id)
            ->Join('donasi', 'detail_donasi.donasi', '=', 'donasi.id')
            ->get(['detail_donasi.*', 'donasi.nama_donasi']);

        $response = [
            'code' => '201',
           'message' => 'success', 
          'data' => $donate
        ];
    
        return response()->json($response);
    }

    public function uploadBukti(Request $request)
    {
        if ($request->hasfile('bukti_transfer')) {
            $bukti = $request->file('bukti_transfer');
            $namabukti = $request->id.'-'.$bukti->getClientOriginalName();
            $pathbukti = $bukti->move('images/buktitransfer',$namabukti);
            $detail = DetailDonasi::find($request->id);
            $detail->bukti_transfer = $namabukti;
            $detail->konfirmasi = 2;
            $detail->save();
        }
        return response()->json($detail);
    }
}
