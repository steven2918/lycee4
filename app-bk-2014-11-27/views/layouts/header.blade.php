<html>
<head>
	<meta charset="">

	<title>{{$title or "Laravel : PhpTour"}}</title>

 <!--    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"></link>
 
 <script src="{{url('assets/js/bootstrap.min.js')}}"></script> -->



 {{HTML::style('assets/css/bootstrap.min.css')}}
 {{HTML::style('assets/css/style.css')}}
 {{HTML::script('assets/js/bootstrap.min.js')}}

 {{HTML::script('assets/js/ckeditor/ckeditor.js')}}

</head>
<body >


	{{App::environment()}}

	<div class="container navigation">
		<div class="row navigation">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<ol class="breadcrumb">
						<!-- // breadcrumb -->

						@section('breadcrumbs')

						@show

					</ol>
				</div>
				<div class="navbar-collapse collapse navbar-right">

					<ul class="nav navbar-nav">
						@if (Auth::check())

						Bonjour {{Auth::user()->username}}

						<li><a href="{{url('admPost')}}"><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
						<li><a href="{{url('logout')}}">Déconnexion</a></li>
						@else
						<li><a href="{{url('login')}}">Connexion</a></li>
						@endif
					</ul>

					@if(isset($categories))
					<ul class="list-inline">
						<li {{isset($active) ? 'class="active"' :''}}><a href="{{url()}}">Home</a></li>
						@foreach ($categories as $cat)
						<li {{isset($active) && $active=$cat->id ? 'class="active"' :''}}>

							<a href="{{ url('category/'.$cat->id)}}">{{ $cat->title}}</a>
						</li>

						@endforeach
					</ul>
					@endif

				</div>
			</nav>
		</div>
  </div><!-- navigation -->