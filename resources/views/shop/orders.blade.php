@extends('layouts.app')

@section('content')
	<h1>Business Orders</h1>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<th>Order #</th>
				<th>Product Name</th>
				<th>Purchase Date</th>
			</thead>

			<tbody>
			@forelse($shopOrders->business->orders as $orders)
				<tr>
				<td>{{$orders->id}}</td>
				<td>{{$orders->products->name}}</td>
				<td>{{$orders->products->created_at}}</td>
			</td>
		</tr>
			@empty
			<h1>No Orders</h1>
			@endforelse
			</tbody>
		</table>

		<br>
			<a href="{{route('shop.ordersDownload')}}" class="btn btn-danger pull-right">Download as PDF {{$shopOrders->business->name}} Orders</a>
		<br><br>
			<a href="{{route('shop.orders.excel')}}" class="btn btn-success pull-right"> Download as Excel {{$shopOrders->business->name}} Orders</a>
	</div>

@endsection