@extends('layouts.app')

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<img class="img img-responsive imp-thumbnail" src="{{asset('uploads/products'. $product->image)}}">
	</div>
@endsection
