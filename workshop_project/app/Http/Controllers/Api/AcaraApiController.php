<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraApiController extends Controller
{
    public function index()
    {
        # code...
        $acara = Acara::all();
        $response = [
            "code" => 201,
            "message" => "success",
            "data" => $acara
        ];
        return response()->json($response);
    }
}
