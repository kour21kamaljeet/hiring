@extends('layout.admin')
@section('content')
<form action="{{route('cal.store',['email' => $data['email']])}}" method="POST">
@csrf
<div class="col-md-6 grid-margin stretch-card text-center">
              <div class="card">
                <div class="card-body">
                <button class="btn btn-primary me-2"><a href="{{ route('cal.index',['email' => $data['email']]) }}">Show Calendar</a></button>
                  <h4 class="card-title">Book Calendar</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="title" class="col-sm-3 col-form-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Title" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                        <input type="text" name="description" class="form-control" id="exampleInputEmail2" placeholder="Description" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="start_date" class="col-sm-3 col-form-label">Start Date (2022-05-28T17:00:00-07:00)</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="start_date" id="exampleInputMobile" placeholder="Start Date" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="end_date" class="col-sm-3 col-form-label">End Date (2022-05-28T17:30:00-07:00)</label>
                      <div class="col-sm-9">
                        <input type="text" name="end_date" class="form-control" id="exampleInputPassword2" placeholder="End Date" required>
                      </div>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
</form>
@endsection