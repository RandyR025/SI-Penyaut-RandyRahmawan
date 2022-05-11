@extends('frontend.layouts.template')
@section('content')

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="slider_text ">
                        <span>Get Started Today.</span>
                        <h3> Help the children
                            When They Need</h3>
                        <p>With so much to consume and such little time, coming up <br>
                            with relevant title ideas is essential</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- reson_area_start  -->
<div class="reson_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Artikel</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($artikel as $item)
                
            <div class="col-lg-4 col-md-6">
                <div class="single_reson">
                    <div class="thum">
                        <div class="thum_1">
                            <img src="{{ asset('images/'.$item->sampul)}}" alt="">
                        </div>
                    </div>
                    <div class="help_content">
                        <h4>{{ $item->judul_artikel }}</h4>
                        <div class="max tittle" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical;">
                             {!! html_entity_decode($item->isi_artikel) !!}</div>
                        <a href="{{route('artikell.show', $item->url_artikel)}}" class="read_more">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- reson_area_end  -->

<!-- popular_causes_area_start  -->
<div class="popular_causes_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Donasi</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="causes_active owl-carousel">
                    @foreach ($donasi as $all)
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="{{ asset('images/'.$all->banner)}}" alt="">
                        </div>
                        <div class="causes_content">
                            <h4>{{ $all->nama_donasi }}</h4>
                            <p>{{ $all->keterangan }}</p>
                            <a class="read_more" href="{{route('donasi.show', $all->id)}}">Donate</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_end  -->

<!-- counter_area_start  -->
<div class="counter_area">
    <div class="container">
        <div class="counter_bg overlay">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-calendar"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">{{$countArtikel}}</h3>
                            <p>Artikel</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-heart-beat"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">{{$countDonasi}}</h3>
                            <p>Donasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-in-love"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">{{$countYayasan}}</h3>
                            <p>Yayasan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-hug"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">{{$countAcara}}</h3>
                            <p>Acara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- counter_area_end  -->

<!-- our_volunteer_area_start  -->
<div class="our_volunteer_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Yayasan</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($yayasan as $item)
            <div class="col-lg-4 col-md-6">
                <div class="single_volenteer">
                    <div class="volenteer_thumb">
                        <img src="{{ asset('images/'.$item->dokumentasi)}}" alt="">
                    </div>
                    <div class="voolenteer_info d-flex align-items-end">
                        <div class="info_inner">
                            <h4>{{ $item->nama_yayasan }}</h4>
                            <p>{{ $item->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- our_volunteer_area_end  -->

<!-- news__area_start  -->
<div class="news__area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Acara</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                
                <div class="news_active owl-carousel">
                    @foreach ($acara as $item)
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="{{ asset('images/thumbnail/'.$item->thumbnail)}}" alt="">
                        </div>
                        <div class="newsinfo">
                            <span>{{$item->jam_acara.", ".$item->tanggal_acara}}</span>
                            <a href="single-blog.html">
                                <h3>{{$item->nama_acara}}</h3>
                            </a>
                            <a class="read_more" href="{{route('acarauser.show',$item->id)}}">Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- news__area_end  -->

<div data-scroll-index='1' class="make_donation_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Make a Donation</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="donate_now_btn text-center">
                    <a href="{{route('donasiuser.index')}}" class="boxed-btn4">Donate Now</a>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection