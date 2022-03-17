@extends('mbele.app')
@section('title')Contact | Us @endsection
@section('content')
<section class="inner-banner pattern-3">
        <div class="container text-center">
            <h2>Contact us</h2>
            <p>We Are Fitness Equipment Repair & Maintenance Specialists.</p>
        </div>
    </section>
    <section class="bread-cumb">
        <div class="container text-center">
            <ul>
                <li><a href="{{Config::get('app.url')}}">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><span>Contact</span></li>
            </ul>
        </div>
    </section>
    <section class="contact-section contact-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-title">
                        <h1><span>Contact Info</span></h1>
                    </div>
                    <div class="contact-info-box">
                        <h2>Want to Help Or Have Questions ?</h2>
                        <ul>
                            <li>
                                <div class="icon-box">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <!-- /.icon-box -->
                                <div class="text-box">
                                    <p>Nairobi
                                        <br />Kenya</p>
                                </div>
                                <!-- /.text-box -->
                            </li>
                            <li>
                                <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <!-- /.icon-box -->
                                <div class="text-box">
                                    <p>Call Us : +254 772 920 155</p>
                                </div>
                                <!-- /.text-box -->
                            </li>
                            <li>
                                <div class="icon-box">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <!-- /.icon-box -->
                                <div class="text-box">
                                    <p>topwearnician001@gmail.com</p>
                                </div>
                                <!-- /.text-box -->
                            </li>
                            <li>
                                <div class="icon-box">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <!-- /.icon-box -->
                                <div class="text-box">
                                    <p class="text-justify">Week Days&nbsp;&nbsp;&nbsp;&nbsp;: 7am to 6pm
                                        <br />Saturday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 7am to 5pm
                                       </p>
                                </div>
                                <!-- /.text-box -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.contact-info-box -->
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-8">
                    <div class="section-title">
                        <h1><span>Get In Touch With Us</span></h1>
                    </div>
                    <form id="feedbackForm" method="POST"  class="home-contact-form contact-form">
                    <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                    <div id="feedback_errors" class="alert alert-danger print-error-msg w3-padding-right w3-padding-left" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
                        <ul class="w3-ul" style="list-style:none;">
                        
                        </ul>
                        </div>
                    </div>
                   </div>
                    <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Your Name *">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="email" placeholder="Your Email *">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone_no" placeholder="Your Phone">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="location" placeholder="Your Location">
                            </div>
                            <div class="col-md-12">
                                <textarea name="requirement" placeholder="Your Requirements *"></textarea>
                                <button type="submit" id="buttonFeedback" class="arrow-push-out-right"><span>Send Message <i class="fa fa-caret-right"></i></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="home-google-map">
        <div class="google-map" id="contact-google-map" data-map-lat="40.712784" data-map-lng="-74.005941" data-icon-path="img/resources/map-marker.png" data-map-title="Brooklyn, New York, United Kingdom" data-map-zoom="11"></div>
    </section> -->
    <div class="footer-texture"></div>
    <!-- /.footer-texture -->
    <!--Start footer area-->
@endsection