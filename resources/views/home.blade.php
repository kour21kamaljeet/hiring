{{-- @extends('layouts.app') --}}

@extends('layout.admin')
@section('content')
<h2>Hello {{ auth()->user()->f_name }} </h2>
 <h4>   Please Select Category to explore more...</h4>
 <iframe src="../../images/studiographene.png" name="iframe_a" height="651" width="993" title="">

</iframe>
@endsection

