@extends('layouts.app')

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<h1>{{$product->name}}</h1>
		<a href="{{route('shop.profile', ['id' => $product->business->id])}}"><p>Seller: {{$product->business->name}}</p></a>
		<img class="img img-responsive imp-thumbnail" src="{{asset('uploads/products/'. $product->image)}}">
		<p>{{$product->description}}</p>
		<p>£{{$product->price}}</p>
		<a href="{{route('orders.add', ['id' => $product->id])}}" class="btn btn-success">Order Product</a>
		@can('shopkeeper', $product)
			<a href="{{route('products.edit', ['id' => $product->id])}}" class="btn btn-default">Edit Product</a>
		@endcan 
	</div>
@endsection
