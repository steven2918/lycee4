
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


</div>




@include("public.footerpublic")