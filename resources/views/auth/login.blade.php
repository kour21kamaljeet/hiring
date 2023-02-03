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
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                {{-- <img src="../../images/logo.svg" alt="logo"> --}}
                <h3><b>Let's </b><span style="color: rgb(45, 45, 248)"><b>Hire</b></span></h3>
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              
              <form action={{ url("/testuser") }} class="pt-3" method="POST" >
              @csrf
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required/>
                  @if ($errors->has('email'))
                    <span class="text-danger"><div>Enter valid email address</div></span>
                  @endif
                </div>
                <div class="form-group">
                  <input  name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required/>
                  @if ($errors->has('password'))
                    <span class="text-danger"><div>Enter valid Password</div></span>
                  @endif
                </div>
                <div class="mt-3 text-center">
                {{-- </button>><a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="/">SIGN IN</a> --}}
                {{-- <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit"> --}}
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                  {{ __('Login') }} 
                </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      {{-- <input type="checkbox" class="form-check-input"> --}}
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      Remember Me
                    </label>
                  </div>
                  <a class="auth-link text-black" href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <div class="mb-2 text-center">
                <a href="{{ url('auth/google') }}">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-google me-2"></i>Connect using google
                  </button>
                </a>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href={{ url('/userregister') }} class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
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
</body>

</html>
