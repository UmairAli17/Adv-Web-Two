@extends('layouts.app')

@section('content')
	<h1> Shop Dashboard</h1>
	<div class="col-xs-12 col-md-4">
		<a href="{{route('shop.profile', ['id' => $shop->business->id])}}">
			<span class="glyphicon glyphicon-briefcase icon-large"></span>
			See Shop Profile
		</a>
	</div>
	<div class="col-xs-12 col-md-4">
		<a href="{{route('shop.edit', ['id' => $shop->business->id])}}">
			<span class="glyphicon glyphicon-briefcase icon-large"></span>
			Edit Shop Profile
		</a>
	</div>
	<div class="col-xs-12 col-md-4">
		<a href="{{route('products.manage')}}">
			<span class="glyphicon glyphicon-gift icon-large"></span>.
			Manage Products
		</a>
	</div>

	<div class="col-xs-12 col-md-4">
		<a href="{{route('shop.orders')}}">
			<span class="glyphicon glyphicon-list icon-large"></span>
			View Shop Orders
		</a>
	</div>
@endsection