@extends('backend.layouts.app')
@section('content')
  @include('backend.layouts.navbars.nav_expand')
  <div class="panel-header panel-header-sm">
   <div class="header text-center">

   <!--    <p class="category"><a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i>  Agregar categoría</a></p> -->
   </div>
  </div>
 <div class="row justify-content-center p-5" style="height:100vh;">
  <div class="col-md-10">

   <div class="image">
    <img src="{{url('img/logo-casa-ralero-t.png')}}" alt="">
     <h1>Bienvenido</h1>
   </div>
   <hr>
   <div class="row">
    <div class="col-12 col-md-4">
     <h3>Artículos</h3>
     <ul>
      <li>
       <a href="{{route('articles.index')}}">Lista de artículos</a>
      </li>
      <li>
       <a href="{{route('articles.create')}}">Crear artículo nuevo</a>
      </li>
     </ul>
    </div>
    <div class="col-12 col-md-4">
     <h3>Categorías</h3>
     <ul>
      <li>
       <a href="{{route('categories.index')}}">Mostrar todas las categorías</a>
      </li>
      <li>
       <a href="{{route('categories.create')}}">Crear categoria</a>
      </li>
     </ul>
     <hr>
     <h4>Subcategorías</h4>
     <ul>
      <li>
       <a href="{{route('subcategories.index')}}">Todas las subcategorías</a>
      </li>
      <li>
       <a href="{{route('subcategories.create')}}">Crear subcategoría</a>
      </li>
     </ul>
    </div>
    <div class="col-12 col-md-4">
     <h3>Banners</h3>
     <ul>
      <li>
       <a href="{{route('sliders.index')}}">Todos los banners</a>
      </li>
      <li>
       <a href="{{route('sliders.create')}}">Crear banner</a>
      </li>
     </ul>
    </div>
   </div>
  </div>
 </div>
 @include('backend.layouts.footers.footer')
@endsection
