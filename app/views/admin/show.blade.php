
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



<div class="post col-xs-12 col-sm-10 col-md-10 col-lg-10">

	<h2>{{$posts->title}}</h2>
	
	<div class="row">
		<div class="col-md-5">
			@if($posts->url_thumbnail != "")
			<img src="{{url('assets/images/'.$posts->url_thumbnail)}}" alt="{{$posts->url_thumbnail}}">
			@else
			<img src="{{url('assets/images/pardefautl.jpg')}}" alt="Image par défault">
			
			@endif
			<p>
				<!-- Auteur  :<a href="{{url('user/'.$posts->user->id)}}">{{$posts->user->username}}</a> -->
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
		</div>
	</div>



</div>


</div>


@include("admin.footeradmin")