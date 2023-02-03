@extends('candidate.candidateheader')
@section('content')
<div class="col-md-12 grid-margin stretch-card text-center">
 <div class="card">
    <div class="card-body">
        <h4 class="card-title">Thank You {{ auth()->user()->f_name }} for your time.</h4>
        <p class="card-description">
        You will hear from the employer shortly regarding your selection and next steps.</p>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><button type="submit" class="btn btn-primary me-2">Close</button></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form> 
    </div>
 </div>
</div>
@endsection