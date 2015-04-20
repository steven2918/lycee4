@include("admin.headeradmin")

@section('head')
@parent 
@stop


<article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Articles</h3><a class="btn btn-default" href="{{url('admPost/create')}}">Ajouter</a>
            </div>

            <div class="text-center">  {{$posts->links()}}</div>
            {{--Form::open(['url'=>'admPost/'.$post->id, 'method'=>'delete' ])--}}
            {{Form::open(['url'=>'admPost/action', 'method'=>'post'])}}

            <div class="actions">
              {{ Form::select('action', array('publish' => 'Publier', 'unpublish' => 'Dépublier', 'delete' => 'Supprimer'), 'S', ['id' => 'select-action'])}}
              {{Form::submit('Appliquer', ['class' => "btn btn-default"])}}
            </div>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>{{Form::checkbox('check-all', '', false, ['class'=>'', 'id' => 'check-all'])}}</th>
                  <th>Id</th>
                  <th>Titre</th>
                  <th>Autheur</th>
                  <th><span aria-hidden="true" class="glyphicon glyphicon-comment"></span> </th>
                  <th>Posté le</th>
                  <th>Afficher</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($posts as $post)



                <tr
                @if ($post->status == "publish")
                class="info"
                @else
                class="success" 
                @endif
                >
                <td>{{Form::checkbox('check[]', $post->id, false, ['class'=>'', 'id' => 'check-'.$post->id])}}</td>
                <td>
                  {{$post->id}}
                </td>
                <td>
                  <a href="{{url('admPost/'.$post->id.'/edit')}}">  {{$post->title}}</a>
                </td>
                <td>
                  {{$post->user->username}}
                </td>
                <td>
                 @foreach ( $post->countComments as $nbComment )
                 {{ $nbComment['commentcount'] }}
                 @endforeach
               </td>
               <td>
                {{date("d/m/Y", strtotime($post->created_at))}}
              </td>
              <td><a href="{{url('admPost/'.$post->id)}}"><i class="fa fa-eye fa-2x"></i></a></td>
              <td>
                @if($post->status =="unpublish")
                <div class="case">&nbsp;</div> 
                @else
                <div class="case ok">&nbsp;</div>

                @endif
              </td>

            </tr>
            @endforeach

          </tbody>

        </table>
        {{ Form::close() }}

        <div class="text-center">  {{$posts->links()}}</div>

      </div>

    </article>
  </div>
</div>

@include("admin.footeradmin")