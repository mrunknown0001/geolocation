@extends('layouts.app')

@section('title')
	Employees
@endsection

@section('style')

@endsection

@section('header')
	@include('user.includes.header')
@endsection

@section('sidebar')
	@include('user.includes.sidebar')
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
		</div>
		<div class="row">
			<div class="com-md-12">
				
			</div>
		</div>
	</section>
</div>
@endsection

@section('script')

@endsection