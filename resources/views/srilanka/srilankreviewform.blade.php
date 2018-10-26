@extends('layouts.layout')
@section('content')
<div class="clearfix"></div>
    <div class="__bg">
        <div class="container container-sm">
            <div class="row">
                <div class="col-md-12">
                    <div class="paddingtb_50">
                        <ul class="tabs_z">
                            <li class="__current">
                                <a href="{{URL::to('/')}}">
                                    <span class="__title">eVisa</span>
                                    <img src="{{ URL::to('/') }}/svg/E-visa.svg" alt="" width="100" />
                                </a>
                            </li>
                            <li id="group_size_max_mna"> <!-- RCAV1-60 -->
                                <a href="{{URL::to('/')}}">
                                    <span class="__title">AIRPORT MEET &amp; GREET</span>
                                    <img src="{{ URL::to('/') }}/svg/MNA.svg" alt="" width="100" />
                                </a>
                            </li>
                            <li id="group_size_max_lounge"> <!-- RCAV1-60 -->
                                <a href="{{URL::to('/')}}">
                                    <span class="__title">AIRPORT LOUNGE</span>
                                    <img src="{{ URL::to('/') }}/svg/LOUNGE.svg" alt="" width="100" />
                                </a>
                            </li>
                        </ul>
                        <div id="tab-1" class="tabs_z_content __current __width100">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="__main_heading">
                                        eVisa
                                        @if($extractdata['is_review_updated']=="N")
                                        <div class="__hgk_rev_header">
                                            <button type="button" id="btn_edit" class="__btn">EDIT</button>
                                            <button type="button" id="btn_close" class="__btn divhide">Cancel</button>
                                        </div>
                                        @endif
                                    </h1>
                                </div>
                            </div>
                            <div class="__form_wrapper">
                                <form method="post" name="CustomTypeForm" id="CustomTypeForm" novalidate="novalidate">
                                <input type="hidden" name="order_id" id="order_id" value="{{$extractdata['order_id']}}">
                                <input type="hidden" name="order_code" id="order_code" value="{{$extractdata['order_code']}}">
                                <input type="hidden" name="user_id" id="user_id" value="{{$extractdata['user_id']}}">
                                <input type="hidden" name="product_id" id="product_id" value="{{$extractdata['product_id']}}">
                                <input type="hidden" name="profile_id" id="profile_id" value="{{$extractdata['profile_id']}}">
                                <input type="hidden" name="nationality" id="nationality" value="{{$extractdata['nationality']}}">
                                <input type="hidden" name="citizen_to" id="citizen_to" value="{{$extractdata['citizen_to']}}">
                                <input type="hidden" name="travel_to" id="travel_to" value="{{$extractdata['travel_to']}}">
                                <input type="hidden" name="service_id" id="service_id" value="{{$extractdata['service_id']}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="__stylish_head">Review Form Details</h4>
                                    </div>
                                    @if($errors->any())
                                    <div class="__thanks" id="thanks">
                                            <div class="__thanks_body">
                                                <div class="_close_thnks"><a href="javascript:void(0);" onclick="$('#thanks').fadeOut('slow');"><img src="{{URL::to('/')}}/svg/close-icon.svg" width="22px" height="22px" /></a></div>
                                                <!-- <img src="svg/thanks_icon.svg" width="90px" class="center-block" alt="" /> -->
                                                <div class="alert alert-success">
                                                  <p>{{$errors->first()}}</p>
                                                </div>
                                                <div class="clearfix"></div>
                                                <a href="{{URL::to('/')}}" class="__btn" title="Go Home">Home</a>
                                            </div>
                                    </div>
                                    @endif
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__select_box">
                                                <label>Select Travel Type<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="gender" name="gender" required="" disabled="true">
                                                    <option value="">Select an option</option>
                                                    <option value="5" {{(!empty($extractdata['service_id']) && $extractdata['service_id']==5)?"selected":NULL}}>Tourist</option>
                                                    <option value="6" {{(!empty($extractdata['service_id']) && $extractdata['service_id']==6)?"selected":NULL}}>Business</option>
                                                    <option value="7" {{(!empty($extractdata['service_id']) && $extractdata['service_id']==7)?"selected":NULL}}>Transit</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__select_box">
                                                <label>Title.<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="gender" name="gender" required="" disabled="true">
                                                    <option value="">Select an option</option>
                                                    <option value="dr" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="de"?"selected":NULL)}}>DR</option>
                                                    <option value="master" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="master"?"selected":NULL)}}>MASTER</option>
                                                    <option value="miss" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="miss"?"selected":NULL)}}>MISS</option>
                                                    <option value="mr" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="mr"?"selected":NULL)}}>MR</option>
                                                    <option value="mrs" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="mrs"?"selected":NULL)}}>MRS</option>
                                                    <option value="ms" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="ms"?"selected":NULL)}}>MS</option>
                                                    <option value="rev" {{($extractdata['application_details']['salutation'] && $extractdata['application_details']['salutation']=="rev"?"selected":NULL)}}>REV</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Given name as per the passport.<span class="strike">*</span></label>
                                                <input type="text" name="passport_given_name" id="passport_given_name" value="{{$extractdata['username']}}" required="" class="__readonly" readonly="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Surname name as per the passport.<span class="strike">*</span></label>
                                                <input type="text" name="passport_surname_name" id="passport_surname_name" value="{{$extractdata['surname']}}" required="" class="__readonly" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Your valid passport number<span class="strike">*</span></label>
                                                <input type="text" name="passport_number" id="passport_number" value="{{$extractdata['pp_no']}}" class="__readonly" required="" readonly="">
                                            </div>
                                        </div>
                                        <!-- clearfix -->
                                        <div class="clearfix"></div>
                                        <!-- clearfix end -->
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Date of issue<span class="strike">*</span></label>
                                                <input type="text" name="type_doi_srilanka" id="type_doi_srilanka" class="datepicker __readonly" placeholder="select Date" value="{{$extractdata['pp_issue_date']}}" readonly="" disabled="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Date of expiry<span class="strike">*</span></label>
                                                <input type="text" name="type_doe_srilanka" id="type_doe_srilanka" class="datepicker __readonly" placeholder="select Date" value="{{$extractdata['pp_expiry_date']}}" readonly="" disabled="true" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- grey box end -->
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__select_box">
                                                <label>Gender<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="gender" name="gender" required="" disabled="true">
                                                    <option value="Male" {{($extractdata['gender']=="male")?"selected":NULL}}>Male</option>
                                                    <option value="Female" {{($extractdata['gender']=="female")?"selected":NULL}}>Female</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                                <div class="__select_box">
                                                    <label>Nationality<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="nationality_dropdown" name="nationality_dropdown" disabled="true">
                                                <option value="">Select Country</option>
                                                @if(count($getcountry)>0)
                                                @foreach($getcountry as $val)      
                                                    <option value="{{$val->country_id}}" {{($val->country_id==$extractdata['application_details']['country'])?"selected":NULL}}>{{$val->country_name}}</option>
                                                @endforeach
                                                @endif
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                                </div>
                                        </div>
                                        <div class='col-md-4'>
                                                <div class="__select_box">
                                                    <label>Country of Birth<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="nationality_dropdown" name="nationality_dropdown" disabled="true">
                                                <option value="">Select Country</option>
                                                @if(count($getcountry)>0)
                                                @foreach($getcountry as $val)      
                                                    <option value="{{$val->country_id}}" {{($val->country_id==$extractdata['application_details']['country_of_birth'])?"selected":NULL}}>{{$val->country_name}}</option>
                                                @endforeach
                                                @endif
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                                </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Email Address<span class="strike">*</span></label>
                                                <input type="email" name="email_id" id="email_id" value="{{$extractdata['email_id']}}" required="" readonly="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Occupation</label>
                                                <input type="text" name="occupation" id="occupation" value="{{$extractdata['application_details']['occupation']}}" class="__readonly" required="" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Date of Birth<span class="strike">*</span></label>
                                                <input type="text" name="type_dob_srilanka" id="type_dob_srilanka" class="datepicker __readonly" placeholder="select Date" value="{{$extractdata['dob']}}" readonly="" disabled="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Intended Arrival Date<span class="strike">*</span></label>
                                                <input type="text" name="arrival_date" id="arrival_date_srilanka" class="datepicker __readonly" placeholder="select Date" value="{{$extractdata['application_details']['arrival_date']}}" readonly="" disabled="true" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Port of Departure</label>
                                                <input type="text" name="port_of_departure" id="port_of_departure" value="{{$extractdata['application_details']['port_of_departure']}}" class="__readonly" required="" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Airline/Vessel</label>
                                                <input type="text" name="airline_vessel" id="airline_vessel" value="{{$extractdata['application_details']['airline_vessel']}}" class="__readonly" required="" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__app_input">
                                                <label>Flight/Vessel Number</label>
                                                <input type="text" name="flight_vessel_number" id="flight_vessel_number" value="{{$extractdata['application_details']['airline_vessel_no']}}" class="__readonly" required="" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 {{!empty($extractdata['service_id']) && $extractdata['service_id']==5?'divshow':'divhide'}}">
                                            <div class="__select_box">
                                                <label>Purpose of visit<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="purpose_of_visit_tourist" name="purpose_of_visit_tourist" disabled="true">
                                                    <option value="">Select an option</option>
                                                    @foreach($gettouristpurpose as $val)
                                                    <option value="13" {{$val->purpose_id==$extractdata['application_details']['tourist_purpose']?"selected":NULL}}>$val->purpose_name</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                            <input type="hidden" name="purpose_visit" id="purpose_visit" value="{{$extractdata['purpose_id']}}" required="">
                                        </div>
                                        <div class="col-md-4 {{!empty($extractdata['service_id']) && $extractdata['service_id']==6?'divshow':'divhide'}}">
                                            <div class="__select_box">
                                                <label>Purpose of visit<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="purpose_of_visit_business" name="purpose_of_visit_business" disabled="true">
                                                    <option value="">Select an option</option>
                                                    @foreach($getbusinesspurpose as $val)
                                                    <option value="13" {{$val->purpose_id==$extractdata['application_details']['business_purpose']?"selected":NULL}}>$val->purpose_name</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                            <input type="hidden" name="purpose_visit" id="purpose_visit" value="{{$extractdata['purpose_id']}}" required="">
                                        </div>
                                        <div class="col-md-4 {{!empty($extractdata['service_id']) && $extractdata['service_id']==7?'divshow':'divhide'}}">
                                            <div class="__select_box">
                                                <label>Purpose of visit<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="purpose_of_visit_text_transit" name="purpose_of_visit_text_transit" disabled="true">
                                                    <option value="">Select an option</option>
                                                    @foreach($getbusinesspurpose as $val)
                                                    <option value="13" {{$val->purpose_id==$extractdata['application_details']['business_purpose']?"selected":NULL}}>$val->purpose_name</option>
                                                    @endforeach
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                            <input type="hidden" name="purpose_visit" id="purpose_visit" value="{{$extractdata['purpose_id']}}" required="">
                                        </div>
                                    </div>
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Do you have a local connection in the HKSAR<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_local_conn">
                                                      <input type="radio" name="is_local_conn" id="is_local_conn" class="__readonly" value="Y" {{($extractdata['application_details']['local_conn_hk']=="Y")?"checked":NULL}} disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_local_conn">
                                                      <input type="radio" name="is_local_conn" id="is_local_conn" class="__readonly" value="N" {{($extractdata['application_details']['local_conn_hk']=="N")?"checked":NULL}} disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-4 {{($extractdata["application_details"]["local_conn_hk"]=="Y")?"divshow":"divhide"}}' id="local_conn_div">
                                            <div class="__app_input">
                                                <label>Please enter the Name of local connection (person or company)<span class="strike">*</span></label>
                                                <input type="text" name="local_conn_name" id="local_conn_name" class="__readonly" value="{{$extractdata['application_details']['local_name_hk']}}" {{($extractdata["application_details"]["local_conn_hk"]=="Y")?"required":NULL}} readonly="" />
                                            </div>
                                            </div>
                                            <div class='col-md-4 {{($extractdata["application_details"]["local_conn_hk"]=="Y")?"divshow":"divhide"}}' id="local_conn_div1">
                                                <div class="__select_box">
                                                <label>Enter the Relationship with local connection<span class="strike">*</span></label>
                                                <select class="__select __readonly" id="local_conn_relative" name="local_conn_relative" {{($extractdata["application_details"]["local_conn_hk"]=="Y")?"required":NULL}} disabled="true">
                                                    <option value="">Select an option</option>
                                                    <option value="Father/Mother" {{($extractdata["application_details"]["local_conn_relation"]=="Father/Mother")?"selected":NULL}}>Father/Mother</option>
                                                    <option value="Husband/Wife" {{($extractdata["application_details"]["local_conn_relation"]=="Husband/Wife")?"selected":NULL}}>Husband/Wife</option>
                                                    <option value="Son/Daughter" {{($extractdata["application_details"]["local_conn_relation"]=="Son/Daughter")?"selected":NULL}}>Son/Daughter</option>
                                                    <option value="Siblings" {{($extractdata["application_details"]["local_conn_relation"]=="Siblings")?"selected":NULL}}>Siblings</option>
                                                    <option value="Friend" {{($extractdata["application_details"]["local_conn_relation"]=="Friend")?"selected":NULL}}>Friend</option>
                                                    <option value="Business Associates" {{($extractdata["application_details"]["local_conn_relation"]=="Business Associates")?"selected":NULL}}>Business Associates</option>
                                                    <option value="Tour Agent" {{($extractdata["application_details"]["local_conn_relation"]=="Tour Agent")?"selected":NULL}}>Tour Agent</option>
                                                    <option value="Other Relatives" {{($extractdata["application_details"]["local_conn_relation"]=="Other Relatives")?"selected":NULL}}>Other Relatives</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div>                             
                                    </div>
                                    <div class="__fm_box __app_form">
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Will you experience hardship or difficulty in or after returning to India?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_return_ind">
                                                      <input type="radio" name="is_return_ind" id="is_return_ind" class="__readonly" value="Y" {{($extractdata['application_details']['difficulty_ret_india']=="Y")?"checked":NULL}} required="" disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_return_ind">
                                                      <input type="radio" name="is_return_ind" id="is_return_ind" class="__readonly" value="N" {{($extractdata['application_details']['difficulty_ret_india']=="N")?"checked":NULL}} required="" disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Have you ever committed or been arrested for any overstaying, illegal immigration or other criminal offence in the HKSAR or any country/territory?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_arrested">
                                                      <input type="radio" class="__readonly" name="is_arrested" id="is_arrested" value="Y" {{($extractdata['application_details']['criminal_offence']=="Y")?"checked":NULL}} required="" disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_arrested">
                                                      <input type="radio" name="is_arrested" id="is_arrested" value="N" {{($extractdata['application_details']['criminal_offence']=="N")?"checked":NULL}} required="" class="__readonly" disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 {{($extractdata['application_details']['criminal_offence']=='Y')?'divshow':'divhide'}}" id="is_arrested_div">
                                            <div class="__review_radio">
                                                <p>If yes, have you ever been convicted of the offence(s)?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_convicted">
                                                      <input type="radio" class="__readonly" name="is_convicted" id="is_convicted" value="Y" {{($extractdata['application_details']['convicted_offence']=="Y")?"checked":NULL}} {{($extractdata['application_details']['criminal_offence']=="Y")?"required":NULL}} disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_convicted">
                                                      <input type="radio" class="__readonly" name="is_convicted" id="is_convicted" value="N" {{($extractdata['application_details']['convicted_offence']=="N")?"checked":NULL}} {{($extractdata['application_details']['criminal_offence']=="Y")?"required":NULL}} disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- clearfix -->
                                        <div class="clearfix"></div>
                                        <!-- clearfix end -->
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Have you ever been refused a visa application by the HKSAR or any other country/territory?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_refused">
                                                      <input type="radio" class="__readonly" name="is_refused" id="is_refused" value="Y" {{($extractdata['application_details']['refused_visa']=="Y")?"checked":NULL}} required="" disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_refused">
                                                      <input type="radio" class="__readonly" name="is_refused" id="is_refused" value="N" {{($extractdata['application_details']['refused_visa']=="N")?"checked":NULL}} required="" disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Have you ever been refused permission to enter the HKSAR or any other country/territory?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_refused_per">
                                                      <input type="radio" class="__readonly" name="is_refused_per" id="is_refused_per" value="Y" {{($extractdata['application_details']['refused_permission']=="Y")?"checked":NULL}} required="" disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_refused_per">
                                                      <input type="radio" class="__readonly" name="is_refused_per" id="is_refused_per" value="N" {{($extractdata['application_details']['refused_permission']=="N")?"checked":NULL}} required="" disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Have you ever been deported/removed from the HKSAR or any other country/territory?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_deported">
                                                      <input type="radio" class="__readonly" name="is_deported" id="is_deported" value="Y" {{($extractdata['application_details']['deported_country']=="Y")?"checked":NULL}} required="" disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_deported">
                                                      <input type="radio" class="__readonly" name="is_deported" id="is_deported" value="N" {{($extractdata['application_details']['deported_country']=="N")?"checked":NULL}} required="" disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- clearfix -->
                                        <div class="clearfix"></div>
                                        <!-- clearfix end -->
                                        <div class="col-md-4">
                                            <div class="__review_radio">
                                                <p>Do you seek to engage in or have you ever engaged in terrorist activities?<span class="strike">*</span></p>
                                                <div class="__prtyradio_box">
                                                    <label class="__review_radioinput" for="is_engage">
                                                      <input type="radio" class="__readonly" name="is_engage" id="is_engage" value="Y" {{($extractdata['application_details']['engaged_terrorist_activities']=="Y")?"checked":NULL}} required="" disabled="true">
                                                      <span>Yes</span>
                                                    </label>
                                                    <label class="__review_radioinput" for="is_engage">
                                                      <input type="radio" class="__readonly" name="is_engage" id="is_engage" value="N" {{($extractdata['application_details']['engaged_terrorist_activities']=="N")?"checked":NULL}} required="" disabled="true">
                                                      <span>NO</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- grey box end -->
                                    @if($extractdata['is_review_updated']=="N")
                                    <div class="col-md-12 text-center paddingtb_20">
                                        <button type="submit" class="__btn __btn_next btn_submit" id="hk_submit" disabled="">SUBMIT</button>
                                    </div>
                                    @endif
                                </div><!-- row end -->
                            <!-- Form wrapper -->
                            </form>
                            </div>
                        <!-- Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>    
@include('layouts.middle_footer')     
@stop