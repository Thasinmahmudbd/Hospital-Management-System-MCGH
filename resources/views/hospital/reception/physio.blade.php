@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Physio Payment')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/home/')}}" class="link">
        <i class="link_icons fas fa-home"></i>
        <span class="link_name"> Go Home </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/cancel_test/dental/')}}">Go Home</a>
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











            <!--Patient info tab-->

            <form action="{{url('/reception/physio/entry/')}}" method="post" class="content_container_white_super_thin center_self">
            @csrf

            <div class="patient_and_doctor_info_one_is_to_one">

                <div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Patient Info</p>

                        <div class="info">

                            <p class="collected_info">Patient ID</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_P_ID')}}</p>

                            <p class="collected_info">Patient's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NAME')}}</p>

                            <p class="collected_info">Patient's Age</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_AGE')}}</p>

                            <p class="collected_info">Patient's Gender</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_GENDER')}}</p>

                        </div>

                    </div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Therapy By</p>

                        <div class="info">

                            <p class="collected_info">Therapist</p>
                            <p>:</p>
                            <select name="doctor" class="input" required>
                                <option value="self">Self</option>   
                                @foreach($info as $list)
                                <option value="{{$list->D_ID}}">{{$list->Dr_Name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>




                <div>

                    <!--billing info-->

                    <div class="content_container_bg_less">

                        <p class="section_title">Billing Info</p>

                        <div class="info">

                            <p class="collected_info">Total Bill</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="calculated_bill" value="0" id="estimate" required>
                            </p>

                            <p class="collected_info">Received</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="received" oninput="calcAppointmentFee()" id="r2" value="0" required>
                            </p>

                            <p class="collected_info">Change</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="change" id="c2" value="0" required>
                            </p>

                            <p class="collected_info"></p>
                            <p></p>
                            <p class="collected_info">
                                <input type="submit" class="btn form_btn" name="confirm" value="Confirm">
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            </form>









@endsection

<!--------------------content end---------------------->

