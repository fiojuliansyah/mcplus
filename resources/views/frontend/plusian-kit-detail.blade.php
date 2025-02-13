@extends('frontend.layouts.main')

@section('content')
  <!-- Start Page Head -->
  <section class="cs-page_head cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
    <div class="container">
      <div class="text-center">
        <h1 class="cs-page_title">{{ $plusian->title }}</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">MC PLUS</a></li>
          <li class="breadcrumb-item">Plusian Kit</li>
          <li class="breadcrumb-item active">{{ $plusian->slug }}</li>
        </ol>
      </div>
    </div>
  </section>
  <!-- End Page Head -->
  
  <div class="cs-height_100 cs-height_lg_70"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="cs-single_post">
          <img src="https://mcplus.my/wp-content/uploads/2025/01/SUBSCRIPTION-26.jpg" alt="">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cs-height_0 cs-height_lg_70"></div>
        <div class="cs-blog_sidebar">
          <a href="{{ $plusian->link }}" class="cs-btn cs-style1" 
            style="margin-left: auto; white-space: nowrap; text-decoration: none; padding: 8px 12px; background-color: #E700B8; color: white; border-radius: 5px;">
            Download Plusian Kit
         </a>
          <div class="cs-sidebar_widget cs-box_shadow cs-white_bg">
            <form action="#" class="cs-search">
              <input type="text" class="cs-search_input" placeholder="Search">
              <button class="cs-btn cs-style1">
                <span>Search</span>                
              </button>
            </form>
          </div>
          <div class="cs-sidebar_widget cs-box_shadow cs-white_bg">
            <h2 class="cs-widget_title"><span>Related Plusian Kit</span></h2>
            <ul class="cs-widget_list">
                @foreach ($plusians as $item)    
                    <li>
                    <a href="{{ route('frontend.plusian-kits.detail', $item->slug) }}">{{ $item->title }}</a>
                    </li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection