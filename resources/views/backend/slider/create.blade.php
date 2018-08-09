@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.slider.create.header')
 <div class="content">

   @include('backend.slider.create.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
@section('page_scripts')
{{--   <script>
  tinymce.init({
    selector: '#contenido'
  });
  </script> --}}
@endsection
