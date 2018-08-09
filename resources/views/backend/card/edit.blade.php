@extends('backend.layouts.app')

@section('content')
 <!-- Navbar -->
 @include('backend.layouts.navbars.nav_expand')

 <div class="panel-header panel-header-md">
   <div class="header text-center ">
     <h2 class="title">Editar Tarjeta</h2>
     <a class="text-white" href="{{ route('cards.index') }}"><i class="fa fa-list-ul"></i>&nbsp;Volver a listado de tarjetas</a>
   </div>
 </div>

 <div class="content">

    <div class="row justify-content-center">
     <div class="col-md-8">
      <div class="panel panel-default card">
       <div class="panel-body card-body pt-5">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('cards.update', $card->id) }}">
         {{ csrf_field() }}
         <input type="hidden" name="_method" value="PUT" />

         <div class="form-group row justify-content-center">
          <label for="title" class="col-md-10 text-left control-label">Título</label>
          @if ($errors->has('title'))
          <span class="help-block">
              <small class="text-danger">{{ $errors->first('title') }}</small>
          </span>
          @endif
          <div class="col-md-10">
           <input id="title" type="text" class="form-control" name="title" value="{{ $card->title }}">
          </div>
         </div>

         <div class="form-group row justify-content-center">
          <label for="list_title" class="col-md-10 text-left  control-label">Título en lista (puede ser el mismo que el título)</label>
          @if ($errors->has('list_title'))
          <span class="help-block">
              <small class="text-danger">{{ $errors->first('list_title') }}</small>
          </span>
          @endif
          <div class="col-md-10">
           <input id="list_title" type="text" class="form-control" name="list_title" value="{{ $card->list_title }}"></input>
          </div>
         </div>

         <div class="form-group-file py-4 row justify-content-center">
          <label for="imagen" class="col-md-10 text-left control-label"></label>
          <div class="col-10 mb-3">
           <div class="row p-3" id="filearray"></div>
          </div>
          <div class="custom-file col-md-10">
           <input id="image" name="image" type="file" class="custom-file-input" />
           <label class="custom-file-label" for="image">Selecciona una imagen (Si no deseas cambiar la imagen, deja este campo vacío):</label>
           @if ($errors->has('image'))
           <span class="help-block">
            <small class="text-danger">{{ $errors->first('image') }}</small>
           </span>
           @endif
          </div>
         </div>

         <div class="form-group row justify-content-center">
          <label for="body" class="col-md-10 text-left  control-label">Contenido</label>
          @if ($errors->has('body'))
          <span class="help-block">
              <small class="text-danger">{{ $errors->first('body') }}</small>
          </span>
          @endif
          <div class="col-md-10">
           <textarea id="body" type="text" class="form-control ckeditor" name="body" value="{{ $card->body }}">{{ $card->body }}</textarea>
          </div>
         </div>

         <div class="form-group row justify-content-center">
          <label for="categoria" class="col-md-10 text-left control-label">Sección:</label>
          @if ($errors->has('type'))
          <span class="help-block">
              <small class="text-danger">{{ $errors->first('type') }}</small>
          </span>
          @endif
          <div class="custom-control custom-radio col-md-10">
            <input type="radio" class="custom-control-input" id="gastroenterologia" name="type" value="gastroenterologia">
            <label class="custom-control-label" for="gastroenterologia">Gastroenterología</label>
          </div>
          <div class="custom-control custom-radio col-md-10">
            <input type="radio" class="custom-control-input" id="cirugia-general-y-laparoscopica" name="type" value="cirugia-general-y-laparoscopica">
            <label class="custom-control-label" for="cirugia-general-y-laparoscopica">Cirugía general y laparoscópica</label>
          </div>
          <div class="custom-control custom-radio col-md-10">
            <input type="radio" class="custom-control-input" id="endoscopia" name="type" value="endoscopia">
            <label class="custom-control-label" for="endoscopia">Endoscopia gastrointestinal</label>
          </div>
         </div>

         <div class="form-group row justify-content-center">
          <div class="col-md-8 text-center">
           <button type="submit" class="btn btn-info">
              Guardar Tarjeta
          </button>
          </div>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
  </div>

 @include('backend.layouts.footers.footer')
 @endsection
 @section('page_scripts')
  <!-- CKeditor -->
  <script src='{{ URL::asset('ckeditor/ckeditor.js') }}'></script>
  <script type="text/javascript">
  $( document ).ready(function() {
   $("#image").on('change',function(){
    $('#filearray').empty();
    for (var i = 0; i < this.files.length; i++) {
     var img = document.createElement("IMG");
     var col = document.createElement("div");
     var image = document.createElement("div");
     $(col).addClass('col-md-6');
     $(image).addClass('image');
     img.src = window.URL.createObjectURL(this.files[i]);
     $(image).prepend(img);
     $(col).prepend(image);
     $('#filearray').addClass('border border-success');
     $('#filearray').prepend(col);
    }
   });

   // Checar radiobox de sección con lo que tiene la tarjeta
   @if ($card->belongsTo == 'gastroenterologia')
      $("#gastroenterologia").prop("checked", true);
   @elseif ($card->belongsTo == 'cirugia-general-y-laparoscopica')
      $("#cirugia-general-y-laparoscopica").prop("checked", true);
   @elseif ($card->belongsTo == 'endoscopia')
      $("#endoscopia").prop("checked", true);
   @endif
   });
  </script>
@endsection
