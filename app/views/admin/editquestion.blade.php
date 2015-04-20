
@include("admin.headeradmin")

@section('head')
@parent	
<!-- <script type="text/javascript"></script> -->
@stop


<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">


	{{Form::open(['url'=>'admQCM/'.$question->id, 'method'=>'put', "files"=>true])}}

	{{Form::label('title', 'Titre', array('class' => 'mon-label'))}}
	{{Form::text('title', $question->title, ['class'=>'form-control'])}}

	{{Form::label('content', 'Contenu', array('class' => 'mon-label'))}}
	{{Form::textarea('content', $question->content, ['class'=>'form-control ckeditor'])}}

	{{Form::label('role', 'Niveau', array('class' => 'mon-label'))}}
	{{ Form::select('role', array('first_class' => 'Première', 'final_class' => 'Terminale'), $question->class_level)}}

	{{Form::hidden('question_id', $question->id)}}

	<div class="reponses">
		<h3>Choix possibles</h3>

	{{Form::hidden('nbReponse', $nbReponse)}}

		@foreach($choices as $choice)
		<div class="reponse">

			{{Form::textarea('reponse'.$choice->id, $choice->content, ['class'=>'form-control ckeditor'])}}



			{{Form::label('yes-'.$choice->id, 'Vrai', array('class' => 'mon-label'))}}
			{{ Form::radio('valeur'.$choice->id, 'yes', ($choice->status == 'yes') , array('id' => 'yes-'.$choice->id))}}
			{{Form::label('no-'.$choice->id, 'Faux', array('class' => 'mon-label'))}}
			{{ Form::radio('valeur'.$choice->id, 'no', ($choice->status == 'no'), array('id' => 'no-'.$choice->id))}}

		</div>
		@endforeach
	</div>


	{{Form::submit('Enregistrer les modifications', ['class' => "btn btn-default"])}}
	{{ Form::close() }}

</div>

@include("admin.footeradmin")