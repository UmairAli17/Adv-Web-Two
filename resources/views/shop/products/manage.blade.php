@extends('layouts.app')

@section('content')
	<h1>Products Dashboard</h1>
	<div class="row">
		<a href="{{route('products.add')}}">
			<div class="col-md-4 add-item-card">
				<div class="row">
					<span class="glyphicon glyphicon-plus icon-large">
					</span>
				</div>
				<h3>Add More Products?</h3>
			</div>
		</a>
	</div>
	<div class="row">
		@forelse($products->business->products as $product)
			{{-- PRODUCT CARD --}}
			<div class="col-md-4 product-card">
				<img class="img img-thumbnail" src="{{asset('/uploads/products') . '/' . $product->image}}">
				<a href="{{route('products.view', ['id' => $product->id])}}"><h4>{{$product->name}}</h4></a>
				<p>{{$product->description}}</p>
				<p>£{{$product->price}}
				{{-- EDIT/DELETE ROW --}}
				<div class="row">
					<div class="col-xs-12">
						<a href="{{route('products.edit', [$product->id])}}">Edit</a>
						{!! Form::open(['route' => ['products.delete', $product->id], 'method'=> 'PATCH']) !!}
						    <button type="submit" class="btn" href="{{route('products.delete', [$product->id])}}">Delete</button>
						{!! Form::close() !!}
						
					</div>
				</div>
				{{-- END EDIT/DELETE ROW --}}
			</div>
			{{-- END PRODUCT CARD --}}
		@empty
			<h5>It doesn't seem like you've got any products! How about adding some now then?</h5>
		@endforelse
	</div>
@endsection