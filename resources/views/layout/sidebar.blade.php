
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
@if(Session::get('userId'))
  @php
   $id = Session::get('userId');  
   $userRole = Session::get('userRole');
  @endphp
@endif
      @if(auth()->user()->user_role_id=="1")
      <li class="nav-item nav-category">Admin</li>
      @endif
      @if(auth()->user()->user_role_id=="3")
      <li class="nav-item nav-category">HR</li>
      @endif
      
      <li class="nav-item">
      @if(auth()->user()->user_role_id=="1" || auth()->user()->user_role_id=="3")
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-account"></i>
          <span class="menu-title">User List</span>
          <i class="menu-arrow"></i>
        </a>
        @endif
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
          @if(auth()->user()->user_role_id=="1")
            <li class="nav-item"> <a class="nav-link" href="{{ url('/showcandidate',['roleid' => 3]) }}">HR</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/showcandidate',['roleid' => 4]) }}">Interviewer</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/showcandidate',['roleid' => 2]) }}">Candidate</a></li>
          @endif
          @if(auth()->user()->user_role_id=="3")
            <li class="nav-item"> <a class="nav-link" href="{{ url('/showcandidate',['roleid' => 1]) }}">Admin</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/showcandidate',['roleid' => 4]) }}">Interviewer</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/showcandidate',['roleid' => 2]) }}">Candidate</a></li>
          @endif
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-image-filter-none"></i>
          <span class="menu-title">Question Bank</span>
           <i class="menu-arrow"></i>
        </a>
         <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
          @if(auth()->user()->user_role_id=="1" || auth()->user()->user_role_id=="3")
            <li class="nav-item"><a class="nav-link" href="{{ url('questions') }}">Question Bank</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('question-setting') }}">Setting</a></li>
          @endif
          @if(auth()->user()->user_role_id=="2")
          <li class="nav-item"><a class="nav-link" href="{{ url('showquestion') }}">Start Screening Round</a></li>
          @endif
          </ul>
        </div> 
      </li>

      @if(auth()->user()->user_role_id=="3")
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#schedule" aria-expanded="false" aria-controls="form-elements">
          <span class="icon-calendar input-group-text calendar-icon"></span>
          <span class="menu-title">Schedule Interview</span>
           <i class="menu-arrow"></i>
        </a>
         <div class="collapse" id="schedule">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ url('select-categories') }}">Select categories</a></li>
          </ul>
        </div> 
      </li>
      @endif

      <li class="nav-item nav-category">Profile</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">User Account</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('users.edit',['id' => auth()->user()->id])}}">My Profile</a></li>
            <li class="nav-item"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
          </ul>
        </div>
      </li>
    </ul>
</nav>
