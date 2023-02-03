<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/studgraph.png" />
</head>

<body>

  <form action={{ url("userregister") }} class="pt-3" method="POST" enctype="multipart/form-data"> 
    @csrf
   <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sign Up to Continue</h4>
        <form class="form-sample">
          <p class="card-description">
            Personal info
          </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="fname" id="firstName" placeholder="First Name" required/>
                  @if ($errors->has('fname'))
                    <span class="text-danger"><div>Enter valid First Name</div></span>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="lastName" name="lname" placeholder="Last Name" required/>
                  @if ($errors->has('lname'))
                    <span class="text-danger"><div>Enter valid Last Name</div></span>
                  @endif
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email address</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="emailId" placeholder="Email" required/>
                  @if ($errors->has('email'))
                    <span class="text-danger"><div>Enter valid Email Address</div></span>
                  @endif  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                  @if ($errors->has('password'))
                    <span class="text-danger"><div>Enter valid Password</div></span>
                  @endif  
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                  <select class="form-control" name="gender" required>
                    <option value="" disabled selected>Please select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                  <select class="form-control" id="country_name" name="country" required>
                    <option value="" disabled selected>Please select country</option>        
                    @foreach ($data["countries"] as $country) 
                    <option value="{{$country->id}}">
                    {{$country->name}}
                    </option>
                    @endforeach
                  </select>
                 </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Mobile Number</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile No" required/>
                  @if ($errors->has('mobile'))
                    <span class="text-danger"><div>Enter valid Mobile Number</div></span>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Experience</label>
                <div class="col-sm-9">
                  <select class="form-control" name="experience" required>
                    <option value="" disabled selected>Please select Experience</option>
                    <option>Less than 1</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>more than 10</option>
                  </select>
                </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Applying For</label>
                <div class="col-sm-9">
                  <select class="form-control" id="job_title_name" name="jobtitle" required>
                    <option value="" disabled selected>Please select Job Title</option>
                    @foreach ($data['job_titles'] as $jobtitle) 
                    <option value="{{$jobtitle->id}}">
                    {{$jobtitle->name}}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Upload Resume</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control" id="resume" name="resume" placeholder="Upload Image" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" required/>
                </div>
              </div>
            </div>
          </div>
          <input name="userstatusid" type="hidden" value="2">
          <input name="userroleid" type="hidden" value="2">
          <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light"><a href="{{ url('login') }}">Cancel</a></button>
        </form>
      </div>
    </div>
 </div>



  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  </form>
</body>

</html>
