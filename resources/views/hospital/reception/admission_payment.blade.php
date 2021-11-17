@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Admission Payment)')






<!-----------------------link---------------------->

@section('links')

@if(Session::get('bed_selection_type')=='insert')

    <li class="link_item">
        <a href="{{url('/reception/bed/reselect')}}" class="link">
            <i class="link_icons fas fa-procedures"></i>
            <span class="link_name"> Reselect Bed </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/reception/cancel/admission/after/bed')}}" class="link">
            <i class="link_icons far fa-window-close"></i>
            <span class="link_name"> Cancel Admission </span>
        </a>
    </li>

@elseif(Session::get('bed_selection_type')=='update')

    <li class="link_item">
        <a href="{{url('/reception/bed/reselect')}}" class="link">
            <i class="link_icons fas fa-procedures"></i>
            <span class="link_name"> Reselect Bed </span>
        </a>
    </li>

@endif

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

@if(Session::get('bed_selection_type')=='insert')

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/bed/reselect')}}">Reselect Bed</a>
    </div>

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/cancel/admission/after/bed')}}">Cancel Admission</a>
    </div>

@elseif(Session::get('bed_selection_type')=='update')

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/bed/reselect')}}">Reselect Bed</a>
    </div>

@endif

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
                            <p class="collected_info">N/A</p>

                            <p class="collected_info">Patient NID</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NID')}}</p>

                            <p class="collected_info">NID Type</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NID_TYPE')}}</p>

                            <p class="collected_info">Present Village</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PRE_VILL')}}</p>

                            <p class="collected_info">Present Post Office</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PRE_PO')}}</p>

                            <p class="collected_info">Present Upazilla</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PRE_UPA')}}</p>

                            <p class="collected_info">Present District</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PRE_DIST')}}</p>

                            <p class="collected_info">Present Village</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PER_VILL')}}</p>

                            <p class="collected_info">Present Post Office</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PER_PO')}}</p>

                            <p class="collected_info">Present Upazilla</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PER_UPA')}}</p>

                            <p class="collected_info">Present District</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PER_DIST')}}</p>

                            <p class="collected_info">Religion</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_RELIGION')}}</p>

                            <p class="collected_info">Emergency Address</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('RELATIVE_ADDRESS')}}</p>

                            <p class="collected_info">Emergency Number</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('EMERGENCY_CELL')}}</p>

                        </div>

                    </div>

                </div>




                <div>

                    <!--consultant info-->

                    <div class="content_container_bg_less">

                        <p class="section_title">Consultant Chosen</p>

                        <div class="info">

                            <p class="collected_info">Consultant's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('D_NAME')}}</p>

                            <p class="collected_info">Admission Date</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_APPOINT_DATE')}}</p>

                        </div>

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



                    <!-- Billing -->
                    @if(Session::get('bed_selection_type')=='insert')

                    <div class="content_container">

                        <form action="{{url('/reception/patient_data_entry_for_admission')}}" method="post" class="doctor_form">
                        @csrf
                            
                            <div class="doctor_form_element">
                                <p class="collected_info">Estimated Bill</p>
                                <input type="text" class="input_less collected_info" name="estimated_bill" id="est" value="{{Session::get('ADMISSION_FEE')}}" readonly>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Previously Paid</p>
                                <input type="text" class="input_less collected_info" id="previous" value="0" readonly>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Received</p>
                                <input type="text" class="input collected_info" id="received" name="received" oninput="calcAdmissionFee()" required>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Change</p>
                                <input type="text" class="input collected_info" id="change" name="change"  value="0" required>
                            </div>

                            <div class="doctor_form_element">
                                <span class="collected_info"></span>
                                <input type="submit" class="btn form_btn" name="enroll" value="Admit">
                            </div>

                        </form>

                    </div>

                    @elseif(Session::get('bed_selection_type')=='update')

                    <div class="content_container">

                        <form action="{{url('/reception/patient_data_entry_for_admission')}}" method="post" class="doctor_form">
                        @csrf
                            
                            <div class="doctor_form_element">
                                <p class="collected_info">Estimated Bill</p>
                                <input type="text" class="input_less collected_info" name="estimated_bill" id="est" value="{{Session::get('ADMISSION_FEE')}}" readonly>
                            </div>
                            
                            <div class="doctor_form_element">
                                <p class="collected_info">Previously Paid</p>
                                <input type="text" class="input_less collected_info" id="previous" value="{{Session::get('previous_credit')}}" readonly>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Received</p>
                                <input type="text" class="input collected_info" oninput="calcAdmissionFee()" id="received" name="received" required>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Change</p>
                                <input type="text" class="input collected_info" id="change" name="change" value="0" required>
                            </div>

                            <div class="doctor_form_element">
                                <span class="collected_info"></span>
                                <input type="submit" class="btn form_btn" name="enroll" value="Admit">
                            </div>

                        </form>

                    </div>

                    @endif

                </div>





                    

                </div>









@endsection

<!--------------------content end---------------------->

