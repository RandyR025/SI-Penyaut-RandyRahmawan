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
            @foreach ($acara as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/thumbnail/'.$item->thumbnail)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('acarauser.show',$item->id)}}">{{$item->nama_acara}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection