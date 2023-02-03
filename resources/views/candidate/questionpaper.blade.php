@extends('candidate.candidateheader')
@section('content')
<?php
$count=1;
?>
<form action="{{route('submitquestion')}}" method="POST" name="question_paper">
@csrf   

<div class="col-md-6 grid-margin stretch-card">
<div class="card">
<div class="row">

              @foreach ($data as $question) 
                <div class="card-body">
                <input name="questions[{{ $count }}]" type="hidden" value="{{ $question->id }}">
                        <h4 class="card-title">{{ $count }}.{{ $question->question }}</h4>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="option[{{$question->id}}]" value="1">
                              {{ $question->answera }}
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="option[{{$question->id}}]" value="2">
                              {{ $question->answerb }}
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="option[{{$question->id}}]" value="3">
                              {{ $question->answerc }}
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="option[{{$question->id}}]" value="4">
                              {{ $question->answerd }}
                            </label>
                          </div>
                          <input name="correct[{{$question->id}}]" type="hidden" value="{{ $question->correct }}">
<?php
$count=$count+1;
?>
                        </div>
              @endforeach
              <button type="submit" class="btn btn-primary me-2" id="loginSubmit">Submit</button>
    </div>
</div>


<div class="col-md-9 grid-margin stretch-card">
<div class="card">
<div class="row">
<label class="col-md-3 display-1 text-primary rate-percentage" style="position:fixed;">Time Left: </label>

    <div class="col-md-6">
<div align="center" >
    <div id="exam_timer" style="position:fixed; max-width: 700px; width: 100%; height: 200px; " class="display-1 text-primary rate-percentage">
    </div>  
</div></div>
</div></div>
</form>  
         
 <script type="text/javascript">
 
 const startingMinutes=1;
 let time=startingMinutes*60;

 const countdown=document.getElementById('exam_timer');

 var interval = setInterval(updateCountdown,1000);

 function updateCountdown() {
   let url = "{{route('submitquestion')}}";
   const minutes = Math.floor(time / 60);
   let seconds = time % 60;

   seconds = seconds < 10 ? '0' + seconds : seconds;

   countdown.innerHTML = `${minutes}:${seconds}`;
   time--;
   if(seconds == 0 && minutes == 0) {
    countdown.innerHTML = `0:0`;
      alert('Stop Now!!!');
      clearInterval(interval);
      countdown.innerHTML = `0:0`;
      document.getElementById('loginSubmit').click();
    }
 }
 
 </script>
@endsection
