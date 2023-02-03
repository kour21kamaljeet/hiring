@extends('candidate.candidateheader')
@section('content')
<div class="col-md-12 grid-margin stretch-card text-center">
 <div class="card">
    <div class="card-body">
        <h4 class="card-title">Dear {{ auth()->user()->f_name }} </h4>
        <p class="card-description">
        Thank you for applying for a job at <b>Studio Graphene Pvt Ltd</b> and for the time and effort you put into applying for the position.</p>        
        <p>We really appreciate your interest in joining our company and we want to thank you for the time and energy you invested in applying for our job opening.</p>
        <p>Unfortunately, we have to inform you that this time we won’t be able to invite you to the next phase of our selection process.</p>
        <p>While we were impressed with your educational qualifications and skill set, we received applications from a large number of candidates.</p>
        <p>We wish you the best of luck in your endeavors, and we truly hope we'll have the chance to talk to you again in the future.</p>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><button type="submit" class="btn btn-primary me-2">Close</button></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form> 
    </div>
 </div>
</div>
@endsection