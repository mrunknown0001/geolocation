@extends('layouts.app')

@section('title')
	Employee Dashboard
@endsection

@section('style')
	<style>
		.round-btn {
			height: 100px;
			width: 100px;
			border-radius: 50%;
		}
	</style>
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
			<div class="col-sm-offset-5 col-sm-2 text-center">
					<button class="round-btn btn btn-primary" id="punch" onclick="getLocation()"><i class="fa fa-map-marker"></i> Punch</button>
			</div>
		</div>
	</section>
</div>
@endsection

@section('script')
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/sweetalert.js') }}"></script>
	<script>
		function getLocation() {
		  if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(showPosition, showError);
		  } else { 
	      Swal.fire({
				  type: 'error',
				  title: 'Geolocation Error',
				  text: 'Geolocation is not supported by this browser.',
				  // footer: '<a href="">Why do I have this issue?</a>'
				})
		  }
		}

		function showPosition(position) {
		  // x.innerHTML = "Latitude: " + position.coords.latitude + 
		  // "<br>Longitude: " + position.coords.longitude;
		  console.log('Latitude:' + position.coords.latitude);
		  console.log('Longitude:' + position.coords.longitude);
		  $.ajax({
		  	url: "/e/geoloc/punch/" + position.coords.latitude + "/" + position.coords.longitude,
		  	type: "GET",
          success: function() {
            Swal.fire({
              title: 'Alrigh!',
              text: "",
              type: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Close'
            });

            // Show Time in or time out
            // if time in and timeout on day disable button
          },
          error: function() {
            Swal.fire({
              title: 'Error Occured! Tray Again.',
              text: "",
              type: 'error',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Close'
            });
          }
		  });
		}

		function showError(error) {
			// Error Show on Sweet Alert
		  switch(error.code) {
		    case error.PERMISSION_DENIED:
		      // x.innerHTML = "User denied the request for Geolocation."
		      console.log("User denied the request for Geolocation.");
		      Swal.fire({
					  type: 'error',
					  title: 'Permission Denied',
					  text: 'User denied the request for Geolocation.',
					  // footer: '<a href="">Why do I have this issue?</a>'
					})
		      break;
		    case error.POSITION_UNAVAILABLE:
		      // x.innerHTML = "Location information is unavailable."
		      console.log("Location information is unavailable.");
		      Swal.fire({
					  type: 'error',
					  title: 'Position Unavailable',
					  text: 'Location information is unavailable.',
					  // footer: '<a href="">Why do I have this issue?</a>'
					})
		      break;
		    case error.TIMEOUT:
		      // x.innerHTML = "The request to get user location timed out."
		      console.log("The request to get user location timed out.");
		      Swal.fire({
					  type: 'error',
					  title: 'Timeout Error',
					  text: 'The request to get user location timed out.',
					  // footer: '<a href="">Why do I have this issue?</a>'
					})
		      break;
		    case error.UNKNOWN_ERROR:
		      // x.innerHTML = "An unknown error occurred."
		      console.log("An unknown error occurred.");
		      Swal.fire({
					  type: 'error',
					  title: 'Unknown Error',
					  text: 'An unknown error occurred.',
					  // footer: '<a href="">Why do I have this issue?</a>'
					});
		      break;
		  }
		}
	</script>
@endsection