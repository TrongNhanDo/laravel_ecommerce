@extends('dashboard.layout.master')
@section('title','Cart')
@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <h1>SHOPPING CART</h1> <hr>
        @if(session()->has('sum_product') && session()->get('sum_product') > 0)
        <p>
            <form style="float: right;" action="{{route('cart_delete_all')}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn-delete" type="submit" onclick="return confirm('Are you sure want to delete all?')">Delete All</button>
            </form>
        </p>
        @endif
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
                <td>
                    <img src="image_upload/{{$ca->image}}" alt="" width="200">
                </td>
                <td>{{number_format($ca->price)}}đ</td>
                <td>
                    <form action="{{route('cart_update',$ca->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{$ca->id}}">
                        <input type="number" name="amount" id="amount" min="1" value="{{$ca->amount}}">
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>{{number_format($ca->price * $ca->amount)}}đ</td>
                <td>
                    <form action="{{route('cart_delete',$ca->product_id)}}" method="post">
                        @csrf
                        <button class="btn-delete" type="submit" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                    </form>
                </td>
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
        @if($cart->count() > 0)
        <div class="last_row">
            <div class="col1"><a href="/products">Continue shopping</a></div>
            <div class="col2"><a href="/payment">Payment</a></div>
        </div>
        @endif
    </div>
</div>
@endsection