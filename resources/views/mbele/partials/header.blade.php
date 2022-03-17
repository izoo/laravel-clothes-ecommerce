<header class="header header-v5 stricky">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 pull-right">
                        <div class="top-info">
                            <div class="clearfix">
                                <ul class="contact-info pull-left">
                                    <li><span><i class="fc-icon ftc-icon-email"></i> topwear@gmail.com</span></li>
                                    <li><span><i class="fc-icon ftc-icon-phone-contact"></i> Let's Talk : +254 722,000,000</span></li>
                                </ul>
                                <ul class="social pull-right">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <div class="container">
            <nav class="navigation clearfix">
                <div id="menuzord" class="menuzord">
                    <a href="http://127.0.0.1:8000" class="menuzord-brand">
                    
                    <img src="{{asset('frontend/img/slides/IMG_20220126_111121.jpg')}}" alt="TOPWEAR  CLOTH LINE" id="skin-logo-img" />

                        
                    </a>
                    <ul class="menuzord-menu">
                        <li>
                            <a href="http://127.0.0.1:8000" class="flip-flop-btn"><span data-hover="HOME">HOME</span></a>
                          
                        </li>

  

                        @auth
                       
                        <li>
                            <a href="#" class="flip-flop-btn"><span data-hover="WALLET"> WALLET</a>
                            <div class="megamenu shopping-cart-box">
                                    <ul class="header-cart-box" id="wallet">

                                    <li class="clearfix cart-bottom">
                                            <div class="total-text pull-left"> 
                                                <span>Current Amount - Kshs  <b id="current_amount"></b> </span> 
                                            </div> 
                                            <div class="total-text pull-left"> 
                                                <label for="">Amount</label>
                                                <input type="number" class="form-control" name="top_up_amount" id="top_up_amount">
                                            </div> 
                                               <div class="clearfix" style="padding-bottom:3%;">

                                               </div>
                                            <div class="total-text pull-left"> 
                                                <label for="">Phone Number</label>
                                                <input type="number" class="form-control" name="phone_number" id="phone_number">
                                            </div> 
                                            <div class="clearfix" style="padding-bottom:3%;">
                                            <div class="clearfix" style="padding-bottom:3%;">

                                            <div class="checkout-btn pull-right"> 
                                                <a href="#" class="flip-flop-btn" id="top-up-mpesa"><span data-hover="TOP UP VIA MPESA">TOP UP VIA MPESA<i class="fa fa-caret-right"></i></span></a> 
                                            </div> 
                                        </li>
                                    </ul>

                                    
                                </div>
                        </li>
                        <li>
                            <a href="#user-purchases" class="flip-flop-btn"><span data-hover="PURCHASE HISTORY">PURCHASE HISTORY</span></a>
                          
                        </li>
                        <li>
                            <a href="#user-payments" class="flip-flop-btn"><span data-hover="PAYMENTS">PAYMENTS</span></a>
                          
                        </li>
                        <li>
                            <a href="#" id="user-logout" class="flip-flop-btn"><span data-hover="LOGOUT">LOGOUT</span></a>
                          
                        </li>
                       
                        @else
                        <li>
                            <a href="{{ url('authentication') }}" class="flip-flop-btn"><span data-hover="LOGIN/REGISTER">LOGIN / REGISTER</span></a>
                         
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard')  }}" class="flip-flop-btn"><span data-hover="ADMIN LOGIN">ADMIN LOGIN</span></a>
                          
                        </li>
                     
                        @endauth
                      
                        <li class="shopping-cart">
                                <a href="#"><i class="fc-icon ftc-icon-shopping-bag2"> <span class="cart-item">0</span></i> <span class="text">Cart (3)</span></a>
                                <div class="megamenu shopping-cart-box">
                                    <ul class="header-cart-box" id="cart_details">
                                     
                                    </ul>
                                </div>
                            </li>
                       
                    </ul>
                </div>
            </nav>
        </div>
        <div class="search-box collapse" id="search-box">
            <div class="container">
                <form action="#">
                    <input type="text" placeholder="To Search Start Typing...">
                </form>
            </div>
        </div>
    </header>
    @push('header-scripts')
    <script>
        $(document).ready(function(){
         
        //Logout
        $(document).on('click','#user-logout',function(e)
            {
                 e.preventDefault();
                //alert("You Are Good To Go");
                let user_logged = $('#user_logged').val();
                $.ajax({
                    url:"{{route('user.logout')}}",
                    method:"POST",
                    data:{user_logged:user_logged},
                    success:function(data)
                    {
                        alert("You Have Been Logged Out");
                        if(data.status=="success")
                        {
                            window.location.href = "{{route('home')}}";
                        }
                    }

                })
            })
          
        })
    </script>
    @endpush