        <!-- products -->
        <div  class="products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2 style="max-width: 50%">Our categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="our_products">
                            <div class="row">
                                @forelse($cate as $ca)
                                    <div class="col-md-4 margin_bottom1">
                                        <div class="product_box">
                                            <figure><img title="{{$ca->cate_name}}" src="https://oopsstudiovn.com/wp-content/uploads/2021/09/002-tsushima.png" alt="#" width="90%"></figure>
                                            <h3 title="{{$ca->cate_name}}" style="padding: 15px;">
                                                <a title="{{$ca->cate_name}}" style="color:yellowgreen">{{$ca->cate_name}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <a class="read_more" style="width: 100%">No category yet!</a>
                                    </div>
                                @endforelse
                                
                                <div class="col-md-12">
                                    <a class="read_more" href="/categories">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <div class="row">
                                @forelse($prod as $ca)
                                    <div class="col-md-4 margin_bottom1">
                                        <div class="product_box">
                                            <figure><img title="{{$ca->product_name}}" src="image_upload/{{$ca->image}}" alt="#" width=""></figure>
                                            <h3 title="{{$ca->product_name}}" style="padding: 15px;">
                                                <a title="{{$ca->product_name}}" href="{{route('product_detail',$ca->id)}}" style="color:yellowgreen">{{$ca->product_name}}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <a class="read_more">No product yet!</a>
                                    </div>
                                @endforelse
                                
                                <div class="col-md-12">
                                    <a class="read_more" href="/products">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>