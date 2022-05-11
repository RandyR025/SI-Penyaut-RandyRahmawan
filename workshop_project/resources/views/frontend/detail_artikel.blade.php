@extends('frontend/layouts.template')
@section('content')
  <!-- bradcam_area_start  -->
  <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text text-center">
                      <h3>Deskripsi</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{ asset('images/'.$artikel->sampul)}}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{$artikel->judul_artikel}}
                     </h2>
                     <p class="excert">
                     {!! html_entity_decode($artikel->isi_artikel) !!}
                     </p>
                  </div>
               </div>
   </section>
   @endsection
   <!--================ Blog Area end =================-->