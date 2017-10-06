@extends('/Layout/Master')
@section('title','Bootstrap Card')
@section('main')
    <div class="col-md-7">
    <div class="card card-inverse card-primary text-center col-md-6">
      <div class="card-block">
        <blockquote class="card-blockquote">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        </blockquote>
      </div>
    </div>

    <div class="card card-inverse card-success text-center col-md-6">
      <div class="card-block">
        <blockquote class="card-blockquote">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        </blockquote>
      </div>
    </div>

    <div class="card card-inverse card-warning text-center col-md-6">
      <div class="card-block">
        <blockquote class="card-blockquote">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        </blockquote>
      </div>
    </div>

    <div class="card card-inverse card-danger text-center col-md-6">
      <div class="card-block">
        <blockquote class="card-blockquote">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        </blockquote>
      </div>
    </div>
  </div>
  <div class="card col-md-5">
    <img class="card-img-top" src="http://lorempixel.com/290/200/abstract/8" alt="">
    <div class="card-block">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">
        This is card, very nice and clear right?
      </p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Cras justo odio</li>
      <li class="list-group-item">Dapibus ac facilisis in</li>
      <li class="list-group-item">Vestibulum at eros</li>
    </ul>
    <div class="card-block">
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div>
  </div>

@stop