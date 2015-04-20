
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop


<div class="student">


	{{Form::open(['url'=>'admQCM/'.$question->id, 'method'=>'put'])}}


	{{Form::label('role', 'Niveau', array('class' => 'mon-label'))}}
	{{ Form::select('role', array('first_class' => 'Première', 'final_class' => 'Terminale'), 'S')}}

	{{Form::label('nbreponse', 'Nombre de choix', array('class' => 'mon-label'))}}
	{{ Form::select('nbreponse', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), 'S')}}


	{{Form::label('titre', 'Titre', array('class' => 'mon-label'))}}
	{{Form::text('titre', "", ['class'=>'form-control'])}}

	{{Form::label('content', 'Rédaction de la question', array('class' => 'mon-label'))}}
	{{Form::textarea('content', '', ['class'=>'form-control'])}}

	{{Form::submit('Enregistrer les modifications', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>

@include("admin.footeradmin")