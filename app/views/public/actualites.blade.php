@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop





<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-7 col-xs-10 col-sm-7 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 col-sm-offset-1">

			<h1>Actualités</h1>



			@foreach ($data as $post)
			<div class="container-fluid">
				<div class="row">

					<article class="article1">


						<div class="col-lg-2 col-md-2 col-xs-12 col-sm-10">

							@if($post->url_thumbnail != "")

							<img alt="" src="{{url('assets/images/'.$post->url_thumbnail)}}"   />
							@else
							<img alt="" src="{{url('assets/images/pardefautl.jpg')}}"   />

							@endif

						</div>


						<div class="col-lg-10 col-md-10 col-xs-12 col-sm-10">
							<h4 class="list-group-item-heading"><a href="{{url('post/'.$post->id)}}">{{$post->title}}</a></h4>
							<p class="list-group-item-text ">{{$post->abstract}}</p>
							<a href="{{url('post/'.$post->id)}}">Lire la suite</a>
							
							<p>
								Créé par {{$post->user->username}}, le : {{date("d/m/Y", strtotime($post->created_at))}}
							</p>

						</div>
					</article>

					<!-- nombre de commentaires -->

				</div>
			</div>
			@endforeach

		</div>



		<div class="col-lg-3 col-md-3 col-xs-10 col-sm-3 col-xs-offset-1">
			<h2>A lire aussi</h2>
			<div>autre article</div>
			            <a class="twitter-timeline"  href="https://twitter.com/BinetJulien" data-widget-id="554369106833866752">Tweets de @BinetJulien</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            
		</div>




	</div>

	<div class="text-center">{{ $data->links() }}</div>
</div>



@include("public.footerpublic")