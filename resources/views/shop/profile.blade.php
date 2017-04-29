@extends('layouts.app')

@section('content')
		{{-- BUSINESS/ SHOP DETAILS ROW --}}
		<div class="row">
			{{-- LOGO CONTAINER --}}
			<div class="col-md-4">
				<img class="img responsive-img col-xs-12" src="{{asset('uploads/logo/' . $business->image)}}">
			</div>
			{{-- END LOGO CONTAINER --}}
			{{-- SHOP DETAILS --}}
			<div class="col-md-8">
				<h1>{{$business->name}}</h1>
				<p>{{$business->description}}</p>
			</div>
			{{-- END SHOP DETAILS --}}
		</div>
		{{-- END BUSINESS/ SHOP DETAILS ROW --}}

		<div class="row">
		@forelse($business->products as $product)
			<div class="col-md-4">
				<img class="img responsive-img col-xs-12" src="{{asset('uploads/products/'  . $product->image) }}">
				<h3>{{$product->name}}</h3>
				<p>{{$product->description}}</p>
				<p>Price: {{$product->price}}</p>
				<a href="{{route('orders.add', ['id' => $product->id])}}" class="btn btn-success">Order Product</a>
				<a href="{{route('products.view', ['id' => $product->id])}}" class="btn btn-default">View Product</a>
			</div>
		@empty
			<h1>Well.. it doesn't look as if {{$business->user->name}} has Uploaded any Products!</h1>
		@endforelse
		</div>
@endsection