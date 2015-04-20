<html>
<head>
	<meta charset="utf-8">

	<title>{{$title or "Lycée d'Ardeche"}}</title>

 <!--    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"></link>
 
 <script src="{{url('assets/js/bootstrap.min.js')}}"></script> -->



 {{HTML::style('assets/css/bootstrap.min.css')}}
 {{HTML::style('assets/css/style.css')}}

</head>
<body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=1554001444816171&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


  <div class="container header">
    <div class="row">
      <div class="col-lg-2 col-xs-4 col-sm-3 col-md-2">

        <div class="fb-like" data-href="https://www.facebook.com/lecolemultimedia" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>


      </div>
      <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-3 col-lg-2 col-xs-4 col-sm-3 col-md-1">
        @if (Auth::check())

        Bonjour {{Auth::user()->username}}

        <a href="{{url('admPost')}}"><span class="glyphicon glyphicon-home"></span>Dashboard</a>
        <a href="{{url('logout')}}">Déconnexion</a>
        @else
       <span aria-hidden="true" class="glyphicon glyphicon-user"></span> <a href="{{url('login')}}">Connectez-vous</a>
        @endif
      </div>
      <div class="col-lg-3 col-xs-4 col-sm-3 col-md-2">FACEBOOK TWITTER</div>
    </div>

    <div class="row">
      <div class="col-lg-offset-2 col-lg-8">
        <div class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active"> <img alt="" src="assets/images/Deser.jpg"></div>
            <div class="item"> <img alt="" src="assets/images/Lighthous.jpg"></div>
            <div class="item"> <img alt="" src="assets/images/Tulis.jpg"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{url('/')}}">{{ HTML::clever_link("/", 'Home' ) }} <span class="sr-only">(current)</span></a></li>
          <li><a href="{{url('actualites')}}">{{ HTML::clever_link("actualites", 'Actus' ) }}</a></li>
          <li><a href="{{url('presentation')}}">{{ HTML::clever_link("presentation", 'Le lycée' ) }}</a></li>

        </ul>
        <form class="navbar-form navbar-right inline-form" action="{{url('search')}}" method="get">
          <div class="form-group">
            <input type="search" class="input-sm form-control" placeholder="Recherche" id="search" name="search">
            <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
          </div>
        </form>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div id="main">