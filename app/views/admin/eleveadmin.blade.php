@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

<div class="container">
  <div class="row" >

    <article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Statistiques</h3>
        </div>
        <div class="panel-body">
          <div>
            <p>Score</p>
            <i class="fa fa-line-chart fa-2x"></i>  
            {{--*/ $total = 0 /*--}}

            @foreach($questions as $question)

            {{--*/ $total += $question->note /*--}}

            @endforeach
            {{$total}} points sur {{$nbTotalScores}}
          </div> 
          <br>
          <div>
            <p>Nombre de QCMs répondus</p>
            <i class="fa fa-file-o fa-2x"></i> {{$nbQuestions}} QCM
          </div>
        </div>

      </div>

    </article>
  </div>
</div>

@include("admin.footeradmin")