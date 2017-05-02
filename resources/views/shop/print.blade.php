	<h1>{{$shopOrders->business->name}} Orders</h1>
	<div>
		<table style="border: solid 1px; ">
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
				</tr>
			@empty
			<h1>No Orders</h1>
			@endforelse
			</tbody>
		</table>
	</div>

