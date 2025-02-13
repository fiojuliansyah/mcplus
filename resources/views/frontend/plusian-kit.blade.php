@extends('frontend.layouts.main')

@section('content')
<section class="cs-page_head cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
  <div class="container">
    <div class="text-center">
      <h1 class="cs-page_title">Plusian Kit</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Plusian Kit</li>
      </ol>
    </div>
  </div>
</section>
<!-- End Page Head -->

<div class="container">
  <div class="cs-height_100 cs-height_lg_70"></div>
  <form action="{{ route('frontend.plusian-kits') }}" method="GET" class="cs-search cs-search_lg">
    <input type="text" name="search" class="cs-search_input" placeholder="Search" value="{{ request('search') }}">
    <button type="submit" class="cs-search_btn">
      <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z" stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M17.5 18L13.875 14.375" stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>                  
    </button>
  </form>
  <div class="cs-height_95 cs-height_lg_70"></div>
  <h2 class="cs-section_heading cs-style1 text-center">Browse</h2>
  <div class="cs-height_45 cs-height_lg_45"></div>
  <div class="row">
    @foreach ($plusians as $plusian)   
      <div class="col-xl-3 col-lg-4">
        <a href="{{ route('frontend.plusian-kits.detail', $plusian->slug) }}" class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
          <h3>{{ $plusian->title }}</h3>
        </a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    @endforeach
  </div>
</div>

@endsection