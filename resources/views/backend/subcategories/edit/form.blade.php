<div class="row justify-content-center">

         <div class="col-md-6">
             <div class="panel panel-default card">

                 <div class="panel-body card-body pt-4">
                     <form class="form-horizontal" method="POST"  action="{{ route('subcategories.store') }}">
                         {{ csrf_field() }}

                         <div class="form-group row justify-content-center">
                             <label for="nombre" class="col-md-10 text-left control-label">Nombre de la nueva subcategoría</label>
                             @if ($errors->has('nombre'))
                                 <span class="help-block">
                                     <small class="text-danger">{{ $errors->first('nombre') }}</small>
                                 </span>
                             @endif
                             <div class="col-md-10">
                                 <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $s->name }}" required autofocus>
                             </div>
                         </div>


                         <div class="form-group row justify-content-center">
                             <div class="col-md-8 text-center">
                                 <button type="submit" class="btn btn-info">
                                     Modificar subcategoría
                                 </button>
                             </div>
                         </div>

                     </form>
                 </div>
             </div>
         </div>


</div>
