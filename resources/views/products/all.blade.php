@extends('layouts.app')

@section('content')
	<h1>Search for Products</h1>
	{!! Form::open(['route' => 'products.all', 'method' => 'GET']) !!}
		{!! Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Search by Product Name or Shop Name', 'id'=>'q', 'required' => 'required']) !!}
	{!! Form::close() !!}

	@forelse($products as $product)
		<div class="col-md-4">
			<img class="img img-responsive imp-thumbnail" src="{{asset('uploads/products/'. $product->image)}}">
			<h5>{{$product->name}}</h5>
			<p>{{$product->description}}</p>
			<p>£{{$product->price}}</p>
			<a href="{{route('products.view', ['id'=>$product->id])}}" class="btn btn-default">View Product</a>
		</div>
	@empty		
		<h1>Well.. doesn't seem like our Shop Owners Have Uploaded any Products :/</h1>
	@endforelse
@endsection