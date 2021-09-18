@extends('layouts.app')

@section('title')
	Employee Dashboard
@endsection

@section('style')

@endsection

@section('header')
	@include('employee.includes.header')
@endsection

@section('sidebar')
	@include('employee.includes.sidebar')
@endsection

@section('content')
	<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard</h1>
		<ol class="breadcrumb">
			<li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">@yield('title')</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				@include('includes.all')
			</div>
			<div class="col-md-4">
				<div id="demo"></div>
				<button class="btn btn-primary" onclick="getLocation()">Try</button>
			</div>
		</div>
	</section>
</div>
@endsection

@section('script')
	<script src="{{ asset('js/sweetalert.js') }}"></script>
	<script>
		// var x = document.getElementById("demo");

		function getLocation() {
		  if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(showPosition, showError);
		  } else { 
		    x.innerHTML = "Geolocation is not supported by this browser.";
		  }
		}

		function showPosition(position) {
		  // x.innerHTML = "Latitude: " + position.coords.latitude + 
		  // "<br>Longitude: " + position.coords.longitude;
		  console.log('Latitude:' + position.coords.latitude);
		  console.log('Longitude:' + position.coords.longitude);
		}

		function showError(error) {
			// Error Show on Sweet Alert
		  switch(error.code) {
		    case error.PERMISSION_DENIED:
		      // x.innerHTML = "User denied the request for Geolocation."
		      console.log("User denied the request for Geolocation.");
		      Swal.fire({
					  icon: 'error',
					  title: 'Permission Denied',
					  text: 'User denied the request for Geolocation.',
					  // footer: '<a href="">Why do I have this issue?</a>'
					})
		      break;
		    case error.POSITION_UNAVAILABLE:
		      // x.innerHTML = "Location information is unavailable."
		      console.log("Location information is unavailable.");
		      break;
		    case error.TIMEOUT:
		      // x.innerHTML = "The request to get user location timed out."
		      console.log("The request to get user location timed out.");
		      break;
		    case error.UNKNOWN_ERROR:
		      // x.innerHTML = "An unknown error occurred."
		      console.log("An unknown error occurred.");
		      break;
		  }
		}
	</script>
@endsection