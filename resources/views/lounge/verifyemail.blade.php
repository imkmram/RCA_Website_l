@extends('layouts.layout')

@section('content')
   <div class="clearfix"></div>
    <div class="__bg">
        <div class="container container-sm">
            <div class="row">
                <div class="col-md-12">
                    <div class="paddingtb_50">
                        <!--<form method="post" id="frmvisa1" name="frmvisa1" action="{{URL::to('/')}}/Lounge/ccavenue">-->
                            <form method="post" id="frmverify" name="frmvisa1" action="{{URL::to('/')}}/Razorpay/index">
                           
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="order_id" id="order_id" value="{{$ordid}}">
                            <input type="hidden" name="order_code" id="order_code" value="{{$txnid}}">
                            <input type="hidden" name="currency" id="currency" value="{{$currency}}">
                            <input type="hidden" name="amount" id="amount" value="{{$amt}}">
                            <input type="hidden" name="productinfo" id="product_info" value="{{$product_info}}">
                            <input type="hidden" name="uid" id="uid" value="{{$uid}}">
                        <ul class="tabs_z">
                            <li>
                                <a href="{{ URL::to('/') }}">
                                <span class="__title">eVISA</span>
                                <img src="{{ URL::to('/') }}/svg/E-visa.svg" alt="" width="100" />
                            </a>
                            </li>
                            <li class="" id="group_size_max_mna"> <!-- RCAV1-60 -->
                                <a href="{{ URL::to('/') }}">
                                    <span class="__title">AIRPORT MEET &amp; GREET</span>
                                    <img src="{{ URL::to('/') }}/svg/MNA.svg" alt="" width="100" />
                                </a>
                            </li>
                            <li class="__current" id="group_size_max_lounge"> <!-- RCAV1-60 -->
                                <a href="{{ URL::to('/') }}">
                                    <span class="__title">AIRPORT LOUNGE</span>
                                    <img src="{{ URL::to('/') }}/svg/LOUNGE.svg" alt="" width="100" />
                                </a>
                            </li>
                        </ul>
                        <div id="tab-1" class="tabs_z_content __current">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="__main_heading">AIRPORT LOUNGE</h1>
                                    
                                </div>
                            </div>
                            <div class="__form_wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="__form_notes"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="__filled_info">
                                            <div class="__title">Name</div>
                                            <div class="__val">{{$username}}
                                                <input type="hidden" name="user_name" value="{{$username}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="__filled_info">
                                            <div class="__title">Applying for </div>
                                            <div class="__val">AIRPORT LOUNGE
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <h4></h4>
                                        <p class="md" style="color:red">A One Time Password (OTP) will be emailed to you. </p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="__app_form">
                                            <div class="__app_input">
                                                <label>Email ID</label>
                                                <input type="text" name="email_id" value="{{$email}}" readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="__app_form">
                                            <div class="__app_input">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone_number" value="{{$phone}}" readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" id="btn_send_otp1" name="btn_send_otp" class="__btn __btn_next">Send OTP</button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="__OTP_box" style="width:100%;text-align:left;position:relative;line-height: 28px; padding: 20px 0; color:darkslategrey">
                                            A One Time Password (OTP) has been emailed to you. 
Enter the OTP to proceed paying securely.
Please check you your spam message as well. Add support@redcarpetassist.com to your address book to ensure that our mails reach your Inbox.
                                            <div class="__OTP_title" id="message-box" >
</div>
                                            <div class="__OTP_input_box">
                                                <div class="__OTP_input">
                                                    <div class="divInner">
                                                        <input type="text" name="opt_number" id="" maxlength="4" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="__resend">Not Recieved? <a href="javascript:void(0)" id="btn_resend">Resend OTP</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-12">
                                        <input type="checkbox" name="terms" id="terms" value="Y" required="">  I agree to the <a href='{{URL::to("/")}}/terms-and-conditions' target='_blank'>Terms & Conditions</a> and <a href='{{URL::to("/")}}/privacy-policy' target='_blank'>Privacy Policy</a>
                                    </div> -->

                                    <div class="col-md-12 text-center paddingtb_10">
                                        <button type="submit" id="btn_confirm" class="__btn __btn_next" >CONFIRM &amp; PROCEED</button>
                                    </div>
                                </div><!-- row end -->
                            </div><!-- Form wrapper -->
                        </div><!-- Tab Content End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="__thanks" id="thanks" style="display: none">
            <div class="__thanks_body">
                <div class="_close_thnks"><a href="javascript:void(0);" onclick="$('#thanks').fadeOut('slow');"><img src="{{URL::to('/')}}/svg/close-icon.svg" width="22px" height="22px" /></a></div>
                <!-- <img src="svg/thanks_icon.svg" width="90px" class="center-block" alt="" /> -->
                <p id="mail_msg"></p>
            </div>
    </div>
    <div class="loading" id="overlay_load" style="display: none;">Loading&#8230;</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript">
    //RCAV1-35 - START
    $(document).ready(function () {
        var closing_window = false;
       
        $(window).on('focus', function () {
            closing_window = false; 
        });

        $(window).on('blur', function () {
            closing_window = true;
            if (!document.hidden) { //when the window is being minimized
                closing_window = false;
            }
            $(window).on('resize', function (e) { //when the window is being maximized
                closing_window = false;
            });

            $(window).off('resize'); //avoid multiple listening
        });

        $('html').on('mouseleave', function () {
            closing_window = true; 
            //if the user is leaving html, we have more reasons to believe that he's 
            //leaving or thinking about closing the window
        });

        $('html').on('mouseenter', function () {
            closing_window = false;
        });

        $(document).on('keydown', function (e) {
            if (e.keyCode == 91 || e.keyCode == 18) {
                closing_window = false; //shortcuts for ALT+TAB and Window key
            }

            if (e.keyCode == 116 || (e.ctrlKey && e.keyCode == 82)) {
                closing_window = false; //shortcuts for F5 and CTRL+F5 and CTRL+R
            }
        });

        // Prevent logout when clicking in a hiperlink
        $(document).on("click", "a", function () {
            closing_window = false;
        });

        // Prevent logout when clicking in a button (if these buttons rediret to some page)
        $(document).on("click", "button", function () {
            closing_window = false;
        });

        // Prevent logout when submiting
        $(document).on("submit", "form", function () {
            closing_window = false;
        });

        // Prevent logout when submiting
        $(document).on("click", "input[type=submit]", function () {
            closing_window = false;
        });

        window.addEventListener('beforeunload', function (e) {
            if(closing_window === true){
                console.log("ORDER ID IS : " + $('#order_id').val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/projects/rca_website_l/public/sendabandonsmail",
                    type: "POST",
                    dataType:"json",
                    async: true,
                    data: {order_id:$('#order_id').val(),pagename:'mna_verify_otp'},
                    success: function (response) {
                        // console.log(response);
                                    //alert("grate");                 
                    }
                });
            }
        });
    });
    //RCAV1-35 - END
 </script>





@include('layouts.middle_footer')     
@stop