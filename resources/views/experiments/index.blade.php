@extends('master')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::previous() }}">Go Back</a>
            <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
            <h1><div id="editable-project-name" data-pk="{{ $project->id }}">{{ $project->name }}</div></h1>

            <br/>
            <a class="btn btn-success" href="/projects/{{ $project->id }}/experiments/create">New Experiment</a>
            <br/><br/>
            @if ($experiments->count())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phase</th>
                            <th>Expected Launch</th>
                            <th>Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($experiments as $index => $experiment)
                        <tr>
                            <td><a href="/projects/{{ $project->id }}/experiments/{{ $experiment->id }}">{{ $experiment->name }}</a></td>
                            <td></td>
                            <td>{{ $experiment->expected_launch }}</td>
                            <td>{{ $experiment->updated_at->diffForHumans() }}</td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>

@stop