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
				<h4>{{$product->name}}</h4>
				<p>{{$product->description}}</p>
				<p>£{{$product->price}}
				{{-- EDIT/DELETE ROW --}}
				<div class="row">
					<div class="col-xs-12">
						Edit
						Delete
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