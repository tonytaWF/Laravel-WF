@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Edit Project</h1>

            @include('layouts.partials.errors')

            {!! Form::model($project, ['route' => array('projects.update', $project->id), 'method' => 'PATCH']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Project Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('active', 'Status:') !!}
                {!! Form::select('active', $project_status, $project->active, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-success form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop