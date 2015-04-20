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
                  <li><a href="#">fiches</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles</a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Boucle article/a></li>
                      <li class="divider"></li>
                    </ul>
                  </li>
                  <li><a href="#">Eleves</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <article class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-4 col-xs-10 col-sm-4 col-md-4">

          <div class="dropdown" class="gestion">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
              Gestion des Articles
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Article boucle</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Voir toute les Articles</a></li>
            </ul>
          </div>

          <div class="dropdown" class="gestion" >
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" >
              Gestion des élèves
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">eleves boucle</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Voir toute les élèves</a></li>
            </ul>
          </div>

        </article>
        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-3 col-xs-10 col-sm-3 col-md-3">
          <h4>gestion</h4>
          <ul>
            <li role="presentation" class="divider"></li>
            <li >
              <span class="glyphicon glyphicon-comment"  aria-hidden="true" ></span><span class="badge">(nbr)</span> commentaires
            </li>
            <li >
              <span class="glyphicon glyphicon-folder-open"  aria-hidden="true" ></span><span class="badge">(nbr)</span> fiches publiés
            </li>
            <li >
              <span class="glyphicon glyphicon-user"  aria-hidden="true" ></span><span class="badge">(nbr)</span> élèves
            </li>
          </ul>  
        </div>
      </div>
    </div>

    @include("admin.footeradmin")