
@extends("layouts.master")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop

@section('content')

<div class="post">

	



{{Form::open(['url'=>'admPost/', "files"=>true])}}

{{Form::label('titre', 'Titre', array('class' => 'mon-label'))}}
{{Form::text('titre', "", ['class'=>'form-control'])}}

{{Form::label('abstract', 'Extrait', array('class' => 'mon-label'))}}
{{Form::textarea('abstract', '', ['class'=>'form-control'])}}



{{Form::label('content', 'Contenu', array('class' => 'mon-label'))}}
{{Form::textarea('content', '', ['class'=>'form-control'])}}

{{Form::file('photo')}}

{{Form::submit('Ajouter', ['class' => "btn btn-default"])}}
{{ Form::close() }}

</div>

@stop