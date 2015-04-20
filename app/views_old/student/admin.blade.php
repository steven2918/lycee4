
@extends("layouts.master")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop

@section('content')


<h2>Accueil administration du site</h2>

<a href="{{url('admPost/create')}}" class="btn btn-info">Ajouter un article</a>
{{$posts->links()}}
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Afficher</th>
			<th>Status</th>
			<th>Titre</th>
			<th>Autheur</th>
			<th>Posté le</th>
			<th>Changer le statut</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach ($posts as $post)
		<tr
					@if ($post->status == "publish")
					class="info"
					@else
					class="success"	
					@endif
		>
			<td>
				{{$post->id}}
			</td>
			<td><a href="{{url('admPost/'.$post->id)}}">Voir</a></td>
			<td>{{$post->status}}</td>
			<td>
				{{$post->title}}
			</td>
			<td>
				{{$post->user->username}}
			</td>
			<td>
				{{date("d-m-Y", strtotime($post->created_at))}}
			</td>
			<td>
				<a href="{{url('change/'.$post->id)}}" class="btn">
					@if ($post->status == "publish")
					<button type="button" class="btn btn-warning" >Unpublish</button>
					@else
					<button type="button" class="btn btn-warning">Publish</button>				
					@endif
				</a>
			</td>
			<td>
				{{Form::open(['url'=>'admPost/'.$post->id, 'method'=>'delete'])}}
				{{Form::submit('Poubelle', ['class' => "btn btn-danger"])}}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach

	</tbody>

</table>


@stop