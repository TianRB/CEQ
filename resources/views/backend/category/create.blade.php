@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.category.create.header')
 <div class="content">

   @include('backend.category.create.form')

 </div>
 @include('backend.layouts.footers.footer')
@endsection
