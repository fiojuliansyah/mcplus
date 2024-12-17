@extends('frontend.layouts.app')


@section('content')
    <section class="instructor py-120 position-relative z-1">
        <img src="assets/images/shapes/shape2.png" alt="" class="shape one animation-scalation">
        <img src="assets/images/shapes/shape6.png" alt="" class="shape six animation-scalation">

        <div class="container">
            <div class="nav-tab-wrapper bg-white p-16 mb-40" data-aos="zoom-out">
                <ul class="nav nav-pills common-tab gap-16" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link rounded-pill bg-main-25 text-md fw-medium text-neutral-500 flex-center w-100 gap-8 active"
                            id="pills-categories-tab" data-bs-toggle="pill" data-bs-target="#pills-categories"
                            type="button" role="tab" aria-controls="pills-categories" aria-selected="true">
                            <i class="text-xl d-flex ph-bold ph-squares-four"></i>
                            {{ Translation::getTranslation('All Categories') }}
                        </button>
                    </li>
                
                    @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link rounded-pill bg-main-25 text-md fw-medium text-neutral-500 flex-center w-100 gap-8"
                            id="pills-{{ $category->slug }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $category->slug }}" type="button" role="tab"
                            aria-controls="pills-{{ $category->slug }}" aria-selected="false">
                            {{ $category->name }}
                        </button>
                    </li>
                    @endforeach
                </ul>
                
            </div>
            <div class="tab-content" id="pills-tabContent">
                <!-- All Categories Tab -->
                <div class="tab-pane fade show active" id="pills-categories" role="tabpanel"
                    aria-labelledby="pills-categories-tab">
                    <div class="row gy-4">
                        @foreach ($tutors as $tutor)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="instructor-item-two scale-hover-item social-hover">
                                <div
                                    class="instructor-item-two__thumb text-center rounded-circle aspect-ratio-1 p-12 border border-neutral-30 position-relative">
                                    <div
                                        class="instructor-item-two__thumb-inner w-100 h-100 d-block bg-main-25 rounded-circle overflow-hidden position-relative">
                                        <img src="{{ $tutor->image_url }}" alt="Tutor Image" class="cover-img">
                                    </div>
                                </div>
                                <div class="text-center mt-24">
                                    <h4 class="mb-12">
                                        <a href="{{ route('frontend.tutors.detail', $tutor->slug) }}" class="text-neutral-700 hover-text-main-600">
                                            TUTOR {{ $tutor->name }}
                                        </a>
                                    </h4>
                                    <span class="text-neutral-500">{{ $tutor->category->name }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            
                <!-- Category Tabs -->
                @foreach ($categories as $category)
                <div class="tab-pane fade" id="pills-{{ $category->slug }}" role="tabpanel"
                    aria-labelledby="pills-{{ $category->slug }}-tab">
                    <div class="row gy-4">
                        @foreach ($tutors->where('category_id', $category->id) as $tutor)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="instructor-item-two scale-hover-item social-hover">
                                <div
                                    class="instructor-item-two__thumb text-center rounded-circle aspect-ratio-1 p-12 border border-neutral-30 position-relative">
                                    <div
                                        class="instructor-item-two__thumb-inner w-100 h-100 d-block bg-main-25 rounded-circle overflow-hidden position-relative">
                                        <img src="{{ $tutor->image_url }}" alt="Tutor Image" class="cover-img">
                                    </div>
                                </div>
                                <div class="text-center mt-24">
                                    <h4 class="mb-12">
                                        <a href="{{ route('frontend.tutors.detail', $tutor->slug) }}" class="text-neutral-700 hover-text-main-600">
                                            TUTOR {{ $tutor->name }}
                                        </a>
                                    </h4>
                                    <span class="text-neutral-500">{{ $tutor->category->name }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>            
        </div>
    </section>
    <div class="certificate">
        <div class="container container--lg">
            <div class="certificate-box px-16 bg-main-600 rounded-16">
                <div class="container">
                    <div class="position-relative py-80">
                        <div class="row align-items-center">
                            <div class="col-xl-6">
                                <div class="certificate__content">
                                    <div class="flex-align gap-8 mb-16 wow bounceInDown">
                                        <span class="w-8 h-8 bg-white rounded-circle"></span>
                                        <h5 class="text-white mb-0">{{ Translation::getTranslation('Become MC+ Tutor?') }}</h5>
                                    </div>
                                    <h2 class="text-white mb-40 fw-medium wow bounceIn">{{ Translation::getTranslation('Its time for you to make a change!') }}
                                    </h2>
                                    <a href=""
                                        class="btn btn-white rounded-pill flex-align d-inline-flex gap-8 hover-bg-main-800 wow bounceInUp">
                                        {{ Translation::getTranslation('Contact Us') }}
                                        <i class="ph-bold ph-arrow-up-right d-flex text-lg"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 d-xl-block d-none">
                                <div class="certificate__thumb" data-aos="fade-up-left">
                                    <img src="/frontend/assets/images/thumbs/certificate-img.png" alt="" data-tilt
                                        data-tilt-max="8" data-tilt-speed="500" data-tilt-perspective="5000"
                                        data-tilt-full-page-listening>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
