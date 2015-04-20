
@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="container">
	<div class="row">


		<div class="post col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-xs-12 col-sm-10">


			<h2>{{$posts->title}}</h2>


			
			<div class="row">
				<div class="col-md-5">
					@if($posts->url_thumbnail != "")
					<img src="{{url('assets/images/'.$posts->url_thumbnail)}}" alt="{{$posts->url_thumbnail}}">
					@else
					<img src="{{url('assets/images/pardefautl.jpg')}}" alt="Image par défault">
					
					@endif

					<p>
						Auteur  : {{$posts->user->username}}
					</p>

					<p>
						Créé le : {{date("d/m/Y", strtotime($posts->created_at))}}
					</p>
				</div>


				<div class="col-md-7">
					<p>
						{{$posts->content}}
					</p>


				</div>
			</div>


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

			<h3>Ajouter un commentaire</h3>

			{{Form::open(['url'=>'comment'])}}



			{{Form::label('email', 'E-Mail', array('class' => 'mon-label'))}}
			{{Form::email('email', 'votre email', ['class'=>'form-control'])}}


			{{Form::label('pseudo', 'Pseudo', array('class' => 'mon-label'))}}
			{{Form::text('pseudo', 'votre pseudo', ['class'=>'form-control'])}}
			{{isset($errors)? "<p style='color:red;'>".$errors->first('pseudo')."</p>" : ''}}



			{{Form::label('message', 'Message', array('class' => 'mon-label'))}}
			{{Form::textarea('message', 'votre message', ['class'=>'form-control ckeditor'])}}
			{{isset($errors)? "<p style='color:red;'>".$errors->first('message')."</p>" : ''}}



			{{Form::hidden('post_id', $posts->id)}}


			{{Form::submit('Envoyer', ['class' => "btn btn-default"])}}
			{{ Form::close() }}



		</div>
	</div>
</div>




@include("public.footerpublic")