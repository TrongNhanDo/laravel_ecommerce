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
                            <select name="cate_key" id="cate_key" onchange="cateChanged()">
                                <option value="">Tìm kiếm theo loại sản phẩm</option>
                                @foreach($cate as $ca)
                                <option <?php if(isset($_GET['catid']) && $_GET['catid']== $ca->id){echo "selected";} ?> value="{{$ca->id}}">{{$ca->cate_name}}</option>
                                @endforeach
                            </select>
                            <script>
                                function cateChanged(){
                                    let giatri = document.getElementById('cate_key').value
                                    if(giatri == ''){
                                        location.href = '/products'
                                    }else{
                                        location.href = '?catid='+giatri
                                    }
                                    
                                }
						</script>
                        </div>
                        <div class="pro-right">
                            <form action="{{route('product_list')}}" method="get">
                                <button type="submit">Search</button>
                                <input type="text" name="txtsearch" id="txtsearch" placeholder="Enter name..." /> 
                            </form>
                        </div>
                        <script>
                            $(document).ready(function(){
								$(document).on('keyup','#txtsearch',function(){
									var txtsearch = $(this).val();
									$.ajax({
										type: "get",
										url : "/search",
										data: {
											txtsearch : txtsearch
										},
										dataType: 'json',
										success: function(response){
											$('#listproduct').html(response);
										}
									})
								});
							});
                        </script>
                    </div>
                    <div class="row" id="listproduct">
                        @forelse($product as $ca)
                        <div class="col-md-3 margin_bottom1 prod">
                            <div class="product_box">
                                <figure><img title="{{$ca->product_name}}" src="image_upload/{{$ca->image}}" alt="#" width=""></figure>
                                <h4 style="padding: 10px;">{{$ca->product_name}}</h4>
                                <h5>{{$ca->description}}</h5>
                                <h4>{{number_format($ca->price)}}đ</h4>
                                <a title="" href="{{route('product_detail',$ca->id)}}">Detail</a>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <h1 style="text-align: center;">No product yet!</h1>
                            <a class="read_more" href="{{route('product_list')}}">See other products!</a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 40px">
            <div class="col-md-12">
                {{$product->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    svg{
        width: 40px;
    }
</style>
