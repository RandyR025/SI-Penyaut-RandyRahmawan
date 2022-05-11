<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoApiController extends Controller
{
    public function index()
    {
        # code...
        $video = Video::all();
        $response = [
            "code" => 201,
            "message" => "success",
            "data" => $video
        ];
        return response()->json($response);
    }
}
