<div class="row justify-content-center">
 <div class="col-md-8">
  <div class="panel panel-default card">
   <div class="panel-body card-body pt-5">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('articles.store') }}">
     {{ csrf_field() }}

     <div class="form-group row justify-content-center">
      <label for="title" class="col-md-10 text-left control-label">Título</label>
      @if ($errors->has('title'))
      <span class="help-block">
          <small class="text-danger">{{ $errors->first('title') }}</small>
      </span>
      @endif
      <div class="col-md-10">
       <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
      </div>
     </div>

     <div class="form-group row justify-content-center">
      <label for="contenido" class="col-md-10 text-left  control-label">Contenido</label>
      @if ($errors->has('contenido'))
      <span class="help-block">
          <small class="text-danger">{{ $errors->first('contenido') }}</small>
      </span>
      @endif
      <div class="col-md-10">
       <textarea id="contenido" type="text" class="form-control ckeditor" name="contenido" value="{{ old('contenido') }}">{{ old('contenido') }}</textarea>
      </div>
     </div>

     <div class="form-group row justify-content-center">
      <label for="categoria" class="col-md-10 text-left control-label">Categoría:</label>
      <div class="col-md-10">
       @foreach($categories as $c)
       <div class="col-md-3 category-list p-2">
         <input name="categoria[]" type="checkbox" value="{{ $c->id }}">
         <small>  {{ $c->name }}  </small></div>
       @endforeach
      </div>
     </div>

     <div class="form-group-file py-4 row justify-content-center">
      <label for="imagen" class="col-md-10 text-left control-label">Imágenes:</label>
      <div class="col-10 mb-3">
       <div class="row p-3" id="filearray"></div>
      </div>
      <div class="custom-file col-md-10">
       <input id="image" name="imagen[]" type="file" class="custom-file-input" multiple=""/>
       <label class="custom-file-label" for="image">Seleccionar Archivo</label>
       @if ($errors->has('imagen'))
       <span class="help-block">
        <small class="text-danger">{{ $errors->first('imagen') }}</small>
       </span>
       @endif
      </div>
     </div>
     <div class="form-group row justify-content-center">
      <div class="col-md-8 text-center">
       <button type="submit" class="btn btn-info">
          Guardar Artículo
      </button>
      </div>
     </div>

    </form>
   </div>
  </div>
 </div>
</div>
