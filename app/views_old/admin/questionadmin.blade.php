@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

<div class="container">
      <div class="row" >
        <div class="col-sm-2">
          <div class="sidebar-nav">
            <div class="navbar navbar-inverse" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Sidebar menu</span>
              </div>
              <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Dashboard</a></li>
                  <li><a href="{{url('admQCM')}}">Fiches</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles</a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Boucle article/a></li>
                      <li class="divider"></li>
                    </ul>
                  </li>
                  <li><a href="{{url('admStudent')}}">Eleves</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <article class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-8 col-xs-10 col-sm-8 col-md-8">
          <h3>Questions<a class="btn btn-default" href="{{url('admQCM/create')}}">Ajouter</a></h3>
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">Publication</button>
                <button type="button" class="btn btn-default">Dépublication</button>
                <button type="button" class="btn btn-default">suppression</button>
              </div>
            </div>
           
{{$questions->links()}}
<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>title</th>
      <th>content</th>
      <th>Classe</th>
      <th>Status</th>
      <th>Changer le statut</th>
      <th>Supprimer</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ($questions as $question)
    <tr
          @if ($question->status == "publish")
          class="info"
          @else
          class="success" 
          @endif
    >
      <td>
        {{$question->id}}
      </td>
      <td>
      <a href="{{url('admQCM/'.$question->id.'/edit')}}">  {{$question->title}}</a>
      </td>
      <td>{{ $question->content }}</td>
      <td>{{$question->status}}</td>
      <td>{{$question->class_level}}</td>

      <td>
        {{date("d/m/Y", strtotime($question->created_at))}}
      </td>
      <td>
        <a href="{{url('change/'.$question->id)}}" class="btn">
          @if ($question->status == "publish")
          <button type="button" class="btn btn-warning" >Unpublish</button>
          @else
          <button type="button" class="btn btn-warning">Publish</button>        
          @endif
        </a>
      </td>
      <td>
        {{Form::open(['url'=>'admQCM/'.$question->id, 'method'=>'delete'])}}
        {{Form::submit('Poubelle', ['class' => "btn btn-danger"])}}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach

  </tbody>

</table>

          </div>

        </article>
      </div>
    </div>

    @include("admin.footeradmin")