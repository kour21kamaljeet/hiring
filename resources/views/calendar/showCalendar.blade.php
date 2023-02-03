@extends('layout.admin')
@section('content')
<form action="" method="POST">
@csrf
<?php
  $count=1;
?>
<a href="{{ route('cal.book',['email' => $data['email']]) }}"><button type="button" class="btn btn-info btn-rounded btn-fw">Book Calendar</button></a>
@foreach ($data['cal'] as $calendar)
<div class="col-md-6 grid-margin stretch-card text-center">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $count++ }}</h4>
                  <p class="card-description">                 
                  </p>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="title" class="col-sm-3 col-form-label">Organizer</label>
                      <div class="col-sm-9">
                        <input type="text" name="title" value="{{ $calendar->organizer['email'] }}" class="form-control" id="exampleInputUsername2" placeholder="Title" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Summary</label>
                      <div class="col-sm-9">
                        <input type="text" name="description" value="{{ $calendar->summary }}" class="form-control" id="exampleInputEmail2" placeholder="Description" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="start_date" class="col-sm-3 col-form-label">Start Date Time</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ Carbon\Carbon::parse($calendar->start['dateTime'])->format('d-m-y H:i:s') }}" name="start_date" id="exampleInputMobile" placeholder="Start Date" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="end_date" class="col-sm-3 col-form-label">End Date Time</label>
                      <div class="col-sm-9">
                        <input type="text" name="end_date" value="{{ Carbon\Carbon::parse($calendar->end['dateTime'])->format('d-m-y H:i:s') }}" class="form-control" id="exampleInputPassword2" placeholder="End Date" required>
                      </div>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
</form>
@endsection