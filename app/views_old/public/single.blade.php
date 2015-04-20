
@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="post">


	<h2>{{$posts->title}}</h2>
	<img src="{{url('assets/images/'.$posts->url_thumbnail)}}" alt="{{$posts->url_thumbnail}}">
	<p>
		{{$posts->content}}
	</p>
	<p>
		<!-- Auteur  :<a href="{{url('user/'.$posts->user->id)}}">{{$posts->user->username}}</a> -->
		Auteur  : {{$posts->user->username}}
	</p>

	<p>
		Créé le : {{date("d/m/Y", strtotime($posts->created_at))}}
	</p>

	<div class="commentaires">
		<h5>Commentaires</h5>
		@foreach ($posts->comments as $comment)
		De : {{$comment->pseudo}} <br>
		<p>
			{{$comment->content}} <br>
			Le {{date("d/m/Y", strtotime($comment->created_at))}}
		</p>

		@endforeach

	</div>
	{{Form::open(['url'=>'comment'])}}



{{Form::label('email', 'E-Mail', array('class' => 'mon-label'))}}
{{Form::email('email', 'votre email', ['class'=>'form-control'])}}


{{Form::label('pseudo', 'Pseudo', array('class' => 'mon-label'))}}
{{Form::text('pseudo', 'votre pseudo', ['class'=>'form-control'])}}
{{isset($errors)? "<p style='color:red;'>".$errors->first('pseudo')."</p>" : ''}}



{{Form::label('message', 'Message', array('class' => 'mon-label'))}}
{{Form::textarea('message', 'votre message', ['class'=>'form-control'])}}
{{isset($errors)? "<p style='color:red;'>".$errors->first('message')."</p>" : ''}}



{{Form::hidden('post_id', $posts->id)}}


{{Form::submit('Valider', ['class' => "btn btn-default"])}}
{{ Form::close() }}



</div>




@include("public.footerpublic")