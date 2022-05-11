@extends('frontend/layouts.template')
@section('content')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Videos</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="single_cause">
                    <div class="thumb">  
                    </div>
                    <div class="causes_content">
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <center>
                        <video controls width="920px" height="720px" >
                            <source src="{{ asset('videos/'.$videos->video)}}">
                        </video>
                        </center>
                        <h2>{{ $videos->judul }}</h2>
                        <p class="excert">{{ $videos->deskripsi }}</p>
                        <p>{{ $videos->tanggal }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection