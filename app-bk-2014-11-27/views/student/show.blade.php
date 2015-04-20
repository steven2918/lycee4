
@extends("layouts.master")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop

@section('content')

<div class="post">

	<h2>{{$posts->title}}</h2>



	<a href="{{url(''.'admPost/'.$posts->id.'/edit')}}" class="btn btn-info">Editer</a>

	<p>{{$posts->content}}</p>


	<img src="{{url('assets/images/'.$posts->link_thumbnail)}}" alt="{{$posts->link_thumbnail}}">

</div>


@stop