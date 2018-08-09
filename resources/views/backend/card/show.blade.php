@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.card.show.header')
 <div class="content">
   @include('backend.card.show.card')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
