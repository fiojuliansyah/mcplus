@extends('frontend.layouts.main')

@section('content')
<div class="cs-height_100 cs-height_lg_70"></div>
<div class="container">
  <div class="slider-nav">
    @foreach($banners as $banner)
      <div class="slider-item">
        <div class="cs-slider_thumb_sm">
          <img src="{{ $banner->image_url }}" alt="Thumbnail Image">
        </div>
      </div>
    @endforeach
  </div>
</div>
<div class="cs-height_100 cs-height_lg_70"></div>
<div class="container">
  <div class="slider-for">
    @foreach($images as $image)
      <div class="slider-item">
        <div class="cs-slider_thumb_lg">
          <img src="{{ $image->image_url }}" alt="Program Image">
        </div>
      </div>
    @endforeach
  </div>

  <div class="cs-height_25 cs-height_lg_25"></div>

  <div class="slider-nav">
    @foreach($images as $image)
      <div class="slider-item">
        <div class="cs-slider_thumb_sm">
          <img src="{{ $image->image_url }}" alt="Thumbnail Image">
        </div>
      </div>
    @endforeach
  </div>
</div>
<div class="cs-height_100 cs-height_lg_70"></div>
<div class="container">
  <div class="cs-profile_right">
    <div class="cs-height_25 cs-height_lg_25"></div>
    <ul class="cs-activity_list cs-mp0">
      @foreach ($forms as $form)
      <li>
        <div class="cs-activity cs-white_bg cs-type1" style="display: flex; align-items: center; justify-content: space-between; padding: 10px 15px;">
          <div class="cs-activity_right" style="flex-grow: 1;">
            <h5 class="cs-activity_text" style="margin: 0;">{{ $form->title }}</h5>
          </div>
          <a href="{{ $form->link }}" class="cs-btn cs-style1" 
             style="margin-left: auto; white-space: nowrap; text-decoration: none; padding: 8px 12px; background-color: #E700B8; color: white; border-radius: 5px;">
             ADD TO CALENDAR
          </a>
        </div>
      </li>         
      @endforeach
    </ul>
  </div>
</div>
<div class="cs-height_100 cs-height_lg_70"></div>
<div class="container">
  <div class="cs-section_heading cs-style4">
    <h2 class="cs-section_title">CLASS SCHEDULE</h2>
  </div>
  <div class="cs-height_45 cs-height_lg_45"></div>
  <div class="row">
    @foreach ($schedules as $schedule)  
      <div class="col-lg-4 col-sm-6">
        <div class="cs-iconbox cs-style3 cs-box_shadow cs-white_bg">
          <div class="cs-iconbox_img"><img src="{{ $schedule->image_url }}" alt="Logo"></div>
          <div class="cs-iconbox_text">{{ $schedule->title }}</div>
          <a href="{{ $schedule->link }}" class="cs-iconbox_btn cs-primary_font">
            DOWNLOAD TIMETABLE
            <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.5303 6.75396C16.8232 6.46107 16.8232 5.9862 16.5303 5.6933L11.7574 0.920332C11.4645 0.627439 10.9896 0.627439 10.6967 0.920332C10.4038 1.21323 10.4038 1.6881 10.6967 1.98099L14.9393 6.22363L10.6967 10.4663C10.4038 10.7592 10.4038 11.234 10.6967 11.5269C10.9896 11.8198 11.4645 11.8198 11.7574 11.5269L16.5303 6.75396ZM0 6.97363H16V5.47363H0V6.97363Z" fill="currentColor"/>
            </svg>  
          </a>
        </div>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    @endforeach
  </div>
</div>
@endsection
