<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>E-Lycée | Espace Admin</title>
  {{HTML::style('assets/css/bootstrap.min.css')}}
  {{HTML::style('assets/css/style.css')}}


</head>
<body>
  <div class="container header">
    <div class="row">
      <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
        <span class="glyphicon glyphicon-home"  aria-hidden="true" ></span>
        <a href="{{url('/')}}">&nbsp;Retour au site Public</a>
      </div>
      <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">

        <span class="glyphicon glyphicon-user"  aria-hidden="true" ></span>
        @if (Auth::check())

        Bonjour {{Auth::user()->username}}

        <a href="{{url('admPost')}}"><span class="glyphicon glyphicon-home"></span>Dashboard</a>
        <a href="{{url('logout')}}">Déconnexion</a>
        @else
        <a href="{{url('login')}}">Connectez-vous</a>
        @endif
      </div>
    </div>
  </div>
  <div id="main">