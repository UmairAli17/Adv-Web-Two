@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-md-6">
		<h1>Update Shop Profile</h1>
	</div>
	<div class="col-xs-12 col-md-6">
		{!! Form::model($shops, ['method' => 'patch', 'files' => true, 'route' => ['shop.update', $shops->id,]]) !!}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			    {!! Form::label('name', 'Update Name') !!}
			    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('name') }}</small>
			</div>

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
			    {!! Form::label('description', 'Enter Description') !!}
			    {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
			    <small class="text-danger">{{ $errors->first('description') }}</small>
			</div>

			{!! Form::file('image', ['class' => 'form-control']) !!}

			{!! Form::submit('Update Shop Profile', ['class' => 'btn btn-info pull-right']) !!}

		{!! Form::close() !!}
	</div>
@endsection