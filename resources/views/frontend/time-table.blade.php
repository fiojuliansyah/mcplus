@extends('frontend.layouts.main')

@section('content')
<div style="overflow: hidden; width: 100%; height: 100vh;">
  <iframe id="contentIframe" src="https://same-place-857938.framer.app/timetable"
      frameborder="0"
      style="overflow: auto; display: block; width: 100%; height: 100vh; border: 0;">
  </iframe>
</div>
@endsection
