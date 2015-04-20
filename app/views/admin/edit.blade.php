
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop


<div class="post col-xs-12 col-sm-10 col-md-10 col-lg-10">


	{{Form::open(['url'=>'admPost/'.$post->id, 'method'=>'put', "files"=>true])}}

	{{Form::label('titre', 'Titre', array('class' => 'mon-label'))}}
	{{Form::text('titre', $post->title, ['class'=>'form-control'])}}

	{{Form::label('abstract', 'Extrait', array('class' => 'mon-label'))}}
	{{Form::textarea('abstract', $post->abstract, ['class'=>'form-control ckeditor'])}}

	{{Form::label('content', 'Contenu', array('class' => 'mon-label'))}}
	{{Form::textarea('content', $post->content, ['class'=>'form-control ckeditor'])}}

	{{Form::hidden('post_id', $post->id)}}


<p>
	Image : {{Form::file('photo')}}
</p>


	{{Form::submit('Enregistrer les modifications', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>

@include("admin.footeradmin")
