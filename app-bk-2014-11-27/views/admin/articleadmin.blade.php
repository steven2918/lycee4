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

        <article class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 col-lg-8 col-xs-10 col-sm-8 col-md-8">
          <h3>Articles<button type="button" class="btn btn-default">Ajouter</button></h3>
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">Publication</button>
                <button type="button" class="btn btn-default">Dépublication</button>
                <button type="button" class="btn btn-default">suppression</button>
              </div>
            </div>
            <table class="table">
              <tbody>
                <tr>
                  <td>Titre</td>
                  <td>Auteur</td>
                  <td><span class="glyphicon glyphicon-comment"  aria-hidden="true" ></span>Commentaire</td>
                  <td>Statut</td>
                </tr>
                <!-- boucle -->
                <tr>
                  <td>Titre</td>
                  <td>Auteur</td>
                  <td>Commentaire</td>
                  <td>Statut</td>
                </tr>
              </tbody>
            </table>
          </div>

        </article>
      </div>
    </div>

    @include("admin.footeradmin")