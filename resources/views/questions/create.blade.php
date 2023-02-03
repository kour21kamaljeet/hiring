@extends('layout.admin')
@section('content')
<form action="{{route('create-question') }}" method="POST">

@csrf
<div class="col-md-6 grid-margin stretch-card text-center">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Question</h4>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Question:</label>
                      <div class="col-sm-9">
                        <input type="text" name="question" class="form-control" id="exampleInputUsername2" placeholder="Enter Question" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Answer 1:</label>
                      <div class="col-sm-9">
                        <input type="text" name="answera" class="form-control" id="exampleInputEmail2" placeholder="Answer 1" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Answer 2</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="answerb" id="exampleInputMobile" placeholder="Answer 2" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Answer 3:</label>
                      <div class="col-sm-9">
                        <input type="text" name="answerc" class="form-control" id="exampleInputPassword2" placeholder="Answer 3" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Answer 4:</label>
                      <div class="col-sm-9">
                        <input type="text" name="answerd" class="form-control" id="exampleInputPassword2" placeholder="Answer 4" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Correct Answer:</label>
                      <div class="col-sm-9">
                        <input type="number" name="correct" class="form-control" id="exampleInputPassword2" placeholder="Correct answer number" required>
                      </div>
                    </div>
                    
                    <div class="form-check form-check-flat form-check-primary">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Create</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</form>
@endsection