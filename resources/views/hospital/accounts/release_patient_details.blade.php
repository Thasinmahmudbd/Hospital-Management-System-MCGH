@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Release Patient's (Details)")






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/accounts/home/')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> My Profile </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/doctor/income/')}}" class="link">
        <i class="link_icons fas fa-hand-holding-usd"></i>
        <span class="link_name"> Doctor's Income </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/cash/in/'.Session::get('DATE_TODAY'))}}" class="link">
        <i class="link_icons fas fa-cash-register"></i>
        <span class="link_name"> Cash In </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/pay/salary/'.Session::get('pay_salary_person'))}}" class="link">
        <i class="link_icons fas fa-credit-card"></i>
        <span class="link_name"> Pay Salary </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/creditors/')}}" class="link">
        <i class="link_icons fas fa-search-dollar"></i>
        <span class="link_name"> Creditors </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/patient/release/')}}" class="link">
        <i class="link_icons fas fa-hospital-user"></i>
        <span class="link_name"> Patient Release </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/release/slips/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Release Slips </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/ambulance/')}}" class="link">
        <i class="link_icons fas fa-ambulance"></i>
        <span class="link_name"> Ambulance </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/other/transactions/')}}" class="link">
        <i class="link_icons fas fa-random"></i>
        <span class="link_name"> Other Transactions </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> Logs </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/edit_profile/')}}" class="link">
        <i class="link_icons fas fa-user-edit"></i>
        <span class="link_name"> Edit Profile </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/accounts/home/')}}">My Profile</a>
    <a class="mobile_link" href="{{url('/accounts/doctor/income/')}}">Doctors Income</a>
    <a class="mobile_link" href="{{url('/accounts/cash/in/'.Session::get('DATE_TODAY'))}}">Cash In</a>
    <a class="mobile_link" href="{{url('/accounts/pay/salary/'.Session::get('pay_salary_person'))}}">Pay Salary</a>
    <a class="mobile_link" href="{{url('/accounts/creditors/')}}">Creditors</a>
    <a class="mobile_link" href="{{url('/accounts/patient/release/')}}">Patient Release</a>
    <a class="mobile_link" href="{{url('/accounts/release/slips/')}}">Release Slips</a>
    <a class="mobile_link" href="{{url('/accounts/ambulance/')}}">Ambulance</a>
    <a class="mobile_link" href="{{url('/accounts/other/transactions/')}}">Other Transactions</a>
    <a class="mobile_link" href="{{url('/accounts/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/accounts/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')












            <div class="gap"></div>


            <!--Patient info tab-->

            <div class="patient_and_doctor_info_one_is_to_one">

                <div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Patient Info</p>

                        <div class="info">

                            <p class="collected_info">Patient's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NAME')}}</p>

                            <p class="collected_info">Patient's Gender</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_GENDER')}}</p>

                            <p class="collected_info">Cell Number</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_CELL')}}</p>

                            <p class="collected_info">Patient ID</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('P_ID')}}</p>

                            <p class="collected_info">Patient NID</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NID')}}</p>

                            <p class="collected_info">NID Type</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NID_TYPE')}}</p>

                        </div>

                        <div class="gap"></div>

                        <p class="section_title">Consultant Chosen</p>

                        <div class="info">

                            <p class="collected_info">Consultant's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('DOCTOR_NAME')}}</p>

                            <p class="collected_info">Admission Time</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('ADMISSION_TIMESTAMP')}}</p>

                        </div>

                    </div>

                </div>




                <div>

                    <!--consultant info-->

                    <div class="content_container_bg_less">

                        <p class="section_title">Package Chosen</p>

                        <div class="info">

                            <p class="collected_info">Package</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PACKAGES')}}</p>

                            <p class="collected_info">Ligation</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('LIGATION')}}</p>

                            <p class="collected_info">3rd Seizure</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('THIRD_SEIZURE')}}</p>

                        </div>

                        <div class="gap"></div>

                        <p class="section_title">Bed Chosen</p>

                        <div class="info">

                            <p class="collected_info">Bed No</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('BED_NO')}}</p>

                            <p class="collected_info">Bed Type</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('BED_TYPE')}}</p>

                            <p class="collected_info">Quality</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('QUALITY')}}</p>

                            <p class="collected_info">Room No</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('ROOM_NO')}}</p>

                            <p class="collected_info">Floor No</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('FLOOR_NO')}}</p>

                        </div>

                    </div>

                </div>

            </div>




            <div class="purple_line"></div>
            <div class="gap"></div>



        <!--Session message-->

        @if(session('msg')=='0 deduction done.')

            <div class="content_container text_center warning_msg">{{session('msg')}}</div> 

        @elseif(session('msg')=='Deduction impossible.')

            <div class="content_container text_center warning_msg">{{session('msg')}}</div>

        @endif



        <div class="doctor_form patient_and_doctor_info_one_is_to_one">

            <!-- Bill Info -->

            <div class="content_container_bg_less">

                <p class="section_title">Bill Info</p>

                <div class="info">
                    <p class="collected_info">Ward Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('Ward_Bill')}}" name="ward_bill">
                </div>

                <div class="info">
                    <p class="collected_info">Cabin Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('Cabin_Bill')}}" name="cabin_bill">
                </div>

                <div class="info">
                    <p class="collected_info">Ligation Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('Ligation_Bill')}}" name="ligation_bill">
                </div>

                <div class="info">
                    <p class="collected_info">3rd Seizure Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('Third_Seizure_Bill')}}" name="third_seizure_bill">
                </div>

                <div class="info">
                    <p class="collected_info">OT Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('ot_charge')}}" name="ot_charge">
                </div>

                <div class="info">
                    <p class="collected_info">Surgeon Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('ot_surgeon_bill')}}" name="ot_surgeon_bill">
                </div>

                <div class="info">
                    <p class="collected_info">Anesthesia Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('ot_anesthesiologist_bill')}}" name="ot_anesthesiologist_bill">
                </div>

                <div class="info">
                    <p class="collected_info">Nurses Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('ot_nurses_bill')}}" name="ot_nurses_bill">
                </div>

                <div class="info">
                    <p class="collected_info">Assistant Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('ot_assistant_bill')}}" name="ot_assistant_bill">
                </div>

                <div class="info">
                    <p class="collected_info">Other Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('b_i_others')}}" name="b_i_others">
                </div>

                <div class="info">
                    <p class="collected_info">Visiting Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('b_i_visits')}}" name="b_i_visits">
                </div>

                <div class="info">
                    <p class="collected_info">Total Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly id="fee" value="{{session('Ward_Bill')+session('Cabin_Bill')+session('Ligation_Bill')+session('Third_Seizure_Bill')+session('ot_charge')+session('ot_surgeon_bill')+session('ot_anesthesiologist_bill')+session('ot_nurses_bill')+session('ot_assistant_bill')+session('b_i_others')+session('b_i_visits')}}"name="total_bill">
                </div>

            </div>

            <div>

                <!-- Bed Counts -->

                <form action="{{url('/account/release/patient/details/edit/'.session('a_id'))}}" method="post" class="content_container_bg_less">
                @csrf

                    <p><span class="section_title">Bed Counts</span> --------------------------------------------- Deduct if necessary.</p>

                    <div class="info">
                        <p class="collected_info">Ward Days</p>
                        <p>:</p>
                        <div class="patient_form_element_three_is_to_one">
                            <input type="text" class="input_less collected_info" value="{{session('WARD_DAY')}}" readonly>
                            <input type="text" class="input collected_info text_center" value="0" name="ward_tk_eduction">
                        </div>
                    </div>

                    <div class="info">
                        <p class="collected_info">Cabin Days</p>
                        <p>:</p>
                        <div class="patient_form_element_three_is_to_one">
                            <input type="text" class="input_less collected_info" value="{{session('CABIN_DAY')}}" readonly>
                            <input type="text" class="input collected_info text_center" value="0"  name="cabin_tk_eduction">
                        </div>
                    </div>

                    <div class="gap"></div>

                    <!--Hidden inputs-->
                    <input type="hidden" name="Ward_Bill" value="{{session('Ward_Bill')}}">
                    <input type="hidden" name="Cabin_Bill" value="{{session('Cabin_Bill')}}">

                    <div class="info">
                        <span class="collected_info"></span>
                        <p></p>
                        <div class="patient_form_element_one_is_to_one">
                            <a class="btn form_btn text_center" href="{{url('/account/release/patient/details/'.session('a_id'))}}">Reset</a>
                            <input type="submit" class="btn form_btn" name="Change" value="Change">
                        </div>
                    </div>

                </form>

                <!-- Billing -->

                <form action="{{url('/account/release/')}}" method="post" class="content_container_bg_less">
                @csrf

                    <p class="section_title">Billing</p>

                    <div class="info">
                        <p class="collected_info">Estimated Bill</p>
                        <p>:</p>
                        <input type="text" class="input_less collected_info" name="estimate" id="estimate" readonly>
                    </div>

                    <div class="info">
                        <p class="collected_info">Discount</p>
                        <p>:</p>
                        <input type="text" class="input_less collected_info" name="discount" value="0" id="disc" oninput="calcDisc()">
                    </div>

                    <div class="info">
                        <p class="collected_info">Received</p>
                        <p>:</p>
                        <input type="text" class="input_less collected_info" name="received" oninput="calcAppointmentFee()" id="r2" value="0" required>
                    </div>

                    <div class="info">
                        <p class="collected_info">Change</p>
                        <p>:</p>
                        <input type="text" class="input_less collected_info" name="change" id="c2" value="0" required>
                    </div>

                    <!--Hidden inputs-->
                    <input type="hidden" value="{{session('a_id')}}" name="a_id">

                    <input type="hidden" value="{{session('Ward_Bill')}}" name="Ward_Bill">
                    <input type="hidden" value="{{session('Cabin_Bill')}}" name="Cabin_Bill">
                    <input type="hidden" value="{{session('Ligation_Bill')}}" name="Ligation_Bill">
                    <input type="hidden" value="{{session('Third_Seizure_Bill')}}" name="Third_Seizure_Bill">
                    <input type="hidden" value="{{session('ot_charge')}}" name="ot_charge">
                    <input type="hidden" value="{{session('ot_surgeon_bill')}}" name="ot_surgeon_bill">
                    <input type="hidden" value="{{session('ot_anesthesiologist_bill')}}" name="ot_anesthesiologist_bill">
                    <input type="hidden" value="{{session('ot_nurses_bill')}}" name="ot_nurses_bill">
                    <input type="hidden" value="{{session('ot_assistant_bill')}}" name="ot_assistant_bill">
                    <input type="hidden" value="{{session('b_i_others')}}" name="b_i_others">
                    <input type="hidden" value="{{session('b_i_visits')}}" name="b_i_visits">
                    <input type="hidden" value="{{session('Ward_Bill')+session('Cabin_Bill')+session('Ligation_Bill')+session('Third_Seizure_Bill')+session('ot_charge')+session('ot_surgeon_bill')+session('ot_anesthesiologist_bill')+session('ot_nurses_bill')+session('ot_assistant_bill')+session('b_i_others')+session('b_i_visits')}}" name="total_bill">

                    <input type="hidden" value="{{session('WARD_DAY')}}" name="Ward_Days">
                    <input type="hidden" value="{{session('CABIN_DAY')}}" name="Cabin_Days">

                    <input type="hidden" value="{{session('CABIN_DAY')}}" name="Cabin_Days">

                    <div class="gap"></div>

                    <div class="info">
                        <span class="collected_info"></span>
                        <p></p>
                        <input type="submit" class="btn form_btn" name="Release" value="Release">
                    </div>

                </form>

            </div>

        </div>







@endsection

<!--------------------content end---------------------->

