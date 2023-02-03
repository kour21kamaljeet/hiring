@extends('candidate.candidateheader')
@section('content')
<form action="{{route('candidate.update',['id' => $data['users']->id])}}" method="POST">
@csrf
<div class="col-md-12 grid-margin stretch-card text-center">
              <div class="card">
                <div class="card-body">
                <button class="btn btn-info me-2"><a href="{{ url('photo.show') }}">Change Profile Photo</a></button><br/><br/>
                  <h4 class="card-title">Update Details</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="fname" value="{{ $data['users']->f_name }}" class="form-control" id="exampleInputUsername2" placeholder="First Name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Last Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="lname" value="{{ $data['users']->l_name }}" class="form-control" id="exampleInputEmail2" placeholder="Last Name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="mobile" value="{{ $data['users']->phone }}" id="exampleInputMobile" placeholder="Mobile number" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" value="{{ $data['users']->email }}" class="form-control" id="exampleInputPassword2" placeholder="Email Address" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Job Title</label>
                      <div class="col-sm-9">
                      <select class="form-control" id="job_title_name" name="jobtitle" required>
                    <option value="{{$data['users']->job_title_id}}" selected="selected">{{$data['titles']->name}}</option>
                    @foreach ($data['job_titles'] as $jobtitle) 
                    <option value="{{$jobtitle->id}}">
                    {{$jobtitle->name}}
                    </option>
                    @endforeach
                  </select>
                 </div>
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</form>
@endsection