@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.article.show.header')
 <div class="content">
   @include('backend.article.show.article')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
