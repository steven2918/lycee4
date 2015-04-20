
@extends("layouts.master")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop

@section('content')

<div class="post">


	{{Form::open(['url'=>'admPost/'.$post->id, 'method'=>'put', "files"=>true])}}

	{{Form::label('titre', 'Titre', array('class' => 'mon-label'))}}
	{{Form::text('titre', $post->title, ['class'=>'form-control'])}}

	{{Form::label('content', 'Contenu', array('class' => 'mon-label'))}}
	{{Form::textarea('content', $post->content, ['class'=>'form-control ckeditor'])}}

	{{Form::hidden('post_id', $post->id)}}


<p>
	Image : {{Form::file('photo')}}
</p>


	{{Form::submit('Enregistrer les modifications', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>

@stop