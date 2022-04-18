@extends('dashboard.layout.master')

@section('title','Product Detail')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <h1>PRODUCT DETAIl</h1>
        <div class="row pro_detail">
            @foreach($product as $pro)
            <div class="col-md-5">
                <img src="/image_upload/{{$pro->image}}" alt="">
            </div>
            <div class="col-md-7">
                <form action="" method="post">
                    <h1>Name: <b>{{$pro->product_name}}</b></h1>
                    <h2>Desscription: {{$pro->description}}</h2>
                    <h3>Category: {{$pro->cate_name}}</h3>
                    <h1>Price: <b>{{number_format($pro->price)}} VNĐ</b></h1>
                    <input type="number" name="" id="" value="1" min="1" max="{{$pro->amount}}"> <br> <br>
                    <button type="submit">Add to cart</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection