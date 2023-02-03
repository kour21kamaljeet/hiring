@extends('layout.admin')
@section('content')
@if(Session::get('userId'))
  @php
   $id = Session::get('userId');  
   $userRole = Session::get('userRole');
  @endphp
@endif


<?php
  $count=1;
  $roleid=0;
?>
@foreach($users as $newuser)
<?php
$roleid=$newuser->user_role_id;
?>
@endforeach

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Candidates</h4>
                 @if($users!=null)

                     @if($roleid == 2 || $roleid == 0)
                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                        <a class="dropdown-item" href="{{ url('/showcandidate',['roleid' => 2]) }}">All Candidates</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'Hired']) }}">Hired Candidates</a>
                        <div class="dropdown-divider"></div>  
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'Offered']) }}">Offered Job</a>
                        <div class="dropdown-divider"></div>  
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'On hold']) }}">On Hold Candidates</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'CTO round']) }}">Qualified CTO Round</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'HR round']) }}">Qualified HR Round</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'Screening']) }}">Qualified Screening Test</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'Interview']) }}">Qualified Technical Round</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'VP round']) }}">Qualified VP Round</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/showcandidatecategory',['roleid' => 2, 'status' => 'Processing']) }}">Registered</a>
                        </div>
                      @endif
                 @endif

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            S.No
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Last Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Mobile No
                          </th>
                          @if($roleid!=1)
                          <th>
                            Edit
                          </th>
                          @endif
                          @if($userRole=="1")
                          <th>
                            Delete
                          </th>
                          @endif
                          @if($roleid == 4)
                          <th>
                            Create Event
                          </th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td >
                            {{$count++}}
                          </td>
                          <td>
                          {{$user->f_name}}
                          </td>
                          <td>
                          {{$user->l_name}}
                          </td>
                          <td>
                          {{$user->email}}
                          </td>
                          <td>
                          {{$user->phone}}
                          </td>
                          @if($roleid!=1)
                          <td>
                          <a href="{{route('users.edit',['id' => $user->id])}}" ><i class="mdi mdi-border-color"></i></a>
                          </td>
                          @endif
                          @if($userRole=="1")
                          <td>
                          <a href="{{route('users.delete',['id' => $user->id])}}" onclick="return confirm('Are you sure to want to delete this record?')"><i class="mdi mdi-delete"></i> </a>
                          </td>
                          @endif
                          @if($roleid == 4)
                          <td>
                          <a href="{{route('oauthCallback',['email' => $user->email])}}" ><i class="mdi mdi-calendar"></i></a>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                    {!! $users->links() !!}
                  </div>
                </div>
              </div>
            </div>
 @endsection