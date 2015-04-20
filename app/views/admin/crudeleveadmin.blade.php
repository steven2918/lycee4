@include("admin.headeradmin")

@section('head')
@parent 
<!-- <script type="text/javascript"></script> -->
@stop




<article class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Eleves</h3><a href="{{url('admStudent/create')}}" class="btn btn-default">Ajouter</a>
        </div>

        <div class="text-center">  {{$students->links()}}</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nom</th>
              <th>Classe</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($students as $student)
            <tr>
              <td>
                {{$student->id}}
              </td>
              <td><a href="{{url('admStudent/'.$student->id.'/edit')}}">{{$student->username}}</a></td>
              <td>
               @if($student->role == "first_class")
               Première
               @else
               Terminale
               @endif
             </td>
             
             <td>
              {{Form::open(['url'=>'admStudent/'.$student->id, 'method'=>'delete' , 'onsubmit' => 'return ConfirmDelete()'])}}
              {{Form::submit('Poubelle', ['class' => "btn btn-danger"])}}
              {{ Form::close() }}
            </td>
          </tr>
          @endforeach

        </tbody>

      </table>
      <div class="text-center">  {{$students->links()}}</div>

    </div>

  </article>





</div>
</div>

@include("admin.footeradmin")