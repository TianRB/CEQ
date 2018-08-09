<div class="row justify-content-center">
  @foreach($categories as $c)
    <div class="col-md-5">
       <div class="card article container">
           <div class="card-header">
             <div class="row justify-content-between">
               <h4 class="col-md-8">{{ $c->name }}</h4>

             </div>
           </div>
           <div class="card-body">
            <ul>
             @foreach ($c->articles as $ca)
              <li>
               <a href="{{route('articles.show', $ca->id)}}">{{$ca->title}}</a>
              </li>
             @endforeach
            </ul>
           </div>
           <div class="card-footer">
            <div class="row justify-content-end">
             {{--<a href="{{ url('categories/'.$c->id.'/edit') }}"><button class="btn btn-warning article-btn" type="submit"><i class="fa fa-edit" /></i></button></a>--}}
            <!--  <form action="/categories/{{ $c->id }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE" />
            <button class="btn btn-danger article-btn" type="submit"><i class="fa fa-trash" /></i></button>
            </form> -->
           </div>
           </div>
       </div>
    </div>
    @endforeach
</div>
