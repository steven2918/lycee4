
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop


<div class="student col-xs-12 col-sm-10 col-md-10 col-lg-10">


	{{Form::open(['url'=>'admStudent/'.$student->id, 'method'=>'put', "files"=>true])}}

	{{Form::label('nom', 'Nom', array('class' => 'mon-label'))}}
	{{Form::text('nom', $student->username, ['class'=>'form-control'])}}

	{{Form::label('content', 'Contenu', array('class' => 'mon-label'))}}
	{{Form::textarea('content', $student->content, ['class'=>'form-control ckeditor'])}}

	{{Form::hidden('student_id', $student->id)}}


<p>
	Image : {{Form::file('photo')}}
</p>


	{{Form::submit('Enregistrer les modifications', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>

@include("admin.footeradmin")