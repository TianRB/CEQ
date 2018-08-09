@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.subcategories.edit.header')
 <div class="content">

   @include('backend.subcategories.edit.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
