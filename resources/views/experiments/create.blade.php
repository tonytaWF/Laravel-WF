@extends('master')

@section('content')

    @if (Auth::check())
        <div class="row">
            <div class="col-md-6">
                <a href="{{ URL::previous() }}">Go Back</a>

                <h1>Create Experiment</h1>

                @include('layouts.partials.errors')

                {!! Form::open(['route' => 'experiments_path']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Experiment Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Experiment', ['class' => 'btn btn-success form-control']) !!}
                </div>
                {!! Form::hidden('project_id', $project_id) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endif

@stop