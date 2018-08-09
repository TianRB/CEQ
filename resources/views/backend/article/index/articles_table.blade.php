<div class="row justify-content-center">
 @foreach($articles as $a)
    <div class="col-md-5">

       <div class="card article container {{-- strtolower($a->categories->pluck('name')->implode(' ')) --}}">
           <div class="card-header">
             <div class="row justify-content-between align-items-center d-flex">
               <h4 class="">{{ $a->title }}</h4>
             </div>
           </div>
           <div class="card-body">
            <div class="row justify-content-center">
             <div class="col-md-12">
               <div class="image" style="height:400px;">
                <img src="{{ url($a->one_pic->pluck('path')->pop()) }}" alt="{{ $a->title }}">
               </div>
             </div>
            </div>
             {{--<p>{!! $a->content !!}</p>--}}
             <hr>
            <div class="row justify-content-center">
             <div class="col-md-5">
               <p>Categorías:</p>
               <small>{{ $a->categories->pluck('name')->implode(', ') }}</small>
             </div>

            </div>
            <hr>
           </div>
           <div class="card-footer">
            <div class="row justify-content-around align-items-center d-flex">
             <!-- ver en sitio -->
             <a class="btn btn-primary" href="{{ url('/product/view/'.$a->slug) }}"><i class="fas fa-globe"></i> Ver en sitio</a>
             <!-- ver en backend -->
             <a class="btn btn-info" href="{{ route('articles.show',$a->id) }}"><i class="fa fa-search"></i></a>
             <!-- editar -->
              <a class="btn btn-warning" href="{{ route('articles.edit',$a->id) }}"><i class="fa fa-edit"></i></a>
              <!-- borrar -->
              <form action="/articles/{{ $a->id }}" method="POST" class="no-margin">
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
