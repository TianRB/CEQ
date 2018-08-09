<div class="row justify-content-center">
 <div class="col-md-10">
  <div class="card">
   <div class="card-body p-4">
    <div class="row align-items-start">
     <div class="col-md-4">
      <div class="image" style="height:400px;">
       <img src="{{ url($article->one_pic->pluck('path')->pop()) }}" alt="{{ $article->title }}">
      </div>
     </div>
     <div class="col-md-6">
      <h2>{{$article->title}}</h2>
      {!!$article->content!!}
      <h6>Categorías</h6>
      <p>{{ $article->categories->pluck('name')->implode(', ') }}</p>
      <hr>
     </div>
    </div>
   </div>
   <div class="card-footer">
    <div class="row justify-content-end align-items-center d-flex">
     <a class="btn btn-primary mr-2" href="{{ url('/showArticle/'.$article->id) }}"><i class="fas fa-globe"></i>&nbsp;Ver en sitio</a>
      <a class="btn btn-warning mr-2" href="{{ route('articles.edit',$article->id) }}"><i class="fa fa-edit" /></i>&nbsp;Editar</a>
      <form action="/articles/{{ $article->id }}" method="POST" class="no-margin">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="DELETE" />
      <button class="btn btn-danger mr-2" type="submit"><i class="fa fa-trash" /></i>&nbsp;Borrar</button>
      </form>
    </div>
   </div>
  </div>
 </div>
</div>
