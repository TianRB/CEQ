@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.subcategories.create.header')
 <div class="content">

   @include('backend.subcategories.create.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
