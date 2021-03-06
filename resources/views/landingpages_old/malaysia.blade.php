@extends('layouts.layout')

@section('content')
<style type="text/css">
    #country_code-error{position: relative;top: 9px !important;float: left;}
</style>
<div class="clearfix"></div>
    <div class="__bg">
        <div class="container container-sm paddingtb_50">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="__heading">Apply for Malaysia eVisa and eNTRI.</h1>
                    <p class="__heading_para">Exclusive service for Indian Citizens.</p>
                </div>
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                    <form name="LP_LeadForm" method="post" action="/send_leadfrm_ab.php" method="POST" id="LP_LeadForm" novalidate="novalidate" class="LP_LeadForm">
                        <!-- hidden Field CRM -->
                        <input type="hidden" name="destination" value="Malaysia">
                        <input type="hidden" name="lead_source" value="RCA_Website">
                        <!-- end -->
                        <div class="__lead_form">
                            <div class="col-md-12">
                                <p class="__alert_success text-center">Thank you submitting inquiry form we will get back to you soon.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="group marginb_10">
                                    <div class="inputs">
                                        <input type="text" name="first_name" id="first_name" required="">
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group marginb_10">
                                    <div class="inputs">
                                        <input type="text" name="last_name" id="last_name" required="">
                                        <label for="last_name">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="group marginb_10">
                                <div class="inputs padding0">
                                        <input type="text" name="country_code" id="country_code" value="+" required="" maxlength="6">
                                        <input type="text" name="phone_number" id="phone" maxlength="10" required="">
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 marginb_10">
                                <div class="group">
                                    <div class="inputs">
                                        <input type="text" name="email" id="email" required="">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="__select_label" id="e_service">Select Malaysian Visa Type</p>
                            </div>
                            <div class="__radio_row">
                                <div class="col-md-6">
                                    <div class="group-radio">
                                        <input id="s1" name="service_type" type="radio" class="orbit" value="malasia_30_day">
                                        <label for="s1">30 Days Single Entry eVisa</label>
                                    </div>
                                </div>
                                <!--<div class="col-md-6">
                                    <div class="group-radio">
                                        <input id="s2" name="service_type" type="radio" class="orbit" value="malasia_15_day">
                                        <label for="s2">15 Days eVisa</label>
                                    </div>
                                </div>-->
                                <div class="col-md-6">
                                    <div class="group-radio">
                                        <input id="s3" name="service_type" type="radio" class="orbit" value="malasia_15_day_e">
                                        <label for="s3">15 Days eNTRI visa</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="__terms_txt">
                                    <input id="terms_accept" name="terms" type="checkbox" class="__checkbox" value="terms accept" checked>
                                    <label for="terms_accept">I hereby accept the <a href="{{URL::to('/')}}/privacy-policy" target="_blank">Terms and Conditions.</a> </label>
                                </p>
                            </div>
                            <div class="col-md-12 paddingtb_30 text-center">
                                <button type="submit" class="__btn __active">CONNECT TO US NOW</button>
                            </div>
                            <div class="col-md-12 text-center">
                                <!--<p class="__terms_txt">The prices mentioned are exclusive of GST.</p>-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Thanks Body -->
        <div class="__thanks" id="thanks" style="display: none">
            <div class="__thanks_body">
                <div class="_close_thnks"><a href="{{URL::to('/')}}"><img src="svg/close.svg" width="22px" height="22px" /></a></div>
                <img src="svg/thanks_icon.svg" width="90px" class="center-block" alt="" />
                <h3 class="_fancytxt lg" id="thnks3">Thanks</h3>
                <p>All good things come to those who wait 😊
                    <br /> We will contact you shortly</p>
            </div>
        </div>
    </div>
@include('layouts.middle_footer')    
@stop
