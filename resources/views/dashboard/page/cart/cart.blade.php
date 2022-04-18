@extends('dashboard.layout.master')

@section('title','Cart')

@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <h1>SHOPPING CART</h1>
        <table class="fm_cart">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            @php $i=0; @endphp
            @forelse($cart as $ca)
            @php $i++; @endphp
            <tr>
                <td>{{$i}}</td>
                <td>{{$ca->product_name}}</td>
                <td>{{$ca->image}}</td>
                <td>{{$ca->price}}</td>
                <td>{{$ca->amount}}</td>
                <td>total</td>
                <td>delete</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="bottom-row">
                    <h1>Empty shopping cart</h1> <br>
                    <h3><a class="btn_prod" href="{{route('product_list')}}"><u>See Products</u></a></h3>
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection