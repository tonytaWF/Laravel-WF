<div class="col-md-4">
	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['url' => 'leads']) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Add Email', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	
</div>

