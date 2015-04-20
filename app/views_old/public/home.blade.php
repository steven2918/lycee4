@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop



{{-- $data->links() --}}

<div class="container">
	<div class="row">

@foreach ($first as $first_post)

		<article class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-4 col-md-4 col-xs-12 col-sm-10" class="article1">

			<h2><a href="{{url('post/'.$first_post->id)}}">{{$first_post->title}}</a></h2>

			<img src="{{url('assets/images/'.$first_post->url_thumbnail)}}" alt="{{$first_post->url_thumbnail}}">
			<p>
				{{$first_post->abstract}}
				<a href="{{url('post/'.$first_post->id)}}">Lire la suite</a>
			</p>
			<p>
				<!-- Auteur  :<a href="{{url('user/'.$first_post->user->id)}}">{{$first_post->user->username}}</a> -->
				Auteur  : {{$first_post->user->username}}
			</p>

			<p>
				Créé le : {{date("d/m/Y", strtotime($first_post->created_at))}}
			</p>
			<p>
				Nombre de commentaires :{{$first_post->countComments}}
			</p>

			<div class="commentaireart1">commentaire</div>
		</article>
	@endforeach

		<div class="col-lg-2 col-md-2 col-xs-12 col-sm-offset-1 col-sm-10" class="article2">

		@foreach ($data as $post)

			<h2><a href="{{url('post/'.$post->id)}}">{{$post->title}}</a></h2>

			<img src="{{url('assets/images/'.$post->url_thumbnail)}}" alt="{{$post->url_thumbnail}}">
			<p>
				{{$post->abstract}}
				<a href="{{url('post/'.$post->id)}}">Lire la suite</a>
			</p>



		@endforeach
		</div>

		<div class="col-lg-3 col-md-3 col-xs-12 col-sm-offset-1 col-sm-10">
			<h2>A lire aussi</h2>
			<div>autre article</div>
			<div>dernier tweet</div>  
		</div> 


	</div>
</div>



</div>

@include("public.footerpublic")