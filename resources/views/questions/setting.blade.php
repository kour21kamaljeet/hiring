@extends('layout.admin')
@section('content')
<form action="{{route('questionsetting.update')}}" method="POST">

@csrf
<div class="col-md-6 grid-margin stretch-card text-center">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Question Setting</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample">
                    
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-6 col-form-label">How many questions will be visible to user:</label>
                      <div class="col-sm-6">
                        <input type="number" name="noofques" class="form-control" id="exampleInputPassword2" placeholder="Enter number" required>
                      </div>
                    </div>
                    
                    <div class="form-check form-check-flat form-check-primary">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-light"><a href="{{ url('/home') }}">Cancel</a></button>
                  </form>
                </div>
              </div>
            </div>
</form>
@endsection