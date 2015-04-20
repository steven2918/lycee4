
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="post col-xs-12 col-sm-10 col-md-10 col-lg-10">


	{{Form::open(['url'=>'admStudent/',])}}

	{{Form::label('username', 'Nom', array('class' => 'mon-label'))}}
	{{Form::text('username', "", ['class'=>'form-group'])}}

	{{Form::label('password', 'Mot de passe', array('class' => 'mon-label'))}}
	{{Form::password('password', "", ['class'=>'form-group'])}}

	<div>
		{{Form::label('role', 'Niveau : ', array('class' => 'mon-label'))}}
		{{ Form::select('role', array('first_class' => 'Première', 'final_class' => 'Terminale'), 'S', ['class'=>'form-group'])}}
	</div>


	<div>
		{{Form::submit('Ajouter', ['class' => "btn btn-default"])}}
	</div>
	{{ Form::close() }}

</div>


@include("admin.footeradmin")