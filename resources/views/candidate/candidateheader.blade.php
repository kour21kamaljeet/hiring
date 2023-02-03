<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Let's Hire</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{ asset("vendors/feather/feather.css")}}>
  <link rel="stylesheet" href={{ asset("vendors/mdi/css/materialdesignicons.min.css")}}>
  <link rel="stylesheet" href={{ asset("vendors/ti-icons/css/themify-icons.css")}}>
  <link rel="stylesheet" href={{ asset("vendors/typicons/typicons.css")}}>
  <link rel="stylesheet" href={{ asset("vendors/simple-line-icons/css/simple-line-icons.css")}}>
  <link rel="stylesheet" href={{ asset("vendors/css/vendor.bundle.base.css")}}>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href={{ asset("vendors/datatables.net-bs4/dataTables.bootstrap4.css")}}>
  <link rel="stylesheet" href={{ asset("js/select.dataTables.min.css")}}>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ asset("css/vertical-layout-light/style.css")}}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{ asset("images/studgraph.png")}} />
  <link rel="stylesheet" href="style.css">
</head>
<body>
 
<li class="">
          <div class="" aria-labelledby="">
            <div class="dropdown-header text-center">
            @if(Auth::user()->image)
     <img class="img-md rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="Profile image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif
              <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->f_name }} {{ auth()->user()->l_name }}</p>
              <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
            <a class="dropdown-item" href="{{route('candidate.edit',['id' => auth()->user()->id])}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" ><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        <div class="content-wrapper">
           @yield('content')
        </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src={{ asset("vendors/js/vendor.bundle.base.js")}}></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src={{ asset("vendors/chart.js/Chart.min.js")}}></script>
  <script src={{ asset("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js")}}></script>
  <script src={{ asset("vendors/progressbar.js/progressbar.min.js")}}></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src={{ asset("js/off-canvas.js")}}></script>
  <script src{{ asset("js/hoverable-collapse.js")}}></script>
  <script src={{ asset("js/template.js")}}></script>
  <script src={{ asset("js/settings.js")}}></script>
  <script src={{ asset("js/todolist.js")}}></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src={{ asset("js/dashboard.js")}}></script>
  <script src={{ asset("js/Chart.roundedBarCharts.js")}}></script>
  <!-- End custom js for this page-->
</body>
</html>

