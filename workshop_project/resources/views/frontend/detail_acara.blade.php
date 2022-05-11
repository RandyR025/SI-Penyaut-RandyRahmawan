@extends('frontend/layouts.template')
@section('content')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Acara</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="card mb-3">
                <img class="card-img-top"src="{{asset('images/thumbnail/'.$acara->thumbnail)}}" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title">{{$acara->nama_acara}}</h4>
                  <p class="card-text">Jam dan Tanggal : {{ $acara->jam_acara." ".$acara->tanggal_acara }}</p>
                  <p class="card-text">Tempat : {{ $acara->tempat }}</p>
                  <p class="card-text">{{$acara->deskripsi_acara}}</p>
                  <a href="{{ $acara->link_acara }}" class="btn btn-info" target="_blank">Link</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection