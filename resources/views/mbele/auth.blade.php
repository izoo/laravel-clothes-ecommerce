@extends('mbele.app')
@section('title')LOGIN| REGISTER | TOPWEAR @endsection
@section('content')
<section class="section-padding login-register">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="section-title">
                        <h1>Login Here</h1>
                    </div>
                    <!-- /.section-title -->
                    <form action="{{ route('user.login.post') }}" method="POST" id="loginForm">
                        <!-- /.form-grp -->
                        @csrf 
                        <div class="form-grp">
                            <input type="email" name="email" placeholder="Enter Email*" />
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <!-- /.form-grp -->
                        <div class="form-grp">
                            <input type="password" name="password" placeholder="Enter Password" />
                            <i class="fa fa-lock"></i>
                        </div>
                        <!-- /.form-grp -->
                        <div class="clearfix submit-box">
                            <div class="pull-left">
                                <button class="thm-btn" type="submit">Login</button>
                            </div>
                          
                        </div>
                        <!-- /.clearfix -->
                        <div class="clearfix remember-box">
                            
                        </div>
                        <!-- /.clearfix -->
                    </form>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6 col-xs-12">
                    <div class="section-title">
                        <h1>Register Now</h1>
                    </div>
                    <!-- /.section-title -->
                    <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                    <div id="user_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        <ul class="w3-ul" style="list-style:none;">
                        
                        </ul>
                        </div>
                    </div>
                   </div>
                    <form method="POST" id="registerForm">
                        <div class="form-grp">
                            <input type="text" name="first_name" id="first_name" placeholder="Your First Name*" />
                            <i class="fa fa-user"></i>
                        </div>
                        <!-- /.form-grp -->
                        <div class="form-grp">
                            <input type="text" name="last_name" id="last_name" placeholder="Your Last Name*" />
                            <i class="fa fa-user"></i>
                        </div>
                        <!-- /.form-grp -->
                        <div class="form-grp">
                            <input type="email" name="email" id="email" placeholder="Enter Email*" />
                            <i class="fa fa-envelope-o"></i>
                        </div>

                        <!-- form-grp -->
                        <div class="form-grp clearfix">
                        <label for="gender" class="pull-left">Female</label>
                            <input type="radio" name="gender" class="form-control pull-right" id="gender[]" value="FEMALE">
                        </div>
                        <!-- form-grp -->
                        <div class="form-grp clearfix">
                        <label for="gender" class="pull-left">Male</label>
                            <input type="radio" name="gender" class="form-control pull-right" id="gender[]" value="MALE">
                        </div>
                        <!-- /.form-grp -->
                        <div class="form-grp">
                            <input type="password" name="password" placeholder="Enter Password" />
                            <i class="fa fa-lock"></i>
                        </div>
                        <!-- /.form-grp -->
                        <div class="clearfix submit-box">
                            <div class="pull-left">
                                <button class="thm-btn" id="btnUser" type="submit">Register</button>
                            </div>
                           
                        </div>
                        <!-- /.clearfix -->
                    </form>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.section-padding -->
    @endsection