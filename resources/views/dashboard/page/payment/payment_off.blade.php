@extends('dashboard.layout.master')
@section('title','Payment Off')
@section('container')
    <!-- products -->	
<div  class="products">
    <div class="container">
        <h1>SHOPPING CART</h1> <hr>
        <div class="row">
            <div class="col-md-6">
                <table class="tb_pay">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Total</th>
                    </tr>
                    @php $i=0; $s=0; @endphp
                    @foreach($cart as $ca)
                    @php $i++; $s+=$ca->price * $ca->amount @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td style="width: 30%">
                            <img src="image_upload/{{$ca->image}}" alt="">
                        </td>
                        <td>{{number_format($ca->price)}}đ</td>
                        <td>{{$ca->amount}}</td>
                        <td>{{number_format($ca->price * $ca->amount)}}đ</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"><b>Total:</b></td>
                        <td colspan="3"><b>{{number_format($s)}}đ</b></td>
                    </tr>
                </table>
            </div>
			<div class="col-md-6">
				<form action="" method="post" class="paymentoff">
					@if(isset($user))
					<label for="fullname">Fullname:</label>
					<input type="text" name="fullname" id="fullname" value="{{$user->name}}" placeholder="Enter your name" required>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" value="{{$user->email}}" placeholder="Enter your email" required>
					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone" value="{{$user->phone}}" placeholder="Enter your phone" maxlength="10" minlength="10" required>
					<label for="address">Address:</label>
					<textarea name="address" id="address" cols="30" rows="3" placeholder="Enter your address">{{$user->address}}</textarea>
					@else
					<label for="fullname">Fullname:</label>
					<input type="text" name="fullname" id="fullname" placeholder="Enter your name" required>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" placeholder="Enter your email" required>
					<label for="phone">Phone:</label>
					<input type="text" name="phone" id="phone" placeholder="Enter your phone" maxlength="10" minlength="10" required>
					<label for="address">Address:</label>
					<textarea name="address" id="address" cols="30" rows="3" placeholder="Enter your address"></textarea>
					@endif
					<button type="submit" class="btn btn-success">Đặt hàng</button>
				</form>
			</div>
        </div>
        
    </div>
</div>
@endsection