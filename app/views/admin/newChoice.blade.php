
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="post col-xs-12 col-sm-10 col-md-10 col-lg-10">

	<h1>Ajout d'une question</h1>
	<h3>Étape 2/2</h3>

	{{Form::open(['url'=>'admChoice/'])}}

	{{Form::hidden('id-form', $idQuestion)}}
	{{Form::hidden('nbReponse', $nbReponse)}}

	@for ($i = 0; $i < $nbReponse; $i++)

	<div class="reponse">
		{{Form::label('reponse'.$i, 'Choix n°'.($i+1), array('class' => 'mon-label'))}}
		{{Form::textarea('reponse'.$i, '', ['class'=>'form-control ckeditor'])}}

		{{Form::label('yes-'.$i, 'Vrai', array('class' => 'mon-label'))}}
		{{ Form::radio('valeur'.$i, 'yes', true, array('id' => 'yes-'.$i))}}
		{{Form::label('no-'.$i, 'Faux', array('class' => 'mon-label'))}}
		{{ Form::radio('valeur'.$i, 'no', false, array('id' => 'no-'.$i))}}

	</div>
	
	@endfor


	{{Form::submit('Envoyer', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>


@include("admin.footeradmin")