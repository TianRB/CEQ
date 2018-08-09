<div class="panel-header panel-header-lg">

 <div class="header text-center">
  <h2 class="title">Resultados para <br> "{{$title}}"</h2>
  <div class="row justify-content-center align-items-center">
   <div class="col-md-4 mb-4 m-md-0">
    <p class="category">
  <a class="text-white" href="{{ route('articles.index') }}"><i class="fa fa-list-ul"></i>&nbsp;Volver a listado de articulos</a>
    </p>
   </div>
   <div class="col-10 col-md-4 text-left">
    <span class="text-left text-white">Buscar artículo</span>
    <form class="form-horizontal " method="POST" enctype="multipart/form-data" action="{{ route('articles.search') }}">
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
