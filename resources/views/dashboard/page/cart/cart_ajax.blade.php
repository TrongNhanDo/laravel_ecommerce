@extends('dashboard.layout.master')
@section('title','Cart')
@section('container')
    <!-- products -->
<div  class="products">
    <div class="container">
        <h1>SHOPPING CART</h1> <hr>
        <p id="p_delete_all" style="display: none">
            <button class="btn-delete" type="submit" id="delete_all">Delete All</button>
        </p>
        <table class="fm_cart">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Total</th>
                <th>Action</th>
            </thead>
            <tbody>
            </tbody>            
        </table>
        <div style="text-align: center; display: none;" id="div_see_product">
            <h1>Empty shopping cart</h1> <br>
            <h3><a class="btn btn-success" href="{{route('product_list')}}"><u>See Products</u></a></h3>
        </div>
        <div class="last_row" id="div_bottom" style="display: none;">
            <div class="col1"><a href="/products">Continue shopping</a></div>
            <div class="col2"><a href="/payment">Payment</a></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // cập nhật dữ liệu
        load_data();
        function load_data(){
            $.ajax({
                type: 'get',
                url: '/cart_data',
                data :{},
                dataType: 'json',
                success: function(data){
                    $("tbody").html("");
                    $("tbody").append(data.out);
                    if(data.sum == 0){
                        $("#p_delete_all").hide();
                        $("#div_see_product").show();
                        $("#div_bottom").hide();
                    }else{
                        $("#p_delete_all").show();
                        $("#div_see_product").hide();
                        $("#div_bottom").show();
                    }
                }
            })
        }
        // xóa tất cả sản phẩm
        $(document).on('click','#delete_all',function(e){
            e.preventDefault();
            var _token   = $('meta[name="csrf-token"]').attr('content');
            if(confirm('Are you sure want to delete all?')){
                $.ajax({
                    type: "DELETE",
                    url : "/cart",
                    data: {
                        _token : _token
                    },
                    dataType: 'json',
                    success: function(data){
                        load_data();
                    }
                });
            }
        });
        //xóa một sản phẩm 
        $(document).on('click','#btn_delete',function(e){
            e.preventDefault();
            var _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).val();
            if(confirm('Are you sure want to delete?')){
                $.ajax({
                    type: "DELETE",
                    url : "/cart/"+id,
                    data: {
                        _token : _token
                    },
                    dataType: 'json',
                    success: function(data){
                        load_data();
                    }
                });
            }
        });
        //cập nhật giỏ hàng
        $(document).on('click','.btn_update',function(e){
            e.preventDefault();
            var _token   = $('meta[name="csrf-token"]').attr('content');
            var amount = $("#amount").val();
            var id = $(this).val();
            $.ajax({
                type: "PUT",
                url : "/cart/"+id,
                data: {
                    amount: amount,
                    _token : _token
                },
                dataType: 'json',
                success: function(data){
                    load_data();
                }
            });
        });
    });
</script>
@endsection