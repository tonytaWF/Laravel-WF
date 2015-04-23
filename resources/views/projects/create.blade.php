@extends('master')

@section('content')

    @if (Auth::check())
        <div class="row">
            <div class="col-md-6">
                <a href="{{ URL::previous() }}">Go Back</a>

                <h1>Create Project</h1>

                @include('layouts.partials.errors')

                {!! Form::open(['url' => 'projects']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Project Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Project', ['class' => 'btn btn-success form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endif

@stop
