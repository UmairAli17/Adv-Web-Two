@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>All Shops</h1>
        @forelse($shops as $shop)
            <div class="col-xs-12 col-md-4">
                <img class="img img-thumbnail" src="{{asset('uploads/logo/' . $shop->image)}}">
                <h3>{{$shop->name}}</h3>
                <p>{{$shop->description}}</p>
                <a href="{{route('shop.profile', ['id' => $shop->id])}}" class="btn btn-default">View Shop</a>
            </div>
        @empty
            <div class="panel-body">
                <h1>No Shops on This Website as of Yet</h1>
            </div>
        @endforelse
    </div>
</div>
@endsection
