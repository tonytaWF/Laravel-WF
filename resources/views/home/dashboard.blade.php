@extends('master')

@section('content')

    @if (Auth::check())
        <h1>Welcome {{ Auth::user()->name }}</h1>

        {!! link_to('projects/create', 'Create Project', ['class' => 'btn btn-default']) !!}



    @endif

@stop
