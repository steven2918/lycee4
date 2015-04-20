<html>
<head>
	<meta charset="utf-8">

	<title>{{$title or "Lycée d'Ardeche"}}</title>

 <!--    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"></link>
 
 <script src="{{url('assets/js/bootstrap.min.js')}}"></script> -->



 {{HTML::style('assets/css/bootstrap.min.css')}}
 {{HTML::style('assets/css/style.css')}}
 {{HTML::style('assets/css/bootstrap-social.css')}}
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 <script type="text/x-mathjax-config">
 MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
 </script>
 <script type="text/javascript"
 src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
 </script>

</head>
<body class="public">

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&appId=1554001444816171&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


  <div class="container header">
    <div class="row" style="text-align:right">

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
        <div class="fb-like" data-href="https://www.facebook.com/lecolemultimedia" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false" style="padding-top:5px;padding-bottom:5px;"></div>
      </div>

      &nbsp;
      @if (Auth::check())
      <div class="col-lg-offset-2 col-md-offset-1 col-lg-2 col-md-2 col-sm-2 col-xs-8"  style="padding-top:5px;padding-bottom:5px;">
        Bonjour {{Auth::user()->username}}
      </div>

      <div class="col-lg-4 col-md-4 col-xs-12 col-sm-5 " style="padding-top:5px;padding-bottom:5px;" >
        @if (Auth::user()->role=='teacher')
        <a href="{{url('dashboard')}}" class="btn btn-default"><i class="fa fa-dashboard fa-2"></i>&nbsp;Dashboard</a>
        @else
        <a href="{{url('student')}}" class="btn btn-default"><i class="fa fa-dashboard fa-2"></i>&nbsp;Dashboard</a>
        @endif

        &nbsp;<a class="btn btn-warning" href="{{url('logout')}}">Déconnexion</a>
        @else
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-5 " style="padding-top:5px;padding-bottom:5px;" >
         &nbsp;<a href="{{url('login')}}" class="btn btn-success"><span aria-hidden="true" class="glyphicon glyphicon-user"></span> Connectez-vous</a>
         @endif
       </div>

       <div class="col-lg-2 col-md-2 col-xs-12 col-sm-3 " style="padding-top:5px;padding-bottom:5px;"><button class="btn btn-primary"><i class="fa fa-facebook fa-3"></i></button>&nbsp;&nbsp;<button class="btn btn-primary"><i class="fa fa-twitter fa_3"></i></button>
       </div>

     </div>
   </div>

   <nav class="navbar navbar-inverse menu-principal" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          {{ HTML::clever_link("/", 'Home', "" ) }} 
          {{ HTML::clever_link("actualites", 'Actus', "" ) }}
          {{ HTML::clever_link("presentation", 'Le lycée', "" ) }}

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