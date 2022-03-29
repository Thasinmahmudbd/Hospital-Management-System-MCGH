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



        <!--Session message-->

        @if(session('msg')=='Please assign an appointment time.')

            <div class="content_container text_center warning_msg">{{session('msg')}}</div> 

        @elseif(session('msg')=='Appointment Canceled.')

            <div class="content_container text_center warning_msg">{{session('msg')}}</div>

        @endif









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

                            <p class="collected_info">Third Seizure</p>
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



        <div class="doctor_form patient_and_doctor_info_one_is_to_one">

            <!-- Bed Counts -->

            <form action="{{url('/reception/emergency/data/entry/')}}" method="post" class="content_container_bg_less">
            @csrf

                <p class="section_title">Bed Counts</p>

                <div class="info">
                    <p class="collected_info">Ward Days</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" value="{{session('WARD_DAY')}}" name="ward_days">
                </div>

                <div class="info">
                    <p class="collected_info">Cabin Days</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" value="{{session('CABIN_DAY')}}" name="cabin_days">
                </div>

                <div class="gap"></div>

                <div class="info">
                    <span class="collected_info"></span>
                    <p></p>
                    <input type="submit" class="btn form_btn" name="Change" value="Change">
                </div>

            </form>

            <!-- Bill Info -->

            <div class="content_container_bg_less">

                <p class="section_title">Bill Info</p>

                <div class="info">
                    <p class="collected_info">Ward Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('Ward_Bill')}}" name="ward_days">
                </div>

                <div class="info">
                    <p class="collected_info">Cabin Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly value="{{session('Cabin_Bill')}}" name="ward_days">
                </div>

                <div class="info">
                    <p class="collected_info">Other Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly name="ward_days">
                </div>

                <div class="info">
                    <p class="collected_info">Total Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" readonly name="ward_days">
                </div>

            </div>

            <!-- Billing -->

            <form action="{{url('/reception/emergency/data/entry/')}}" method="post" class="content_container_bg_less">
            @csrf

                <p class="section_title">Billing</p>

                <div class="info">
                    <p class="collected_info">Estimated Bill</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" name="ward_days">
                </div>

                <div class="info">
                    <p class="collected_info">Discount</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" name="cabin_days">
                </div>

                <div class="info">
                    <p class="collected_info">Received</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" name="ward_days">
                </div>

                <div class="info">
                    <p class="collected_info">Change</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info" name="cabin_days">
                </div>

                <div class="gap"></div>

                <div class="info">
                    <span class="collected_info"></span>
                    <p></p>
                    <input type="submit" class="btn form_btn" name="Release" value="Release">
                </div>

            </form>

        </div>







@endsection

<!--------------------content end---------------------->

