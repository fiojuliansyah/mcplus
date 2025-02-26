@extends('frontend.layouts.main')

@section('content')
<div class="cs-height_100 cs-height_lg_70"></div>
<!-- Start Page Head -->
<div class="non-printable" style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <!-- Icon in Gradient Box - now properly centered -->
  <div style="position: relative; background: linear-gradient(135deg, #179DCF, #B70092); width: 60px; height: 60px; border-radius: 20%; display: flex; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(183, 0, 146, 0.6); margin-bottom: 15px; z-index: 3;">
    <div style="position: absolute; top: -2px; left: -2px; right: -2px; bottom: -2px; z-index: -1; background: linear-gradient(135deg, #179DCF, #B70092); filter: blur(8px); opacity: 0.8; border-radius: 50%;"></div>
    
    <!-- Clock/Schedule icon - Filled version -->
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
    </svg>
  </div>
  
  <!-- Updated Content Section -->
  <div class="cs-section_heading cs-style4">
    <h2 class="cs-section_title">Course Schedule & Timings</h2>
    <p class="cs-section_subtitle">Plan your learning journey with our flexible scheduling options designed to accommodate your busy lifestyle and maximize your educational experience.
    </p>
  </div>
</div>
<div class="container">

  <div class="cs-height_60 cs-height_lg_70"></div>

  <!-- Form Search -->
  <form action="{{ route('frontend.schedules') }}" method="GET" class="cs-search cs-search_lg">
    <input type="text" name="search" class="cs-search_input" placeholder="Search" value="{{ request('search') }}">
    <button type="submit" class="cs-search_btn">
      <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z" stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M17.5 18L13.875 14.375" stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>                  
    </button>
  </form>

  <div class="cs-height_45 cs-height_lg_45"></div>

  <!-- Jika Tidak Ada Hasil -->
  @if($schedules->isEmpty())
    <p class="text-center">No schedules found.</p>
  @else
    <div class="row">
      @foreach ($schedules as $schedule)    
        <div class="col-lg-4 col-sm-6">
          <div class="cs-iconbox cs-style3 cs-box_shadow cs-white_bg">
            <div class="cs-iconbox_img"><img src="{{ $schedule->image_url }}" alt="Logo"></div>
            <div class="cs-iconbox_text">{{ $schedule->title }}</div>
            <a href="{{ $schedule->link }}" class="cs-iconbox_btn cs-primary_font">
              Download Timetable
              <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5303 6.75396C16.8232 6.46107 16.8232 5.9862 16.5303 5.6933L11.7574 0.920332C11.4645 0.627439 10.9896 0.627439 10.6967 0.920332C10.4038 1.21323 10.4038 1.6881 10.6967 1.98099L14.9393 6.22363L10.6967 10.4663C10.4038 10.7592 10.4038 11.234 10.6967 11.5269C10.9896 11.8198 11.4645 11.8198 11.7574 11.5269L16.5303 6.75396ZM0 6.97363H16V5.47363H0V6.97363Z" fill="currentColor"/>
              </svg>  
            </a>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
      @endforeach
    </div>
  @endif

</div>
<div class="cs-height_70 cs-height_lg_40"></div>
@endsection
