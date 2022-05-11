      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="/"><img src="{{asset('temp/images/logo.jpg')}}" alt="#" width="100" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" id="_home" href="/"><b>Home</b></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="_product" href="/products">Products</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="_about" href="/about">About</a>
                              </li>                              
                              <li class="nav-item">
                                 <a class="nav-link" id="_contact" href="/#contact">Contact</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="_cart" href="/cart">
                                 </a>
                                 <script>
                                    $(document).ready(function(){
                                       load_amount();
                                       function load_amount(){
                                          $.ajax({
                                             type: 'get',
                                             url: '/cart_data',
                                             data: {},
                                             dataType: 'json',
                                             success: function(data){
                                                $("#_cart").html("Cart ( "+data.sum+" )");
                                             }
                                          })
                                       }
                                    });
                                 </script>
                              </li>
                              @if(session()->has('login') && session()->get('login')===true)
                              <li class="nav-item d_none">
                                 <a id="_user" class="nav-link user_name" href="/profile/{{session()->get('userid')}}">{{session()->get('username')}}</a>
                              </li>
                              <li class="nav-item d_none">
                                 <a class="nav-link" href="/logout" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
                              </li>
                              @else
                              <li class="nav-item d_none">
                                 <a class="nav-link" id="_login" href="/login">Login</a>
                              </li>
                              <li class="nav-item d_none">
                                 <a class="nav-link" id="_register" href="/register">Register</a>
                              </li>
                              @endif
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
	  <!-- banner -->

     @include('dashboard.layout.banner')
	        