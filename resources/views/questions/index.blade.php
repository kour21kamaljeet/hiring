@extends('layout.admin')
@section('content')
@if(Session::get('userId'))
  @php
   $id = Session::get('userId');  
   $userRole = Session::get('userRole');
  @endphp
@endif
<a href="{{ url('questions.create') }}"><button type="button" class="btn btn-info btn-rounded btn-fw">Add New Question</button></a>
<br/><br/>
<?php
$count=1;
?>
@foreach ($data["question"] as $question)  
<div class="col-md-6 grid-margin stretch-card">                    
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $count++ }}.{{ $question->question }}</h4>
                  <ol>
                    <li>{{ $question->answera }}</li>
                    <li>{{ $question->answerb }}</li>
                    <li>{{ $question->answerc }}</li>
                    <li>{{ $question->answerd }}</li>
                  </ol>
                  <h4 class="card-title">Answer: {{ $question->correct }}</h4>
                  <a href="{{route('question.edit',['id' => $question->id])}}"><button type="button" class="btn btn-success btn-rounded btn-fw">Edit</button></a>
                  <a href="{{route('question.delete',['id' => $question->id])}}" onclick="return confirm('Are you sure to want to delete this record?')"><button type="button" class="btn btn-danger btn-rounded btn-fw">Delete</button></a>
                </div>
              </div>              
</div>
@endforeach

@endsection