@extends('frontend.layouts.main')


@section('content')
  <!-- Start Page Head -->
  <section class="cs-page_head cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
    <div class="container">
      <div class="text-center">
        <h1 class="cs-page_title">{{ $tutor->name }}</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Tutors</a></li>
          <li class="breadcrumb-item active">{{ $tutor->name }}</li>
        </ol>
      </div>
    </div>
  </section>
  <!-- End Page Head -->
  <div class="cs-height_100 cs-height_lg_70"></div>
  <div class="container">
    <div class="row" style="display: flex; align-items: center; justify-content: center; margin: 0; padding: 0; height: 100vh;">
      <div class="col-lg-6" style="display: flex; justify-content: center; align-items: center; padding: 0; margin: 0;">
        <img src="{{ $tutor->image_url }}" alt="" width="500" style="display: block; max-width: 100%;">
      </div>
      <div class="col-lg-6" style="display: flex; flex-direction: column; justify-content: center; padding: 0; margin: 0;">
        <div class="cs-single_product_head">
          <h2>Enjoy a Fun Tuition</h2>
          <p>Class ({{ $tutor->category->name }}) with <a href="#" class="cs-btn cs-style1 cs-btn_m w-30 text-center">{{ $tutor->name }}</a> In <span class="cs-accent_color">MCPLUS</span> Online Tuition!</p>
          <span class="cs-card_like cs-primary_color cs-box_shadow">
            <i class="fas fa-heart fa-fw"></i> 2.1K
          </span>
        </div>
        <div class="cs-height_30 cs-height_lg_70"></div>
        <div class="cs-white_bg cs-box_shadow cs-general_box_5">
          Become PLUSIAN now and experience the future education
        </div>
        <div class="cs-height_30 cs-height_lg_70"></div>
        <div class="cs-white_bg cs-box_shadow cs-general_box_5">
          <div class="cs-social_widget" style="display: flex; justify-content: center; gap: 10px;">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="cs-height_30 cs-height_lg_70"></div>
        <div class="row">
          <div class="col-6" style="display: flex; justify-content: center;">
            <a href="#" class="cs-btn cs-style1 cs-btn_lg w-100 text-center"><span>REQUEST FREE TRIAL</span></a>
          </div>
          <div class="col-6" style="display: flex; justify-content: center;">
            <a href="#" class="cs-btn cs-style1 cs-btn_lg w-100 text-center" style="background-color: #FEBE00;"><span>REGISTER ACCOUNT</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>

      <!-- End CTA -->
      <div class="cs-height_95 cs-height_lg_70"></div>

      @if ($tutor->video_url !== null)
        <!-- Start Video Section -->
        <div class="container">
          <h2 class="cs-section_heading cs-style1 text-center">Hey Guys! Join me on MCPLUS!</h2>
          <h4 class="cs-style1 text-center pt-3" style="color: #FEBE00">We're sure you'll love us!</h4>
          <div class="cs-height_45 cs-height_lg_45"></div>
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <a href="{{ $tutor->video_url }}" class="cs-video_block cs-style1 cs-zoom_effect cs-video_open">
                <div class="cs-video_block_in">
                  <div class="cs-video_block_bg cs-bg cs-zoom_item" data-src="assets/img/video_bg.jpeg"></div>
                </div>
                <div class="cs-play_btn cs-center">
                  <svg width="28" height="33" viewBox="0 0 28 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.98474 0.457254C2.24375 -0.616351 0 0.63608 0 2.68148V30.3185C0 32.3639 2.24375 33.6164 3.98474 32.5427L26.3932 18.7242C28.0485 17.7034 28.0485 15.2966 26.3932 14.2758L3.98474 0.457254Z" fill="currentColor"/>
                  </svg>              
                </div>
              </a>
            </div>
          </div>
        </div> 
      @endif
  
@endsection