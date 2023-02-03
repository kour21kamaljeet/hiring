@extends('layout.admin')
@section('content')
@if(Session::get('userId'))
  @php
   $id = Session::get('userId');  
   $userRole = Session::get('userRole');
  @endphp
@endif
<?php
$candidate_name = $data["candidate"]->pluck( 'f_name' );
$candidate_id = $data["candidate"]->pluck( 'id' );
?>
<div class="col-md-6 grid-margin stretch-card">                    
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Schedule Interview</h4>
                  <label class="col-sm-3 col-form-label">Select Candidate</label>
                <div class="col-sm-9">
                  <select class="form-control" id="candidate" name="candidate" required>
                    <option value="" disabled selected>Please select candidate</option>        
                    @foreach ($candidate_id as $candidate) 
                    <option value="{{$candidate->id}}">
                    {{$candidate->name}}
                    </option>
                    @endforeach
                  </select>
                 </div>

                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select Interviewer
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                        @foreach ($data['interviewer'] as $interviewer)
                        <a class="dropdown-item">{{ $interviewer->f_name }}</a>
                        <div class="dropdown-divider"></div>
                        @endforeach
                        </div>

                </div>
              </div>              
</div>


@endsection