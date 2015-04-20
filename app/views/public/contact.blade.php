@include("public.headerpublic")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop





<div class="container">
	<div class="row">


		<div class="col-lg-7 col-md-7 col-xs-10 col-sm-7 col-lg-offset-1 col-md-offset-1 col-xs-offset-1 col-sm-offset-1">

			<h2>Contact Lycée</h2>

		{{ Form:: open(array('url' => 'contact_request')) }}

		    @foreach($errors->all('
		    :message
		    ') as $message) {{ $message }} @endforeach 


		    <table>

		    	<tr>
		    		<td>
					@if (Session::has('message'))
          <div >{{Session::get('message')}}</div>
         @endif
					</td>
				</tr>

		    	<tr>
		    		<td>
					{{ Form:: label ('email', 'E-mail Address*') }}
					</td>
				</tr>
					<tr>
			    		<td>
					{{ Form:: email ('email', '') }}
						</td>
				</tr>
				<tr>
					<td>

					{{ Form:: label ('sujet', 'Sujet*' )}}
					</td>
				</tr>
				<tr>
			    		<td>
					{{ Form:: text ('sujet', '', array('class' => 'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
					{{ Form:: label ('message', 'Message*' )}}
					</td>
				</tr>
				<tr>
		    		<td>
					{{ Form:: textarea ('message', '', array('class' => 'form-control'))}}
					</td>
				</tr>
				<tr>
		    		<td align="right">
					{{ Form::submit('Envoyer', array('class' => 'form-control ckeditor')) }}
					</td>
				</tr>
			</table>

		{{ Form:: close() }}



		</div>



		<div class="col-lg-3 col-md-3 col-xs-10 col-sm-3 col-xs-offset-1">
			<h2>A lire aussi</h2>
			<div>autre article</div>
            <a class="twitter-timeline"  href="https://twitter.com/BinetJulien" data-widget-id="554369106833866752">Tweets de @BinetJulien</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          		</div>




	</div>

</div>



@include("public.footerpublic")