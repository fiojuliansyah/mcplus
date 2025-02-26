@extends('frontend.layouts.main')


@section('content')
<div class="cs-height_100 cs-height_lg_70"></div>
<!-- Start Page Head -->
<div class="non-printable" style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <!-- Icon in Gradient Box - now properly centered -->
  <div style="position: relative; background: linear-gradient(135deg, #179DCF, #B70092); width: 60px; height: 60px; border-radius: 20%; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(183, 0, 146, 0.6); margin-bottom: 15px; z-index: 3;">
    <div style="position: absolute; top: -2px; left: -2px; right: -2px; bottom: -2px; z-index: -1; background: linear-gradient(135deg, #179DCF, #B70092); filter: blur(8px); opacity: 0.8; border-radius: 50%;"></div>
    
    <!-- Calendar/Event icon for Programs & Seminars -->
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 16 16">
      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
      <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
    </svg>
  </div>
  
  <!-- Updated Content Section -->
  <div class="cs-section_heading cs-style4">
    <h2 class="cs-section_title">Innovative Programs & Seminars</h2>
    <p class="cs-section_subtitle">Expand your knowledge with our expertly designed programs and interactive seminars focused on real-world applications and professional growth.
    </p>
  </div>
</div>
<!-- End Page Head -->

<div class="cs-height_100 cs-height_lg_70"></div>
<div class="container">
  <div class="row">
    @foreach ($programs as $program)      
      <div class="col-lg-4 col-md-6">
        <div class="cs-post cs-style1">
          <a href="{{ route('frontend.programs.detail', $program->slug) }}">
            <img src="{{ $program->image_url }}">
          </a>
          <div class="cs-post_info">
            <h1 class="cs-post_title text-center pt-4" style="color: goldenrod"><a href="{{ route('frontend.programs.detail', $program->slug) }}">{{ $program->title }}</a></h1>
          </div>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    @endforeach
  </div>
</div>
@endsection
