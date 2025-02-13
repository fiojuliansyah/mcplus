@extends('frontend.layouts.main')


@section('content')
<section class="cs-page_head cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
  <div class="container">
    <div class="text-center">
      <h1 class="cs-page_title">{{ $title }}</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">{{ $breadCrumb }}</li>
      </ol>
    </div>
  </div>
</section>
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
