
@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop






{{Form::open(['url'=>'admin'])}}



{{Form::label('username', 'Pseudo', array('class' => 'mon-label'))}}
{{Form::text('username', 'votre pseudo', ['class'=>'form-control'])}}


{{Form::label('password', 'Mot de passe', array('class' => 'mon-label'))}}
{{Form::password('password', '', ['class'=>'form-control'])}}

{{isset($errors)? "<p style='color:red;'>".$errors->first('username')."</p><p style='color:red;'>".$errors->first('password')."</p>" : ''}}


{{Form::submit('Connexion', ['class' => "btn btn-default"])}}
{{ Form::close() }}

