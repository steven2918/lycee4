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


			@if($first_post->url_thumbnail != "")
			<img src="{{url('assets/images/'.$first_post->url_thumbnail)}}" alt="{{$first_post->url_thumbnail}}">
			@else
			<img src="{{url('assets/images/pardefautl.jpg')}}" alt="Image par défault">
			
			@endif
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
				Nombre de commentaires :
				@foreach ( $first_post->countComments as $nbComment )
				{{ $nbComment['commentcount'] }}
				@endforeach

			</p>
			<!-- <div class="commentaireart1">commentaire</div> -->
		</article>
		@endforeach

		<div class="col-lg-2 col-md-2 col-xs-12 col-sm-offset-1 col-sm-10" class="article2">

			@foreach ($data as $post)

			<h2><a href="{{url('post/'.$post->id)}}">{{$post->title}}</a></h2>


			@if($post->url_thumbnail != "")
			<img src="{{url('assets/images/'.$post->url_thumbnail)}}" alt="{{$post->url_thumbnail}}">
			@else
			<img src="{{url('assets/images/pardefautl.jpg')}}" alt="Image par défault">
			
			@endif

			<p>
				{{$post->abstract}}
				<a href="{{url('post/'.$post->id)}}">Lire la suite</a>
			</p>



			@endforeach
		</div>

		<div class="col-lg-3 col-md-3 col-xs-12 col-sm-offset-1 col-sm-10">
			<h2>A lire aussi</h2>
			<div>autre article</div>
			            <a class="twitter-timeline"  href="https://twitter.com/BinetJulien" data-widget-id="554369106833866752">Tweets de @BinetJulien</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
		</div> 


	</div>
</div>



</div>

@include("public.footerpublic")