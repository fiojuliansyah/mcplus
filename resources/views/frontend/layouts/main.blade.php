<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Site Title -->
  <title>{{ $title }} | MC Plus</title>
  <link rel="icon" type="image/png" href="/assets/images/favicon.png" sizes="16x16">
  <link rel="stylesheet" href="/frontend/assets/css/plugins/fontawesome.min.css">
  <link rel="stylesheet" href="/frontend/assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="/frontend/assets/css/plugins/slick.css">
  <link rel="stylesheet" href="/frontend/assets/css/style.css">
</head>

<body class="cs-dark">
  
  <!-- Start Header Section -->
  @include('frontend.layouts.partials.header')
  <!-- End Header Section -->

  <div class="cs-height_90 cs-height_lg_80"></div>

  @yield('content')

  <div class="cs-height_100 cs-height_lg_70"></div>
  <!-- Start Footer -->
  @include('frontend.layouts.partials.footer')
  <!-- End Footer -->

  <!-- Start Video Popup -->
  <div class="cs-video_popup">
    <div class="cs-video_popup_overlay"></div>
    <div class="cs-video_popup_content">
      <div class="cs-video_popup_layer"></div>
      <div class="cs-video_popup_container">
        <div class="cs-video_popup_align">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="about:blank"></iframe>
          </div>
        </div>
        <div class="cs-video_popup_close"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->

  <!-- Script -->
  <script src="/frontend/assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="/frontend/assets/js/plugins/isotope.pkg.min.js"></script>
  <script src="/frontend/assets/js/plugins/jquery.slick.min.js"></script>
  <script src="/frontend/assets/js/main.js"></script>
</body>
</html>