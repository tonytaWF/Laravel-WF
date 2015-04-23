@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ URL::previous() }}">Go Back</a>
            <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
            <h1><div id="editable-experiment-name" data-pk="{{ $experiment->id }}">{{ $experiment->name }}</div></h1>

            <br/>


            <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                        {!! Form::label('expected_launch_at', 'Expected Launch:') !!}
                        <div class="input-group date" id="datetimepicker">
                            {!! Form::text('expected_launch_at', null, ['class' => 'form-control']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <br/>

            @if ($phases->count())
                <div class="panel-group" id="accordion">
                @foreach ($phases as $index => $phase)
                    @if ($phase->name == 'Development')
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $index}}">
                                        {{ $phase->name }}
                                    </a>
                                </h4>

                            </div>
                            <div id="collapse{{ $index }}" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{ $phase->id }}: Optimizely form
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $index}}">
                                        {{ $phase->name }}
                                    </a>
                                </h4>

                            </div>
                            <div id="collapse{{ $index }}" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="issue-drop-zone">
                                                @if ($phase->files()->count())
                                                    <ul>
                                                    @foreach ($phase->files()->get() as $index => $file)
                                                        <li>{{ $file->filename }}</li>
                                                    @endforeach
                                                    </ul>
                                                @endif

                                                {!! Form::open(array('url' => 'phase/uploads', 'files' => true, 'role'=>'form', 'class' => 'dropzone', 'id' => 'strategy-upload-dropzone')) !!}
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <input type="hidden" name="phase_id" value="{{ $phase->id }}" />
                                                    <div class="dz-message">
                                                        <h4>Drop files here to upload, or </h4>
                                                        <span>browse</span>
                                                    </div>
                                                    <div class="dropzone-previews"></div>
                                                {!! Form::close() !!}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif

                @endforeach
                </div>
            @endif

        </div>
    </div>

    <script>

        Dropzone.options.strategyUploadDropzone = { // The camelized version of the ID of the form element


            //prevents Dropzone from uploading dropped files immediately
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 25,
            maxFiles: 25,
            previewsContainer: ".dropzone-previews",

            // The setting up of the dropzone
            init: function() {
                var myDropzone = this;

                // Here's the change from enyo's tutorial...

                $("#submit-all").click(function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            myDropzone.processQueue();
                        }
                );

            }

        }
    </script>

@stop