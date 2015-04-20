
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

	<h2>Ajout d'un nouvel article</h2>

	{{Form::open(['url'=>'admPost/', "files"=>true])}}

	{{Form::label('titre', 'Titre', array('class' => 'mon-label'))}}

	{{($errors->has('titre'))? '<p class="reponse-not">Veuillez indiquer un titre</p>' : ''}}
	{{Form::text('titre', "", ['class'=>'form-control'])}}

	{{Form::label('abstract', 'Extrait', array('class' => 'mon-label'))}}

	{{($errors->has('abstract'))? '<p class="reponse-not">Veuillez indiquer un extrait</p>' : ''}}
	{{Form::textarea('abstract', '', ['class'=>'form-control'])}}



	{{Form::label('content', 'Contenu', array('class' => 'mon-label'))}}

	{{($errors->has('content'))? '<p class="reponse-not">Veuillez indiquer un contenu</p>' : ''}}
	{{Form::textarea('content', '', ['class'=>'form-control ckeditor'])}}

	<div class="addphoto">
		Mettre une image à la une : {{Form::file('photo')}}
	</div>

	{{Form::submit('Ajouter', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>


@include("admin.footeradmin")