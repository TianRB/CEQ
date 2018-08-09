@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.subcategories.index.header')
 <div class="content">
   @include('backend.subcategories.index.subcategories_table')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
