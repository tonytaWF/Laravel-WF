@extends('master')

@section('content')

	@if (Auth::check()) 
		<h1>Welcome {{ Auth::user()->name }}</h1>
	@endif

	@include('leads._form')


@stop
