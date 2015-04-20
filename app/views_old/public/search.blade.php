
@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop


Recherche pour : {{ $mot }}



<div class="container">
	<div class="row">




		<div class="col-lg-9 col-md-9 col-xs-12 col-sm-10">


					@foreach ($data as $post)
			<div class="container-fluid">
				<div class="row">

					<article class="article1">


						<div class="col-lg-2 col-md-2 col-xs-12 col-sm-10">


							<img alt="" src="{{url('assets/images/'.$post->url_thumbnail)}}"   />

						</div>


						<div class="col-lg-10 col-md-10 col-xs-12 col-sm-10">
							<h4 class="list-group-item-heading"><a href="{{url('post/'.$post->id)}}">{{$post->title}}</a></h4>
							<p class="list-group-item-text pull-right">{{$post->abstract}}</p>
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



		<div class="col-lg-3 col-md-3 col-xs-12  col-sm-10">
			<h2>A lire aussi</h2>
			<div>autre article</div>
			<div>dernier tweet</div>  
		</div>




	</div>
</div>

{{ $data->appends(array('search' => $mot))->links() }}





@include("public.footerpublic")