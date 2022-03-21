@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
        <h3>Results of Products</h3>
        @if(!Session::has('user'))
            <div>
                <p>not availabe</p>
                <p>Go Login first</p>
            </div>


        @else
        <a href="ordernow" class="btn btn-success" >Order Now</a> <br><br>
         @foreach ($products as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="details/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                    </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="details/{{$item->id}}">

                        <div class="">
                            <h2>{{$item->name}}</h2>
                            <h5>{{$item->description}}</h5>
                    </div>
                    </a>
                    </div>
                    <div class="col-sm-3">
                          <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">REMOVE FROM CART</a>
                    </div>
                </div>
            @endforeach}
            @endif
    </div>
    </div>
</div>
@endsection
