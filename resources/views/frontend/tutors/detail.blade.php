@extends('frontend.layouts.main')


@section('content')
    <!-- Start Page Head -->
    <section class="cs-page_head cs-bg" data-src="/frontend/assets/img/page_head_bg.svg">
        <div class="container">
            <div class="text-center">
                <h1 class="cs-page_title">{{ $tutor->name }}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Tutors</a></li>
                    <li class="breadcrumb-item active">{{ $tutor->name }}</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Page Head -->
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
        <div class="row"
            style="display: flex; align-items: center; justify-content: center; margin: 0; padding: 0; height: 100vh;">
            <div class="col-lg-6"
                style="display: flex; justify-content: center; align-items: center; padding: 0; margin: 0;">
                <style>
                    @keyframes circuitAnimation {
                        0% {
                            box-shadow: 0 0 5px #0ff, 0 0 10px #0ff, 0 0 15px #0ff, 0 0 20px #0ff;
                            border-color: #0ff;
                        }

                        50% {
                            box-shadow: 0 0 10px #f0f, 0 0 15px #f0f, 0 0 20px #f0f, 0 0 25px #f0f;
                            border-color: #f0f;
                        }

                        100% {
                            box-shadow: 0 0 5px #0ff, 0 0 10px #0ff, 0 0 15px #0ff, 0 0 20px #0ff;
                            border-color: #0ff;
                        }
                    }

                    @keyframes circuitPath {
                        0% {
                            background-position: 0% 0%;
                        }

                        100% {
                            background-position: 200% 0%;
                        }
                    }

                    .card-container {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        padding: 20px;
                        margin: 0;
                    }

                    .video-card {
                        width: 360px;
                        border-radius: 12px;
                        overflow: hidden;
                        background-color: #000;
                        position: relative;
                        border: 2px solid #0ff;
                        animation: circuitAnimation 3s infinite;
                    }

                    .circuit-border {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        z-index: 1;
                        border-radius: 12px;
                        pointer-events: none;
                        background:
                            linear-gradient(90deg,
                                rgba(0, 0, 0, 0) 0%,
                                rgba(0, 0, 0, 0) 45%,
                                rgba(0, 255, 255, 0.8) 50%,
                                rgba(0, 0, 0, 0) 55%,
                                rgba(0, 0, 0, 0) 100%);
                        background-size: 200% 100%;
                        animation: circuitPath 3s linear infinite;
                    }

                    .circuit-dots {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        z-index: 1;
                        border-radius: 12px;
                        pointer-events: none;
                        background-image:
                            radial-gradient(#0ff 1px, transparent 1px),
                            radial-gradient(#0ff 1px, transparent 1px);
                        background-size: 20px 20px;
                        background-position: 0 0, 10px 10px;
                        opacity: 0.3;
                    }

                    .circuit-lines {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        z-index: 1;
                        border-radius: 12px;
                        pointer-events: none;
                        background-image:
                            linear-gradient(to right, transparent 18px, #0ff 18px, #0ff 19px, transparent 19px),
                            linear-gradient(to bottom, transparent 18px, #0ff 18px, #0ff 19px, transparent 19px);
                        background-size: 40px 40px;
                        opacity: 0.2;
                    }

                    .card-header {
                        height: 50px;
                        background-color: #000;
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: relative;
                        z-index: 2;
                        border-bottom: 1px solid rgba(0, 255, 255, 0.3);
                    }

                    .card-title {
                        color: #0ff;
                        font-size: 16px;
                        font-family: Arial, sans-serif;
                        text-shadow: 0 0 5px #0ff;
                        text-transform: uppercase;
                        letter-spacing: 2px;
                    }

                    .video-container {
                        position: relative;
                        z-index: 2;
                        height: 640px;
                    }

                    .card-footer {
                        height: 40px;
                        background-color: #000;
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        z-index: 2;
                        border-top: 1px solid rgba(0, 255, 255, 0.3);
                    }

                    .card-indicator {
                        width: 40px;
                        height: 5px;
                        background-color: #0ff;
                        border-radius: 3px;
                        box-shadow: 0 0 5px #0ff;
                        margin: 0 5px;
                    }
                </style>

                <div class="card-container">
                    <div class="video-card">
                        <div class="video-container">
                            <iframe width="360" height="640" src="{{ $tutor->video_url }}"
                                title="YouTube Short video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"
                style="display: flex; flex-direction: column; justify-content: center; padding: 0; margin: 0;">
                <div class="cs-single_product_head">
                    <h2>Enjoy a Fun Tuition</h2>
                    <p>Class ({{ $tutor->category->name }}) with <a href="#"
                            class="cs-btn cs-style1 cs-btn_m w-30 text-center">{{ $tutor->name }}</a> In <span
                            class="cs-accent_color">MCPLUS</span> Online Tuition!</p>
                    <span class="cs-card_like cs-primary_color cs-box_shadow">
                        <i class="fas fa-heart fa-fw"></i> 2.1K
                    </span>
                </div>
                <div class="cs-height_30 cs-height_lg_70"></div>
                <div class="cs-white_bg cs-box_shadow cs-general_box_5">
                    Become PLUSIAN now and experience the future education
                </div>
                <div class="cs-height_30 cs-height_lg_70"></div>
                <div class="cs-white_bg cs-box_shadow cs-general_box_5">
                    <div class="cs-social_widget" style="display: flex; justify-content: center; gap: 10px;">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="cs-height_30 cs-height_lg_70"></div>
                <div class="row">
                    <div class="col-6" style="display: flex; justify-content: center;">
                        <a href="#" class="cs-btn cs-style1 cs-btn_lg w-100 text-center"><span>REQUEST FREE
                                TRIAL</span></a>
                    </div>
                    <div class="col-6" style="display: flex; justify-content: center;">
                        <a href="#" class="cs-btn cs-style1 cs-btn_lg w-100 text-center"
                            style="background-color: #FEBE00;"><span>REGISTER ACCOUNT</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
