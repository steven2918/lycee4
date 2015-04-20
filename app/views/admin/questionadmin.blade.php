@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

    
    <article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Questions</h3><a class="btn btn-default" href="{{url('admQCM/create')}}">Ajouter</a>
        </div>

        <div class="text-center">  {{$questions->links()}}</div>

        {{Form::open(['url'=>'admQCM/action', 'method'=>'post'])}}

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
             <th>Contenu</th>
             <th>Niveau</th>
             <th>Date de création</th>
             <th>Status</th>
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
          <td>{{Form::checkbox('check[]', $question->id, false, ['class'=>'', 'id' => 'check-'.$question->id])}}</td>
          <td>
            {{$question->id}}
          </td>
          <td>
            <a href="{{url('admQCM/'.$question->id.'/edit')}}">  {{$question->title}}</a>
          </td>
          <td>{{ $question->content }}</td>
          <td>
            @if($question->class_level == "first_class")
            Première
            @else
            Terminale
            @endif
          </td>

          <td>
            {{date("d/m/Y", strtotime($question->created_at))}}
          </td>

                <td>
                  @if($question->status =="unpublish")
                  <div class="case">&nbsp;</div> 
                  @else
                  <div class="case ok">&nbsp;</div>

                  @endif
                </td>


        </tr>
        @endforeach

      </tbody>

    </table>

    <div class="text-center">  {{$questions->links()}}</div>

  </div>

</article>


@include("admin.footeradmin")