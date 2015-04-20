@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

<div class="question col-xs-12 col-sm-10 col-md-10 col-lg-10">



  <h3>
    Thème : {{$question->title}}
  </h3>

  <p>
    Question : {{$question->content}}
  </p>

  


  @foreach ($choices as $choice)

  Choix : 
  <div class="reponse">
    {{$choice->content}}

    @if($choice->status == "yes")
    <span class="reponse-ok">Vrai</span>
    @else
    <span class="reponse-not">Faux</span>
    @endif

  </div>

  @endforeach

  <div class="resultat">
   Note : {{$score}}
 </div>



</div>

@include("admin.footeradmin")