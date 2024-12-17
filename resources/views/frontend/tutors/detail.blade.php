@extends('frontend.layouts.app')


@section('content')
<section class="instructor-details py-120 position-relative z-1">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="instructor-details__thumb">
                    <img src="{{ $tutor->image_url }}" alt=""
                        class="max-h-416 max-w-416 cover-img rounded-circle">
                    <ul class="social-list flex-center gap-16 mt-40">
                        <li class="social-list__item">
                            <a href="https://www.facebook.com"
                                class="text-main-600 text-xl hover-text-white w-40 h-40 rounded-circle border border-main-600 hover-bg-main-600 flex-center"><i
                                    class="ph-bold ph-facebook-logo"></i></a>
                        </li>
                        <li class="social-list__item">
                            <a href="https://www.twitter.com"
                                class="text-main-600 text-xl hover-text-white w-40 h-40 rounded-circle border border-main-600 hover-bg-main-600 flex-center">
                                <i class="ph-bold ph-twitter-logo"></i></a>
                        </li>
                        <li class="social-list__item">
                            <a href="https://www.linkedin.com"
                                class="text-main-600 text-xl hover-text-white w-40 h-40 rounded-circle border border-main-600 hover-bg-main-600 flex-center"><i
                                    class="ph-bold ph-instagram-logo"></i></a>
                        </li>
                        <li class="social-list__item">
                            <a href="https://www.pinterest.com"
                                class="text-main-600 text-xl hover-text-white w-40 h-40 rounded-circle border border-main-600 hover-bg-main-600 flex-center"><i
                                    class="ph-bold ph-pinterest-logo"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 ps-xl-5">
                <div class="ps-lg-5">
                    <h5 class="text-main-600 mb-0">{{ Translation::getTranslation('Tutor') }}</h5>
                    <h2 class="my-16">{{ $tutor->name }}</h2>
                    <span class="text-neutral-700">{{ $tutor->category->name }}</span>
                    <span class="d-block border border-neutral-30 my-40 border-dashed"></span>
                    <h4 class="mb-24">{{ Translation::getTranslation('Enjoy a Fun Tuition Class') }} ({{ $tutor->category->name }}) {{ Translation::getTranslation('with Tutor') }} {{ $tutor->name }} {{ Translation::getTranslation('in MCPLUS Online Tuition!') }}</h4>
                    <p class="text-neutral-500">Become PLUSIAN now and experience the future education</p>
                    <span class="d-block border border-neutral-30 my-40 border-dashed"></span>
                </div>
                <span class="d-block border border-neutral-30 border-dashed my-32"></span>
                <div class="d-flex gap-24">
                    <a href="cart.html" class="flex-grow-1 btn btn-main rounded-pill flex-align gap-8">
                        {{ Translation::getTranslation('REQUEST FREE TRIAL') }}
                    </a>
                    <a href="checkout.html"
                        class="flex-grow-1 btn btn-outline-main rounded-pill flex-align gap-8">
                        {{ Translation::getTranslation('REGISTER ACCOUNT') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faculty pt-120 pb-120 bg-main-25">
    <div class="container">
        <div class="section-heading text-center">
            <div class="flex-align d-inline-flex gap-8 mb-16 wow bounceInDown">
                <span class="text-main-600 text-2xl d-flex"><i class="ph-bold ph-book-open"></i></span>
                <h5 class="text-main-600 mb-0">{{ Translation::getTranslation('Hey Guys! Join me on MCPLUS!') }}</h5>
            </div>
            <h2 class="mb-24 wow bounceIn">{{ Translation::getTranslation('Were sure youll love us!') }}</h2>
        </div>
        <div class="row gy-4">
            <div class="course-details__content border border-neutral-30 rounded-12 bg-white p-12">
                <video id="player" class="player" playsinline controls
                data-poster="assets/images/thumbs/course-details-img.png">
                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
                type="video/mp4">
                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
                type="video/webm">
            </video>
        </div>
        <div class="text-center">
            <h2 class="mb-24 wow bounceIn">{{ Translation::getTranslation('Download & install MC PLUS Mobile App now') }}</h2>
        </div>
        <div class="d-flex gap-24">
            <a href="cart.html" class="flex-grow-1 btn btn-main rounded-pill flex-align gap-8">
                <img src="https://freelogopng.com/images/all_img/1664285914google-play-logo-png.png" alt="" width="20">
                {{ Translation::getTranslation('GET IN ON GOOGLE PLAY') }}
            </a>
            <a href="checkout.html"
                class="flex-grow-1 btn btn-outline-main rounded-pill flex-align gap-8">
                <img src="https://static-00.iconduck.com/assets.00/app-store-icon-1760x2048-2rb6f013.png" alt="" width="20">
                {{ Translation::getTranslation('DOWNLOAD ON THE APP STORE') }}
            </a>
        </div>
    </div>
</section>
<section class="instructor py-120 position-relative z-1">
    <img src="/frontend/assets/images/shapes/shape2.png" alt="" class="shape one animation-scalation">
    <img src="/frontend/assets/images/shapes/shape6.png" alt="" class="shape six animation-scalation">
    
    <div class="container">
        <div class="section-heading text-center">
            <h2 class="mb-24">{{ Translation::getTranslation('Other MCPLUS Tutors') }}</h2>
        </div>
        <div class="row gy-4">
            @foreach ($tutors as $otherTutors)   
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="instructor-item-two scale-hover-item social-hover">
                    <div class="instructor-item-two__thumb text-center rounded-circle aspect-ratio-1 p-12 border border-neutral-30 position-relative">
                        <div class="instructor-item-two__thumb-inner w-100 h-100 d-block bg-main-25 rounded-circle overflow-hidden position-relative">
                            <img src="{{ $otherTutors->image_url }}" alt="" class="cover-img">
                            <ul class="social-list flex-center gap-12 d-flex position-absolute start-50 top-50 w-100 h-100 translate-middle">
                                <li class="social-list__item">
                                    <a href="https://www.facebook.com" class="flex-center border border-white text-white w-44 h-44 rounded-circle text-xl text-main-600 bg-white hover-bg-main-600 hover-text-white hover-border-main-600"><i class="ph-bold ph-facebook-logo"></i></a>
                                </li>
                                <li class="social-list__item">
                                    <a href="https://www.twitter.com" class="flex-center border border-white text-white w-44 h-44 rounded-circle text-xl text-main-600 bg-white hover-bg-main-600 hover-text-white hover-border-main-600"> <i class="ph-bold ph-twitter-logo"></i></a>
                                </li>
                                <li class="social-list__item">
                                    <a href="https://www.linkedin.com" class="flex-center border border-white text-white w-44 h-44 rounded-circle text-xl text-main-600 bg-white hover-bg-main-600 hover-text-white hover-border-main-600"><i class="ph-bold ph-instagram-logo"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-24">
                        <h4 class="mb-12">
                            <a href="instructor-details.html" class="text-neutral-700 hover-text-main-600">{{ $otherTutors->name }}</a>
                        </h4>
                        <span class="text-neutral-500">{{ $otherTutors->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
