@extends('layouts.layout')
@section('product_bg')
<div class="__OTP_bg">
    <!-- banner content -->
    <div class="container container-sm __bg_txt">
        <div class="row">
            <div class="col-md-12">
                <h4 class="__heading_h4 paddingtb_50 text-center lg">Sitemap</h4>
            </div>
        </div>
    </div>
</div>
<!-- Top bg End -->
@stop

@section('content')
<div class="container container-sm">
    <div class="row">
        <div class="col-md-12 col-xs-12 __sitemap_wrapper">
                <div>
                    <div class="tab-content current">
                       <div class="accordion_container">
                              <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a target="_blank" href="{{ url('/') }}">Home</a></div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a  target="_blank" href="{{ url('about') }}">About Us</a></div>
                            <div class="accordion_head">
                                <span class="plusminus">+</span>
                                Our Products</div>
                                <div class="accordion_body" style="display: none;">
                                <div class="accordion_head1">
                                            <span class="plusminus1">+</span>
                                            eVisa Products</div>
                                        
                                        <div class="accordion_body1" style="display: none;">
                                        <ul>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/india">eVisa India</a></li>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/srilanka">eVisa Srilanka</a></li>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/hongkong">eVisa HongKong</a></li>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/turkey">eVisa Turkey</a></li>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/combodia">eVisa Cambodia</a></li>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/malaysia">eVisa Malaysia</a></li>
                                <li> <a target="_blank" href="https://www.redcarpetassist.com/evisa/vietnam">eVisa Vietnam</a></li>
                            </ul>
                                        </div>
                                </div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a  target="_blank" href="{{ url('testimonial') }}">Testimonials</a></div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a  target="_blank" href="{{ url('faq') }}">FAQs</a></div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a target="_blank" href="http://blog.redcarpetassist.com/">Blog</a></div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a  target="_blank" href="{{ url('terms-and-conditions') }}" target="_blank">Terms and Conditions</a></div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a  target="_blank" href="{{ url('privacy-policy') }}" target="_blank">Privacy Policy</a></div>
                            <div class="accordion_head">
                                <!-- <span class="plusminus">+</span> -->
                                <a  target="_blank" href="{{ url('contact') }}" target="_blank">Contact Us</a></div>
                            
                       </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@stop