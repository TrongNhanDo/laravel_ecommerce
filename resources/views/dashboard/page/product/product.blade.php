@extends('dashboard.layout.master')

@section('title','Products')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 30px;">
                <div class="titlepage">
                    <h2 style="max-width: 50%">Our Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="our_products">
                    <div class="toppro">
                        <div class="pro-left">
                            <select name="" id="">
                                @foreach($cate as $ca)
                                <option onchange="" value="{{$ca->id}}">{{$ca->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pro-right">
                            <form action="{{route('product_list')}}" method="get">
                                <button type="submit">Search</button>
                                <input type="text" name="txtsearch" id="txtsearch" placeholder="Enter name..." /> 
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @forelse($product as $ca)
                        <div class="col-md-3 margin_bottom1">
                            <div class="product_box">
                                <figure><img title="{{$ca->product_name}}" src="image_upload/{{$ca->image}}" alt="#" width=""></figure>
                                <h3 style="padding: 10px;">
                                    <a title="{{$ca->product_name}}" href="{{route('product_detail',$ca->id)}}" style="color:yellowgreen">{{$ca->product_name}}</a>
                                </h3>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <h1 style="text-align: center;">No product yet!</h1>
                            <a class="read_more" href="{{route('product_list')}}">No product yet!</a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection