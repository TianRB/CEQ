<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default ">
                <div class="panel-heading"></div>
                <div class="panel-body">

                    @foreach($slider_pics as $s)
                      <div class="card slider container">
                          <div class="card-header">
                            <div class="row justify-content-between align-items-center d-flex">
                              <h4 class="col-md-8">{{ $s->title }}</h4>
                              <div class="row align-items-center d-flex">
                                <a href="{{ url('sliders/'.$s->id.'/edit') }}"><button class="btn btn-warning article-btn" type="submit"><i class="fa fa-edit" /></i></button></a>
                                <form action="/sliders/{{ $s->id }}" method="POST" class="no-margin">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button class="btn btn-danger article-btn" type="submit"><i class="fa fa-trash" /></i></button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="card-body row">
                            <div class="col-md-2">
                              <img src="{{ $s->path }}" alt="{{ $s->title }}" class="article-img img-responsive">
                            </div>
                            <div class="col-md-3">
                              <p>Activa:</p>
                              <small>{{ $s->enabled }}</small>
                            </div>                
                          </div>
                      </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>