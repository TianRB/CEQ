<div class="row justify-content-center">
 @if (count($articles) > 0)
  @foreach($articles as $a)
    <div class="col-md-5">

        <div class="card article container {{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
            <div class="card-header">
              <div class="row justify-content-between align-items-center d-flex">
                <h4 class="col-md-10">{{ $a->title }}</h4>
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
              <div class="col-md-5">
                <p>Subcategorías:</p>
                <small>{{ $a->subcategories->pluck('name')->implode(', ') }}</small>
              {{-- <p><a href="{{ url('/related/'.$a->categories) }}">Ver en sitio</a></p> --}}
              </div>
             </div>
             <hr>
            </div>
            <div class="card-footer">
             <div class="row justify-content-end align-items-center d-flex">
              <a class="btn btn-primary" href="{{ url('/showArticle/'.$a->id) }}"><i class="fa fa-search"></i> Ver en sitio</a>
               <a class="btn btn-warning article-btn mx-2" href="{{ url('articles/'.$a->id.'/edit') }}"><i class="fa fa-edit" /></i></a>
               <form action="/articles/{{ $a->id }}" method="POST" class="no-margin">
               {{ csrf_field() }}
               <input type="hidden" name="_method" value="DELETE" />
               <button class="btn btn-danger article-btn" type="submit"><i class="fa fa-trash" /></i></button>
               </form>
             </div>
            </div>
        </div>
     </div>
   @endforeach

 @else
  <div class="col-md-5">
   <div class="card p-5">
    <div class="card-title">
     <h2 class="title text-center">Lo sentimos!</h2>
    </div>
    <div class="card-body">
     <p class="text-center">No hay resultados para "{{ $title }}"</p>
    </div>
   </div>
  </div>
 @endif
</div>
