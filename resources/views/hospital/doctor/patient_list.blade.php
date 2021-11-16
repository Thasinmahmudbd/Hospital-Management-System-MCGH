@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','My Patients')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/doctor/home/')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> My Profile </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/patients/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> My Patients </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/schedule/')}}" class="link">
        <i class="link_icons fas fa-calendar-alt"></i>
        <span class="link_name"> My Schedule </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/operation/schedule/')}}" class="link">
        <i class="link_icons fas fa-calendar-alt"></i>
        <span class="link_name"> Operation Schedule </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> My Logs </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/edit_profile/')}}" class="link">
        <i class="link_icons fas fa-user-edit"></i>
        <span class="link_name"> Edit Profile </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/doctor/home/')}}">My Profile</a>
    <a class="mobile_link" href="{{url('/doctor/patients/')}}">My Patients</a>
    <a class="mobile_link" href="{{url('/doctor/schedule/')}}">My Schedule</a>
    <a class="mobile_link" href="{{url('/doctor/operation/schedule/')}}">Operation Schedule</a>
    <a class="mobile_link" href="{{url('/doctor/log/')}}">My Logs</a>
    <a class="mobile_link" href="{{url('/doctor/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')



                <p class="span_hidden_bar">

                    <b class="content_container_bg_less_thin">Search patient & add them as treated. Total appointments today :</b>

                    <span class="text_center table_item_orange content_container_bg_less_thin">

                        {{Session::get('UNTREATED')}}

                    </span>

                </p>




                <!-- patient search -->
                <form action="{{url('/doctor/search_patient/')}}" method="post" class="content_container patient_info_form">
                @csrf

                    <div class="doctor_search_form_element">

                        <label for="p_id" class="collected_info vanish_label">Search Patient</label>

                        <div class="patient_and_doctor_info_one_is_to_one">

                            <input type="text" class="input" name="p_id" placeholder="Enter P_ID" required>
                            <input type="text" class="input" name="random_code" placeholder="Enter R-C" required>

                        </div>

                        <button type="submit" class="btn form_btn" name="search_patient">Find</button>
    
                    </div>

                </form>



                <!--Session message-->
                @if(session('msg')=='Sorry, but none fits your description.')

                    <div class="content_container_bg_less_thin text_center warning_msg">{{session('msg')}}</div> 

                @elseif(session('msg')=='Congratulation, list has been updated.')

                    <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div> 

                @endif
                


                @if(Session::get('PATIENT_SEARCH_RESULT')=='positive')

                    @foreach($result as $list)

                    <form action="{{url('/doctor/set_patient_as_treated/')}}" class="patient_and_doctor_info_one_is_to_one" method="post">
                    @csrf

                        <div class="content_container_bg_less info">

                            <p class="collected_info">Patient Name</p>
                            <p>:</p>
                            <p class="collected_info">{{$list->Patient_Name}}</p>

                            <p class="collected_info">Patient Gender</p>
                            <p>:</p>
                            <p class="collected_info">{{$list->Patient_Gender}}</p>

                            <p class="collected_info">Appointment Date</p>
                            <p>:</p>
                            <p class="collected_info">{{$list->Ap_Date}}</p>

                            <input type="hidden" value="{{$list->P_ID}}" name="p_id">

                        </div>

                        <div class="patient_form_element">

                            <button type="submit" class="btn content_container_bg_less form_btn" name="select_doctor">I, {{Session::get('DOCTORS_NAME')}},<br> have treated this person on {{Session::get('DATE_TODAY')}},<br> at {{Session::get('CURRENT_TIME')}}.</button>

                        </div>

                    </form>

                    @endforeach

                @endif


                <div class="purple_line"></div>

                <span class="gap"></span>






                <p class="span_hidden_bar">

                    <b class="content_container_bg_less_thin">Patients you've treated today :</b>

                    <span class="text_center table_item_orange content_container_bg_less_thin">

                        {{Session::get('TREATED')}}

                    </span>

                </p>





                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="40%" class="frame_header_item">P-ID</th>
                        <th width="40%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Gender</th>
                    </tr>

                    @foreach($patients as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Gender">{{$list->Patient_Gender}}</td>
                    </tr>

                    @endforeach

                </table>













@endsection

<!--------------------content end---------------------->
