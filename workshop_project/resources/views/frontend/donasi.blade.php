@extends('frontend/layouts.template')
@section('content')
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Donasi</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            @foreach ($donasi as $item)
            <div class="col-lg-4 col-md-6">
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{ asset('images/'.$item->banner)}}" alt="">
                    </div>
                    <div class="causes_content">
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('donasi',$item->id)}}">
                            <h4>{{ $item->nama_donasi }}</h4>
                        </a>
                        <p>{{ $item->keterangan }}</p>
                        <a class="read_more" href="{{ url('donasi/'.$item->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <nav class="blog-pagination justify-content-center d-flex">
            {{ $donasi->links() }}
        </nav>
    </div>
</div>
@endsection