<div class="row justify-content-center">
 @foreach($subcategories as $s)
 <div class="col-md-5">
  <div class="card article container">
   <div class="card-header">
    <div class="row justify-content-between">
     <h4 class="">{{ $s->name }}</h4>
    </div>
   </div>
   <div class="card-body">
    <ul>
     @foreach ($s->articles as $sa)
      <li>
       <a href="{{route('articles.show', $sa->id)}}">{{$sa->title}}</a>
      </li>
     @endforeach
    </ul>
   </div>
   <div class="card-footer">
    <div class="row justify-content-end align-items-center d-flex">
     <a class="btn btn-warning mr-2" href="{{ route('subcategories.edit',$s->id) }}"> <i class="fa fa-edit"></i></a>
     <!-- borrar -->
     <form action="/subcategories/{{ $s->id }}" method="POST" class="m-0">
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
