<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>E-Lycée | Espace Admin</title>
  {{HTML::style('assets/css/bootstrap.min.css')}}
  {{HTML::style('assets/css/style.css')}}
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
  </script>
  <script type="text/javascript"
  src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
  </script>


</head>
<body class="admin">
  <div class="container-fluid header">
    <div class="row">
      <div class="col-sm-8 col-xs-6">
        <a href="{{url('/')}}"><i class="fa fa-home fa-2x"></i>&nbsp;Retour au site Public</a>
        @if (Session::has('message'))
        {{Session::get('message')}}
        @endif
      </div>
      <div class="col-sm-4 col-xs-6">
        @if (Auth::check())
        <table>
          <tbody>
            <tr>
              <td>
                <i class="fa fa-user fa-2x"></i>&nbsp;&nbsp;
              </td>
              <td>
                <table>
                  <tbody>
                    <tr>
                      <td>
                        Bonjour {{Auth::user()->username}}
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="{{url('logout')}}">Se déconnecter</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
        @endif


      </div>
    </div>
  </div>
  <div id="main">
    <div class="container">
      <div class="row" >
        @if (Auth::check())


        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 sidebar">

          <div class="navbar navbar-inverse" role="navigation">
            <ul class="nav navbar-nav">
             @if (Auth::user()->role=='teacher')
             {{ HTML::clever_link("dashboard", 'Dashboard', '<i class="fa fa-dashboard fa-2x"></i> ' ) }}
             {{ HTML::clever_link("admQCM", 'Fiches', '<i class="fa fa-file-o fa-2x"></i>' ) }}
             {{ HTML::clever_link("admPost", 'Articles' , '<i class="fa fa-file-text fa-2x"></i>') }}
             {{ HTML::clever_link("admStudent", 'Eleves', '<i class="fa fa-users fa-2x"></i>' ) }}
             @else

             {{ HTML::clever_link("student", 'Dashboard', '<i class="fa fa-dashboard fa-2x"></i> ' ) }}
             {{ HTML::clever_link("student/qcm", 'Fiches', '<i class="fa fa-file-o fa-2x"></i>' ) }}


             @endif
           </ul>

         </div>
       </div>


       @endif