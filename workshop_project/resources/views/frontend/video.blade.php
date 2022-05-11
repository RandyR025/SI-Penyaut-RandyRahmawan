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
            @foreach ($videos as $video)
            <div class="col-lg-4 col-md-6">
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
                        <video controls width="300px" height="200px">
                            <source src="{{ asset('videos/'.$video->video)}}">
                        </video>
                            <h4>{{ $video->judul }}</h4>
                            <p
                            style="overflow: hidden; display: -webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">
                            {{ $video->deskripsi }}</p>
                        <a class="read_more" href="{{route('videos.show', $video->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection