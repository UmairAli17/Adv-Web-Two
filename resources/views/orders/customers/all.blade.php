@extends('layouts.app')

@section('content')
	<h1>Your Orders</h1>
	<div class="col-md-8">
		
		@forelse($orders->product_orders as $order)

			<div class="col-md-10">
				<h3>Order #{{$order->id}}</h3>
				<p>{{$order->products->name}}</p>
				<p>{{$order->products->description}}</p>
			</div>
			<div class="col-md-2">
				<a href="{{route('products.view', ['id' => $order->products->id])}}" class="btn btn-success">View Product</a>
				<a href="{{route('orders.delete', ['id' => $order->id])}}" class="btn btn-danger">Remove Order</a>
			</div>
		@empty
			<h1>Hey hey, it doesn't look as if you've got any orders!</h1>
		@endforelse
	</div>
@endsection