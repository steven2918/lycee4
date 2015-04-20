@include('layouts.header')

<div class="container header">
  <div class="row header">
    <div class="col-xs-4">
      <h1><a href="{{url()}}">E-Lycée</a></h1>
      @if (Session::has('message'))
      {{Session::get('message')}}
      @endif
    </div>
    <div class="col-xs-4 col-xs-offset-4">
      <blockquote>
       // Le site du lycée ???????
     </blockquote>
   </div>
 </div>
</div><!-- header-->
<div class="container content">
  <div class="row content">
    <div class="col-xs-8">
      @yield('content')
    </div>
    <div class="col-xs-4">

      <img class="logo" src="{{url('assets/images/elao_logo_150px.png')}}" alt="Elao">
      <img class="logo" src="{{url('assets/images/Elephpant.png')}}" alt="Elephant php">
      <img class="logo" src="{{url('assets/images/logo-large.png')}}" alt="Joli Code">
      <img class="logo" src="{{url('assets/images/zol-logo.png')}}" alt="ZOL">


    </div>
  </div>
</div><!-- content -->
<div class="container footer text-right">
  <div class="row footer">
    <ul class="list-inline">
      <li><a href="">Mentions légales</a></li>
      <li><span>|</span><a href=""> Partenaires</a></li>
    </ul>
  </div>
</div><!-- content -->
</body>
</html>