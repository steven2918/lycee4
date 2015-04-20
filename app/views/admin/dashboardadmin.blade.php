@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop



<section class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-10 col-md-5 col-lg-5 ">

  <div class="panel-group" id="accordion">  
    <div class="panel panel-default" id="panel1">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-target="#collapseOne" 
          href="#collapseOne">
          Les dernères fiches
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
         @foreach($lastQcms as $lastQcm)

           <div>
             @if($lastQcm->status =="unpublish")
              <div class="case">&nbsp;</div> 
              @else
              <div class="case ok">&nbsp;</div>
              @endif
              * {{$lastQcm->title}}
            </div>
        @endforeach
            <a href="{{url('admQCM')}}"> <i class="fa fa-arrow-right "></i>Voir toutes les fiches</a>
        </div>
      </div>
    </div>
    <div class="panel panel-default" id="panel2">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-target="#collapseTwo" 
          href="#collapseTwo" class="collapsed">
          Les derniers articles
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          @foreach($lastPosts as $lastPost)

          <div>
            @if($lastPost->status =="unpublish")
            <div class="case">&nbsp;</div> 
            @else
            <div class="case ok">&nbsp;</div>
            @endif
            * {{$lastPost->title}}

          </div>

          @endforeach

          <a href="{{url('articles/')}}"> <i class="fa fa-arrow-right "></i>Voir tous les articles</a>

        </div>
      </div>
    </div>
    <div class="panel panel-default" id="panel3">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-target="#collapseThree"
          href="#collapseThree" class="collapsed">
          Les derniers élèves
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
         @foreach($lastStudents as $lastStudent)

         <div>
           @if($lastStudent->role == "first_class")
          Première&nbsp;&nbsp;
          @else
          Terminale&nbsp;
          @endif
          * {{$lastStudent->username}}
          </div>

          @endforeach
          <a href="{{url('admStudent')}}"> <i class="fa fa-arrow-right "></i>Voir tous les eleves</a>
        </div>
      </div>
    </div>
  </div>
</section>



<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 statistiques">
  <h4>Statistiques</h4>
  <ul>
    <li >
      <span class="glyphicon glyphicon-comment"  aria-hidden="true" ></span><span class="badge">{{$nbTotal['commentaires']}}</span> commentaires
    </li>
    <li >
      <span class="glyphicon glyphicon-folder-open"  aria-hidden="true" ></span><span class="badge">{{$nbTotal['fiches']}}</span> fiches publiés
    </li>
    <li >
      <span class="glyphicon glyphicon-user"  aria-hidden="true" ></span><span class="badge">{{$nbTotal['eleves']}}</span> élèves
    </li>
  </ul>  
</div>
</div>
</div>

@include("admin.footeradmin")