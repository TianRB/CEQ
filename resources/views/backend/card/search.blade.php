@extends('backend.layouts.app')
@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')
 @include('backend.card.search.header')
 <div class="content">
   @include('backend.card.search.cards_table')
 </div>
 @include('backend.layouts.footers.footer')
@endsection
