@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.article.index.header')
 <div class="content">
   @include('backend.article.index.articles_table')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
