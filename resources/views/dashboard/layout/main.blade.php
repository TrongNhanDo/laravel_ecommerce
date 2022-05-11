        <!-- products -->
        <div  class="products">
            <div class="container">
                <div class="row">
                    <iframe width="100%" height="600px" src="https://www.youtube.com/embed/xsLAZdl0Lu0" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2 style="max-width: 50%; margin-top: 50px;">Our categories</h2>
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
                                            <figure><img title="{{$ca->cate_name}}" src="{{asset('image_upload/belgium.jpg')}}" alt="#" width="90%"></figure>
                                            <h5 title="{{$ca->cate_name}}" style="padding: 15px;">
                                                <a href="products?catid={{$ca->id}}" title="{{$ca->cate_name}}" style="color:yellowgreen">{{$ca->cate_name}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <a class="read_more" style="width: 100%">No category yet!</a>
                                    </div>
                                @endforelse
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
                                            <h5 title="{{$ca->product_name}}" style="padding: 15px;">
                                                <a title="{{$ca->product_name}}" href="{{route('product_detail',$ca->id)}}" style="color:yellowgreen">{{$ca->product_name}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <a class="read_more">No product yet!</a>
                                    </div>
                                @endforelse
                                
                                <div class="col-md-12">
                                    <a class="read_more" href="/products">Show More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>