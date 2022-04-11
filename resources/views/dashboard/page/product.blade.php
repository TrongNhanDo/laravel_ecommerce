@extends('dashboard.layout.master')

@section('title','Products')

@section('container')
    @php $i=0; @endphp
    @forelse($product as $pro)
    @php $i++; @endphp
    <div class="cart">
        <div class="cart-img">
            <img src="{{$pro->image}}" alt="">
        </div>
        <div class="cart-content">
            <h3 class="cart-name">{{$pro->product_name}}</h3>
            <h4 class="cart-des">{{$pro->description}}</h4>
            <h3 class="cart-price">{{$pro->price}}</h3>
            <p class="cart-add">
                <a href="">Add to cart</a>
            </p>
        </div>
    </div>
    @empty
    <h1 style="width: 100%;padding: 30px;">NO PRODUCT YET!</h1>
    @endforelse
    
@endsection