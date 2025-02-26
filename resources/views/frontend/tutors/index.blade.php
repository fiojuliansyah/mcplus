@extends('frontend.layouts.main')


@section('content')
  <div class="cs-height_100 cs-height_lg_70"></div>
  <!-- Start Page Head -->
  <div class="non-printable" style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <!-- Icon in Gradient Box - now properly centered -->
    <div style="position: relative; background: linear-gradient(135deg, #179DCF, #B70092); width: 60px; height: 60px; border-radius: 20%; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(183, 0, 146, 0.6); margin-bottom: 15px; z-index: 3;">
      <div style="position: absolute; top: -2px; left: -2px; right: -2px; bottom: -2px; z-index: -1; background: linear-gradient(135deg, #179DCF, #B70092); filter: blur(8px); opacity: 0.8; border-radius: 50%;"></div>
      
      <!-- Heart icon (love) SVG - solid white fill -->
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 16 16">
        <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748z"/>
      </svg>
    </div>
    
    <!-- Original Content Section -->
    <div class="cs-section_heading cs-style4">
      <h2 class="cs-section_title">Let The Guides You To Success</h2>
      <p class="cs-section_subtitle">Our Tutors are Highly trained to simplify complex concept into simple, easly memorized components.
      </p>
    </div>
  </div>
  <!-- End Page Head -->
  <div class="cs-height_100 cs-height_lg_70"></div>
  <div class="container">
    <div class="cs-isotop_filter cs-style1 cs-center">
      <ul class="cs-mp0 cs-center">
        <li class="active"><a href="#" data-filter="*"><span>All Items</span></a></li>
        @foreach ($categories as $category)   
          <li><a href="#" data-filter=".{{ $category->slug }}"><span>{{ $category->name }}</span></a></li>
        @endforeach
      </ul>
    </div>
    <div class="cs-height_30 cs-height_lg_30"></div>
    <div class="cs-isotop cs-style1 cs-isotop_col_5 cs-has_gutter_30">
      <div class="cs-grid_sizer"></div>
      @foreach ($tutors as $tutor)
        <div class="cs-isotop_item {{ $tutor->category->slug }}">
          <div class="cs-card cs-style3 cs-box_shadow cs-white_bg">
            <a href="{{ route('frontend.tutors.detail', $tutor->slug) }}" class="cs-card_thumb cs-zoom_effect">
              <img src="{{ $tutor->image_url }}" alt="Image" class="cs-zoom_item">
            </a>
            <br>
            <div class="cs-card_info">
              <h3 class="cs-card_title"><a href="#">{{ $tutor->name }}</a></h3>
              <div class="cs-card_subtitle">
                <span><strong>{{ strtoupper($tutor->category->name) }}</strong></span>
              </div>
            </div>
          </div>
        </div><!-- .cs-isotop_item -->
      @endforeach
    </div>
  </div>
@endsection
