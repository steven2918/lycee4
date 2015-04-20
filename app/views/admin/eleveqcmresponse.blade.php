@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

<div class="question col-xs-12 col-sm-10 col-md-10 col-lg-10">


  {{Form::open(['url'=>'score', 'method'=>'post', 'onsubmit' => "return ConfirmResponse()" ])}}


  <h3>
    {{$question->title}}
  </h3>

  <p>
    {{$question->content}}
  </p>

  
  {{Form::hidden('question_id', $question->id)}}

  @foreach ($choices as $choice)

  <div class="reponse">
    {{$choice->content}}

    <div class="choix">
      {{Form::label( 'yes-'.$choice->id,'Vrai', array('class' => 'mon-label'))}}
      {{ Form::radio('valeur-'.$choice->id, 'yes', true, array('id' => 'yes-'.$choice->id) )}}
      {{Form::label( 'no-'.$choice->id, 'Faux',array('class' => 'mon-label'))}}
      {{ Form::radio('valeur-'.$choice->id, 'no', false, array('id' => 'no-'.$choice->id) )}}
    </div>

  </div>

  @endforeach


  {{Form::submit('Envoyer', ['class' => "btn btn-default"])}}
  {{ Form::close() }}

</div>

@include("admin.footeradmin")