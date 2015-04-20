@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop

<div class="container">
	<div class="row" >

		<article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

			<h2>Listes des questions</h2>

			<div class="text-center">  {{$questions->links()}}</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>title</th>
						<th>content</th>
						<!-- <th>Classe</th> -->
						<th>Date de création</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($questions as $question)
					<tr>
						<td>
							{{$question->id}}
						</td>
						<td>
							@if($question->status_question =="pas fait")
							<div class="case ok">&nbsp;</div> <a href="{{url('student/qcm/response/'.$question->id)}}">  {{$question->title}}</a>
							@else
							<div class="case">&nbsp;</div><a href="{{url('student/qcm/view/'.$question->id)}}">{{$question->title}}</a>

							@endif
						</td>
						<td>{{ $question->content }}</td>
						<!-- <td>{{$question->class_level}}</td> -->

						<td>
							{{date("d/m/Y", strtotime($question->created_at))}}
						</td>


					</tr>
					@endforeach

				</tbody>

			</table>

			<div class="text-center">  {{$questions->links()}}</div>

		</article>
	</div>
</div>

@include("admin.footeradmin")