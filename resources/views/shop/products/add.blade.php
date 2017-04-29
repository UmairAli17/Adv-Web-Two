@extends('layouts.app')

@section('content')
	<div class="col-xs-12 col-md-6">
		<h1> Add Product to Your Shop</h1>
	</div>
	<div class="col-xs-12 col-md-6">
		@include('errors.errors')
		{!! Form::open(['method' => 'POST', 'route' => 'products.create', 'files'=>'true', 'class' => 'form-horizontal']) !!}
		
		    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		        {!! Form::label('name', 'Product Name') !!}
		        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('name') }}</small>
		    </div>

		    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
		        {!! Form::label('description', 'Input label') !!}
		        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('description') }}</small>
		    </div>

		    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
		        {!! Form::label('price', 'Enter Your Price') !!}
		        {!! Form::text('price', null, ['class' => 'form-control price-input', 'required' => 'required']) !!}
		        <small class="text-danger">{{ $errors->first('price') }}</small>
		    </div>


		    {!! Form::file('image', ['class' => 'form-control']) !!}
		
		    <div class="btn-group pull-right">
		        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
		        {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
		    </div>

		{!! Form::close() !!}

	</div>

@endsection