@extends('frontend/layouts.template')
@section('content')
<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Artikel</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    @foreach ($artikel as $artikell)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('images/'.$artikell->sampul)}}" alt="">
                                    <h3 class="blog_item_date">{{$artikell->tanggal}}</h3>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('artikell.show', $artikell->url_artikel)}}">
                                    <h2>{{$artikell->judul_artikel}}</h2>
                                </a>
                                <div class="max tittle" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical;">{!! html_entity_decode($artikell->isi_artikel) !!}</div>
                            </div>
                        </article>
                    @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                        {{ $artikel->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="{{route('artikell.index')}}" method="GET">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="query" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

    </section>
    @endsection
    <!--================Blog Area =================-->