@extends('dashboard.layout.master')
@section('title','Payment')
@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <h1>SHOPPING CART</h1> <hr>
        <div class="row">
            <div class="col-md-12">
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
        </div>
        <div class="row" style="margin-top: 40px">
            <div class="col-md-6" style="text-align: center;">
            <h3>CHỌN PHƯƠNG THỨC THANH TOÁN:</h3>
            </div>
            <div class="col-md-6">
                <form action="{{route('payment')}}" method="post" class="fm_pthuc">
                    @csrf
					<input type="radio" id="payment_off" name="pthuc" value="payment_off" checked>
					<label for="payment_off">Thanh toán khi nhận hàng</label><br>
					<input type="radio" id="payment_vnpay" name="pthuc" value="payment_vnpay">
					<label for="payment_vnpay">Thanh toán bằng VNPAY</label><br>
					<input type="radio" id="payment_momo" name="pthuc" value="payment_momo">
					<label for="payment_momo">Thanh toán bằng MOMO</label>
					<input type="radio" id="payment_paypal" name="pthuc" value="payment_paypal">
					<label for="payment_paypal">Thanh toán bằng PAYPAL</label>

					<button type="submit" class="btn btn-success" style="margin-left: 90px; margin-top: 30px">Thanh toán</button>
				</form>
            </div>            
        </div>
    </div>
</div>
@endsection