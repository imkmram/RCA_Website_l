@extends('layouts.layout')

@section('content')
<div class="__bg">
    <?php //var_dump($amount);exit;?>
        <div class="container container-sm">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div id="tab-1" class="tabs_z_content __current">
                            <div class="__round_wrapper">
                            <div class="__flight_details">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>-->
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>-->
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            
            <div class="_odr_dts">
                
                    @if($message == '')
                    <div class="__fl_num"><p>Hi {{$user_name}},</p></div>
                    <div class="_country_type"><p>We have verified your email id. Click 'Pay Now' to continue with your payment.</p></div>
                    @endif
                    <?php
                        //$amount;
                    ?>
                    <div class="panel-body text-center">
                    <form action="payment" method="POST" >
                        
                        <!-- Note that the amount is in paise = 50 INR -->
                        <!--amount need to be in paisa-->
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ Config::get('custom.razor_key') }}"
                                data-amount="{{$amount}}"
                                data-buttontext="Pay Now"
                                data-name="RedCarpet Assist"
                                data-description="Order Value"
                                data-image="{{ URL::to('/') }}/images/logo.svg"
                                data-prefill.name="{{$user_name}}"
                                data-prefill.email="{{$email_id}}"
                                data-notes.order_id = "{{$order_id}}"
                                data-notes.order_code = "{{$order_code}}"
                                data-notes.ccode =  "{{$ccode}}" 
                                data-notes.username = "{{$user_name}}"
                                data-notes.productinfo = "{{$productinfo}}"
                                data-prefill.contact = "{{$phone_number}}"
                                data-theme.color="#ff7529">
                        </script>
                        <input type="hidden" name="order_id" id="order_id" value="{{$order_id}}">
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>
                </div>
                                                
            </div>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
            <script type="text/javascript">
                
                //RCAV1-35 - START
                $(document).ready(function () {
                    var closing_window = false;
                   
                   $("input[type=submit]").addClass("__btn __active");

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
                                data: {order_id:$('#order_id').val(),pagename:'pay_with_razor_pay'},
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
               
            </div></div></div></div></div>
        </div>
    </div>
</div>
@include('layouts.middle_footer')     
@stop