@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

<div class="container">
      <div class="row" >
        <div class="col-sm-2">
          <div class="sidebar-nav">
            <div class="navbar navbar-inverse" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <span class="visible-xs navbar-brand">Sidebar menu</span>
              </div>
              <div class="navbar-collapse collapse sidebar-navbar-collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Dashboard</a></li>
                  <li><a href="#">QCM</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <article class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-8 col-xs-10 col-sm-8 col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Statistiques</h3>
            </div>
            <div class="panel-body">
              <div class="panel panel-danger">score</div><div class="panel panel-succes">score</div>
              <div class="panel panel-info">QCM (nbr)</div>
            </div>
            
          </div>

        </article>
      </div>
    </div>

    @include("admin.footeradmin")