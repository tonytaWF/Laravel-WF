@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h1>Manage Projects</h1>
            <br/>
            {!! link_to('projects/create', 'New Project', ['class' => 'btn btn-primary']) !!}
            <br/><br/>
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($projects as $project)
                    <tr>
                        <td><a href="/projects/{{ $project->id }}/experiments">{{ $project->name }}</a></td>
                        <td>
                            @if ($project->active == 1)
                                <span class="active">Active</span>
                            @else
                                <span class="archived">Archived</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br/>

        </div>
    </div>


@stop