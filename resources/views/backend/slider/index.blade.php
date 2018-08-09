@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.slider.index.header')
 <div class="content">
  <div class="row">
   @include('backend.slider.index.sliders_table')
  </div>
 </div>
 @include('backend.layouts.footers.footer')
@endsection
