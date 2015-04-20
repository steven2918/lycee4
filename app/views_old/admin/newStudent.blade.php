
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="post">

	



{{Form::open(['url'=>'admStudent/',])}}

{{Form::label('username', 'Nom', array('class' => 'mon-label'))}}
{{Form::text('username', "", ['class'=>'form-control'])}}

{{Form::label('password', 'Mot de passe', array('class' => 'mon-label'))}}
{{Form::password('password', "", ['class'=>'form-control'])}}


{{ Form::select('role', array('first_class' => 'Première', 'final_class' => 'Terminale'), 'S')}}


{{Form::submit('Ajouter', ['class' => "btn btn-default"])}}
{{ Form::close() }}

</div>


@include("admin.footeradmin")