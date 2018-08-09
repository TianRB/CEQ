@extends('backend.layouts.app')
@section('content')
 @include('backend.layouts.navbars.nav_expand')

 <div class="panel-header panel-header-lg">
  <div class="header text-center">
   <h2 class="title">Tarjetas</h2>
   <div class="row justify-content-center align-items-center">
    <div class="col-md-4 mb-4 m-md-0">
     <p class="category">
      <a class="" href="{{ route('cards.create') }}"><i class="fa fa-plus"></i>  Agregar tarjeta</a>
     </p>
    </div>
    <div class="col-10 col-md-4">
       <h6 class="text-left text-white">Buscar tarjeta</h6>
     <form class="form-horizontal " method="POST" enctype="multipart/form-data" action="{{-- route('cards.search') --}}">
      {{ csrf_field() }}
      <div class="input-group no-border">

       <input type="text" value="" class="form-control text-white" name="title" placeholder="Buscar" autocomplete="off">
       <div class="input-group-append">
        <div class="input-group-text text-white">
         <i class="fas fa-search"></i>
        </div>
       </div>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>

 <div class="content">
   <div class="row justify-content-center">
    @foreach($cards as $c)
       <div class="col-md-5">

          <div class="card article container {{ strtolower($c->belongsTo) }}">
              <div class="card-header">
                <div class="row justify-content-between align-items-center d-flex">
                  <h4 class="">{{ $c->title }}</h4>
                </div>
              </div>
              <div class="card-body">
               <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="image" style="height:400px;">
                   <img src="{{ url($c->image) }}" alt="{{ $c->title }}">
                  </div>
                </div>
               </div>
               <div class="row justify-content-center">
                <div class="col-md-12">
                  Sección: {{ $c->belongsTo }}
                </div>
               </div>

              </div>
              <div class="card-footer">
               <div class="row justify-content-around align-items-center d-flex">
                <!-- ver en sitio -->
                <a class="btn btn-primary" href="{{ url('/product/view/'.$c->slug) }}"><i class="fas fa-globe"></i> Ver en sitio</a>
                <!-- ver en backend -->
                <a class="btn btn-info" href="{{ route('cards.show',$c->id) }}"><i class="fa fa-search"></i></a>
                <!-- editar -->
                 <a class="btn btn-warning" href="{{ route('cards.edit',$c->id) }}"><i class="fa fa-edit"></i></a>
                 <!-- borrar -->
                 <form action="/cards/{{ $c->id }}" method="POST" class="no-margin">
                 {{ csrf_field() }}
                 <input type="hidden" name="_method" value="DELETE" />
                 <button class="btn btn-danger" type="submit"><i class="fa fa-trash" /></i></button>
                 </form>
               </div>
              </div>
          </div>
       </div>
       @endforeach
   </div>
 </div>

@include('backend.layouts.footers.footer')
@endsection
