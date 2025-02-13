@extends('frontend.layouts.main')


@section('content')
  <!-- Start Page Head -->
  <section class="cs-page_head cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
    <div class="container">
      <div class="text-center">
        <h1 class="cs-page_title">TUTORS</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Tutors</li>
        </ol>
      </div>
    </div>
  </section>
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
