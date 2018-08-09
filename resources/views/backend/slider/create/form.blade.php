<div class="row justify-content-center">

         <div class="col-md-8">
             <div class="panel panel-default card">
                 <div class="panel-body card-body pt-4">
                     <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('sliders.store') }}">
                         {{ csrf_field() }}

                         <div class="form-group row justify-content-center">
                             <label for="titulo" class="col-md-10 text-left control-label">Título</label>
                             @if ($errors->has('titulo'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('titulo') }}</small>
                                 </span>
                             @endif
                             <div class="col-md-10">
                                 <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>
                             </div>
                         </div>

                         <div class="form-group row justify-content-center">
                             <label for="descripcion" class="col-md-10 text-left control-label">Descripción:</label>
                             @if ($errors->has('descripcion'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('descripcion') }}</small>
                                 </span>
                             @endif
                             <div class="col-md-10">
                                 <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required>
                             </div>
                         </div>

                         <div class="form-group row justify-content-center">
                             <label for="url" class="col-md-10 text-left control-label">URL:</label>
                             @if ($errors->has('url'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('url') }}</small>
                                 </span>
                             @endif
                             <div class="col-md-10">
                                 <input id="url" type="text" class="form-control" name="url" value="{{ old('descripcion') }}" required>
                             </div>
                         </div>

                         <div class="form-group row justify-content-center">
                             <label for="activado" class="col-md-10 text-left control-label">Activar imágen en Slider:
                              {!! Form::checkbox('activado',true) !!}</label>

                         </div>


                         <div class="form-group-file p-2 row justify-content-center">
                             <label for="imagen" class="col-md-10 text-left control-label">Imágen:</label>
                             @if ($errors->has('imagen'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('imagen') }}</small>
                                 </span>
                             @endif
                             <input id="image" name="imagen" type="file" class="file"/>
                         </div>

                         <div class="form-group row justify-content-center">
                             <div class="col-md-8 text-center">
                                 <button type="submit" class="btn btn-info">
                                     Crear imagen de slider
                                 </button>
                             </div>
                         </div>

                     </form>
                 </div>
             </div>
         </div>


</div>
