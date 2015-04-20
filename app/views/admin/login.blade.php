
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop




<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">


{{Form::open(['url'=>'admin'])}}



{{Form::label('username', 'Pseudo', array('class' => 'mon-label'))}}
{{Form::text('username', 'votre pseudo', ['class'=>'form-control'])}}
{{($errors->has('username'))? '<p>votre pseudo est incorrect</p>' : ''}}

{{Form::label('password', 'Mot de passe', array('class' => 'mon-label'))}}
{{Form::password('password',  ['class'=>'form-control'])}}
{{($errors->has('password'))? '<p>password obligatoire</p>' : ''}}



{{Form::submit('Connexion', ['class' => "btn btn-default"])}}
{{ Form::close() }}

@include("admin.footeradmin")

</div>

@include("admin.footeradmin")