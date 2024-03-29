@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
        <h3>My Orders</h3>
        @if(!Session::has('user'))
            <div>
                <p>not availabe</p>
                <p>Go Login first</p>
            </div>
        @else
         @foreach ($orders as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="details/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                    </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="details/{{$item->id}}">

                        <div class="">
                            <h2>Name : {{$item->name}}</h2>
                            <h5>Delivery Status : {{$item->status}}</h5>
                            <h5>Address : {{$item->address}}</h5>
                            <h5>Payment Status : {{$item->payment_status}}</h5>
                            <h5>Payment Method : {{$item->payment_method}}</h5>
                    </div>
                    </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
</div>
@endsection
