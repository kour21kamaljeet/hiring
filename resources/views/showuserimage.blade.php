@extends('layout.admin')
@section('content')
<form action="{{route('photo.update')}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="col-md-12 grid-margin stretch-card text-center">
  <div class="card">
    <div class="card-body">
       <div class="form-group row">
                <label class="col-sm-3 col-form-label">Upload Profile Picture</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control" name="profile" placeholder="Upload Image" accept=".jpg,.jpeg,.bmp,.png,.gif" required/>
                </div>
       </div>
       <button type="submit" class="btn btn-primary me-2">Upload</button>
    </div>
  </div>
</div>
</form>
@endsection