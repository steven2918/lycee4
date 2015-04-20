
@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop

<div class="container">
	<div class="row">
		<article class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-10 col-md-10 col-xs-12 col-sm-10" class="mention" >
			<h2 style="text-align:center">Lycée d'ardeche</h2>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">
						<img src="assets/images/img1.jpg" alt="pont" >
					</div>
					<div class="item">
						<img src="assets/images/img2.jpg" alt="ecole" >
					</div>
					<div class="item">
						<img src="assets/images/img3.jpg" alt="eleves">
					</div>
					<div class="item">
						<img src="assets/images/img4.jpg" alt="classe" >
					</div>
				</div>

			</div>
			<div style="text-align:center">
				<h3>lycées d’enseignement général</h3>
				<p>28 rue de la poupée qui tousse<br/>
					07120 ville ardeche
				</p>
				<div style="height:20px;"></div>

				<h3>lycées d’enseignement technique</h3>
				<p>28 rue de la poupée qui tousse<br/>
					07120 ville ardeche
				</p>
			</div>

		</article>
	</div>
</div>


@include("public.footerpublic")