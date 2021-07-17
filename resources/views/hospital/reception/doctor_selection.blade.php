@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Doctor Selection)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="#" class="link">
        <i class="link_icons fas fa-notes-medical"></i>
        <span class="link_name"> Accident and Emergency (A&E) </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="#">Accident and Emergency (A&E)</a>
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
                            <p class="collected_info">{{ Session::get('PATIENT_NAME') }}</p>

                            <p class="collected_info">Patient's Gender</p>
                            <p>:</p>
                            <p class="collected_info">{{ Session::get('PATIENT_GENDER') }}</p>

                            <p class="collected_info">Cell Number</p>
                            <p>:</p>
                            <p class="collected_info">{{ Session::get('PATIENT_CELL') }}</p>

                            <p class="collected_info">Patient ID</p>
                            <p>:</p>
                            <p class="collected_info">{{ Session::get('PATIENT_P_ID') }}</p>

                        </div>

                    </div>

                    <div class="content_container">

                        <p class="section_title">Doctor Chosen</p>

                        <div class="info">

                            <p class="collected_info">Doctor's Name</p>
                            <p>:</p>
                            <p class="collected_info">N/A</p>

                            <p class="collected_info">Fee</p>
                            <p>:</p>
                            <p class="collected_info">N/A</p>

                            <p class="collected_info">Time</p>
                            <p>:</p>
                            <p class="collected_info">N/A</p>

                            <p class="collected_info">Date</p>
                            <p>:</p>
                            <p class="collected_info">N/A</p>

                            <p class="collected_info">Discount</p>
                            <p>:</p>
                            <p class="collected_info">N/A</p>

                        </div>

                    </div>

                </div>




                <form action="" method="get" class="content_container patient_info_form">

                    <div class="doctor_search_form_element">

                        <label for="doctor_name_search" class="collected_info vanish_label">Search Doctor</label>
                        <input type="text" class="input" name="doctor_name_search" required>
                        <button type="submit" class="btn form_btn" name="search_doctor">Search</button>
    
                    </div>

                </form>




                <div class="doctors_list">

                @foreach($result as $list)

                    <form class="doctor_list_item" action="{{url('/reception/submit_doctor_selection')}}" method="post">
                    @csrf
                        <input type="hidden" name="d_id" value="{{$list->D_ID}}">
                        <input type="hidden" name="dr_name" value="{{$list->Dr_Name}}">
                        <input type="hidden" name="fee" value="{{$list->Basic_Fee}}">
                        <input type="hidden" name="p_id" value="{{Session::get('PATIENT_P_ID')}}">
                        <input type="hidden" name="r_id" value="{{Session::get('REC_SESSION_ID')}}">
                        <button type="submit" name="select_doctor" class="btn capsule">
                            <img class="round_image" src="Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png" alt="" width="100%">
                            <div class="doctor_name_dept">
                                <p class="doctor_name">{{$list->Dr_Name}}</p>
                                <p>{{$list->Specialty}}</p>
                            </div>
                        </button>
                    </form>

                @endforeach

                </div>

@endsection

<!--------------------content end---------------------->
