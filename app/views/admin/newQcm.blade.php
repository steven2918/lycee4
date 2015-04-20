
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="post col-xs-12 col-sm-10 col-md-10 col-lg-10">

	

	<h1>Ajout d'une question</h1>
	<h3>Étape 1/2</h3>

	{{Form::open(['url'=>'admQCM/'])}}

	<div>
		{{Form::label('role', 'Niveau', array('class' => 'mon-label'))}}
		{{ Form::select('role', array('first_class' => 'Première', 'final_class' => 'Terminale'), 'S')}}

		{{Form::label('nbreponse', 'Nombre de choix', array('class' => 'mon-label'))}}
		{{ Form::selectRange('nbreponse', 2, 5)}}
	</div>

	{{Form::label('titre', 'Titre', array('class' => 'mon-label'))}}
	{{($errors->has('titre'))? '<p class="reponse-not">Veuillez indiquer un titre</p>' : ''}}
	{{Form::text('titre', "", ['class'=>'form-control'])}}

	{{Form::label('content', 'Rédaction de la question', array('class' => 'mon-label'))}}
	{{($errors->has('titre'))? '<p class="reponse-not">Veuillez indiquer le contenu de la question</p>' : ''}}
	{{Form::textarea('content', '', ['class'=>'form-control ckeditor'])}}




	{{Form::submit('Envoyer', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>


@include("admin.footeradmin")