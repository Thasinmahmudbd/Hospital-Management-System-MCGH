@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Date & Discount)')






<!-----------------------link---------------------->

@section('links')

<li class="list_item">
    <a href="receptionist_appoint_time.html" class="link">
        <i class="link_icons fas fa-clock"></i>
        <span class="link_name"> Reselect Time </span>
    </a>
</li>

<li class="list_item">
    <a href="#" class="link">
        <i class="link_icons far fa-window-close"></i>
        <span class="link_name"> Cancel Appointment </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="receptionist_appoint_time.html">Reselect Time</a>
    <a class="mobile_link" href="#">Cancel Appointment</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

<div class="patient_and_doctor_info_one_is_to_one">

    <div class="content_container">

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
            <p class="collected_info">{{Session::get('PATIENT_P_ID')}}</p>

        </div>

    </div>

    <div class="content_container">

        <p class="section_title">Doctor Chosen</p>

        <div class="info">

            <p class="collected_info">Doctor's Name</p>
            <p>:</p>
            <p class="collected_info">{{Session::get('D_NAME')}}</p>

            <p class="collected_info">Fee</p>
            <p>:</p>
            <p class="collected_info">{{Session::get('BASIC_FEE')}}</p>

            <p class="collected_info">Time</p>
            <p>:</p>
            <p class="collected_info">{{Session::get('F')}} - {{Session::get('T')}}</p>

            <form action="{{url('/reception/date_and_discount')}}" method="post" class="doctor_form">
            @csrf

                <div class="doctor_form_element">
                    <p class="collected_info">Date</p>
                    <input type="date" class="input collected_info" name="appoint_date" required>
                </div>
                
                <!--<div class="doctor_form_element">
                    <p class="collected_info">Fee</p>
                    <input type="tel" class="input collected_info" name="fee" required>
                    <p class="collected_info">TK</p>
                </div>-->

                <div class="doctor_form_element">
                    <p class="collected_info">Discount</p>
                    <input type="tel" class="input collected_info" name="discount" required>
                    <p class="collected_info">%</p>
                </div>

                <div class="doctor_form_element">
                    <span class="collected_info"></span>
                    <input type="submit" class="btn form_btn" name="enroll" value="Submit">
                </div>

            </form>


        </div>

    </div>

</div>

@endsection

<!--------------------content end---------------------->
