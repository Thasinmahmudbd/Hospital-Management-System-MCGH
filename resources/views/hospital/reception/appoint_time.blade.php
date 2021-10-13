@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Appoint Time)')






<!-----------------------link---------------------->

@section('links')

    <li class="link_item">
        <a href="{{url('/reception/doctor_selection')}}" class="link">
            <i class="link_icons fas fa-user-md"></i>
            <span class="link_name"> Reselect Doctor </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/reception/cancel_appointment')}}" class="link">
            <i class="link_icons far fa-window-close"></i>
            <span class="link_name"> Cancel Appointment </span>
        </a>
    </li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/doctor_selection')}}">Reselect Doctor</a>
    </div>

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/cancel_appointment_from_time_selection/')}}">Cancel Appointment</a>
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







        <!--time table-->

        <div class="content_container">

            <form action="{{url('/reception/change_date')}}" method="post" class="doctor_form">
                @csrf
                    
                <div class="patient_form_element_three_is_to_one">
                
                    <p>{{Session::get('D_NAME')}}'s schedule.

                    <input type="date" class="input" name="appoint_date" value="{{ Session::get('PATIENT_APPOINT_DATE') }}" required>
                    
                    is 

                    @if(Session::get('PATIENT_APPOINT_DAY')=='Sun')

                        Sunday.

                    @elseif(Session::get('PATIENT_APPOINT_DAY')=='Mon')

                        Monday.

                    @elseif(Session::get('PATIENT_APPOINT_DAY')=='Tue')

                        Tuesday.

                    @elseif(Session::get('PATIENT_APPOINT_DAY')=='Wed')

                        Wednesday.

                    @elseif(Session::get('PATIENT_APPOINT_DAY')=='Thu')

                        Thursday.

                    @elseif(Session::get('PATIENT_APPOINT_DAY')=='Fri')

                        Friday.

                    @elseif(Session::get('PATIENT_APPOINT_DAY')=='Sat')

                        Saturday.

                    @endif

                    </p>

                    <input type="submit" class="btn form_btn patient_form_btn" name="change_date" value="Save Changes">

                </div>

            </form>
                    
        </div>














                <table class="frame_table">
                    
                    <tr class="frame_header">

                        <th width="12.5%" class="frame_header_item">Time</th>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Sat')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Sat</th>

                        @else

                            <th width="12.5%" class="frame_header_item">Sat</th>

                        @endif




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Sun')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Sun</th>
                            
                        @else

                            <th width="12.5%" class="frame_header_item">Sun</th>

                        @endif




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Mon')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Mon</th>
                            
                        @else
    
                            <th width="12.5%" class="frame_header_item">Mon</th>
    
                        @endif




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Tue')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Tue</th>
                            
                            @else
    
                                <th width="12.5%" class="frame_header_item">Tue</th>
    
                            @endif




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Wed')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Wed</th>
                            
                        @else

                            <th width="12.5%" class="frame_header_item">Wed</th>

                        @endif




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Thu')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Thu</th>
                            
                        @else
    
                            <th width="12.5%" class="frame_header_item">Thu</th>
    
                        @endif




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Fri')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Fri</th>
                            
                        @else
    
                            <th width="12.5%" class="frame_header_item">Fri</th>
    
                        @endif

                    </tr>











                    @foreach($routine as $time)

                    <tr class="frame_rows">

                        <td class="frame_data" data-label="Time">{{$time->F}} - {{$time->T}}</td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Sat')

                            <td class="frame_data border_indicator_animation" data-label="Sat">

                        @else

                            <td class="frame_data disable shade" data-label="Sat">

                        @endif

                                @if($time->Sat=='A' || $time->Sat=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Sat}}</p>
                                    </a>
                                @elseif($time->Sat=='N/A' || $time->Sat=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Sat}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Sat}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Sun')

                            <td class="frame_data border_indicator_animation" data-label="Sun">

                        @else

                            <td class="frame_data disable shade" data-label="Sun">

                        @endif

                                @if($time->Sun=='A' || $time->Sun=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Sun}}</p>
                                    </a>
                                @elseif($time->Sun=='N/A' || $time->Sun=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Sun}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Sun}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Mon')

                            <td class="frame_data border_indicator_animation" data-label="Mon">

                        @else

                            <td class="frame_data disable shade" data-label="Mon">

                        @endif

                                @if($time->Mon=='A' || $time->Mon=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Mon}}</p>
                                    </a>
                                @elseif($time->Mon=='N/A' || $time->Mon=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Mon}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Mon}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Tue')

                            <td class="frame_data border_indicator_animation" data-label="Tue">

                        @else

                            <td class="frame_data disable shade" data-label="Tue">

                        @endif

                                @if($time->Tue=='A' || $time->Tue=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Tue}}</p>
                                    </a>
                                @elseif($time->Tue=='N/A' || $time->Tue=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Tue}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Tue}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Wed')

                            <td class="frame_data border_indicator_animation" data-label="Wed">

                        @else

                            <td class="frame_data disable shade" data-label="Wed">

                        @endif

                                @if($time->Wed=='A' || $time->Wed=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Wed}}</p>
                                    </a>
                                @elseif($time->Wed=='N/A' || $time->Wed=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Wed}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Wed}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Thu')

                            <td class="frame_data border_indicator_animation" data-label="Thu">

                        @else

                            <td class="frame_data disable shade" data-label="Thu">

                        @endif

                                @if($time->Thu=='A' || $time->Thu=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Thu}}</p>
                                    </a>
                                @elseif($time->Thu=='N/A' || $time->Thu=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Thu}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Thu}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('PATIENT_APPOINT_DAY')=='Fri')

                            <td class="frame_data border_indicator_animation" data-label="Fri">

                        @else

                            <td class="frame_data disable shade" data-label="Fri">

                        @endif

                                @if($time->Fri=='A' || $time->Fri=='a')
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_green">{{$time->Fri}}</p>
                                    </a>
                                @elseif($time->Fri=='N/A' || $time->Fri=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Fri}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/reception/set_time/'.$time->AI_ID)}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Fri}}</p>
                                    </a>
                                @endif

                            </td>




                    </tr>

                    @endforeach

                </table>







                <div class="gap"></div>


                <!--Patient info tab-->

                <div class="patient_and_doctor_info_one_is_to_one">

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

                        </div>

                    </div>





                    <!-- Billing -->

                    <div class="content_container">

                        <form action="{{url('/reception/patient_data_entry_for_doctor_appointment')}}" method="post" class="doctor_form">
                        @csrf
                                    
                            <!--<div class="doctor_form_element">
                                <p class="collected_info">Fee</p>
                                <input type="tel" class="input collected_info" name="fee" required>
                                <p class="collected_info">TK</p>
                            </div>-->

                            <div class="disNone">
                                <p class="collected_info">Holder Estimated Bill</p>
                                <input type="tel" class="input_less collected_info" id="fee" value="{{Session::get('BASIC_FEE')}}" readonly>
                            </div>
                            
                            <div class="doctor_form_element">
                                <p class="collected_info">Estimated Bill</p>
                                <input type="tel" class="input_less collected_info" name="paidAmount" id="estimate" readonly>
                            </div>
                            
                            <div class="doctor_form_element">
                                <p class="collected_info">Discount</p>
                                <input type="tel" class="input collected_info" name="discount" value="{{Session::get('DISCOUNT')}}" id="disc" oninput="calcDisc()" required>
                                <p class="collected_info">%</p>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Payment</p>
                                <select name="payment_status" id="payment_status" class="input collected_info" required>
                                    <option value="Paid">Paid</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Received</p>
                                <input type="tel" class="input collected_info" name="received" value="0" required>
                            </div>

                            <div class="doctor_form_element">
                                <p class="collected_info">Change</p>
                                <input type="tel" class="input collected_info" name="change" value="0" required>
                            </div>

                            <div class="doctor_form_element">
                                <span class="collected_info"></span>
                                <input type="submit" class="btn form_btn" name="enroll" value="Register">
                            </div>

                        </form>

                    </div>





                    <div class="content_container_bg_less">

                        <p class="section_title">Doctor Chosen</p>

                        <div class="info">

                            <p class="collected_info">Doctor's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('D_NAME')}}</p>

                            <p class="collected_info">Fee</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('BASIC_FEE')}}</p>

                            <p class="collected_info">Date</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_APPOINT_DATE')}}</p>

                            <p class="collected_info">Time</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_APPOINT_TIME')}}</p>

                        </div>

                    </div>

                </div>









@endsection

<!--------------------content end---------------------->

