@extends('candidate.candidateheader')
@section('content')
<div class="col-md-12 grid-margin stretch-card text-center">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thank You {{ auth()->user()->f_name }}</h4>
                  <p class="card-description">
                  You are successfully registered!!!
                  </p>
                  <p>This is an example of interactive questionnaire with questions from various areas.
    Start by clicking on "Start" button then, answer the questions by clicking on one of four given answers.</p>
    <p>Quiz duration is limited to 10 mintues, If you answer on all questions earlier, quiz will end.</p>
    <a href="{{route('showquestion')}}"><button type="submit" class="btn btn-primary me-2">Start</button></a>
  </div>
</div>
</div>

@endsection