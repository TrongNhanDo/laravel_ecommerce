@extends('dashboard.layout.master')

@section('title','Product Detail')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <h1>PRODUCT DETAIl</h1>
        <div class="row pro_detail">
            <div class="col-md-5 product_detail">
                <img src="/image_upload/{{$product->image}}" alt="" data-toggle="modal" data-target=".bd-example-modal-lg" >              
            </div>
            <div class="col-md-7">
                <h3>Name: <b>{{$product->product_name}}</b></h3>
                <h4>Description: <b>{{$product->description}}</b></h4>
                <h4>Category: <b>{{$product->cate_name}}</b></h4>
                <h4>Price: <b>{{number_format($product->price)}}đ</b></h4>
                <h5>Product available: <b>{{$product->amount}}</b></h5>
                <form action="{{route('cart_store')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                    <input type="number" name="amount" id="amount" value="1" min="1" max="{{$product->amount}}" style="font-size: 18px;" > <br> <br>
                    <button type="submit">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <img src="/image_upload/{{$product->image}}" alt="" >
    </div>
  </div>
</div>
@endsection