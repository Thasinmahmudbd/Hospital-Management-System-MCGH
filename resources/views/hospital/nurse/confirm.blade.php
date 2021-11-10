@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Confirm Invigilator')






<!-----------------------link---------------------->

@section('links')

<li class="list_item">
    <a href="{{url('/nurse/home/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Patient List </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/nurse/doctor_selection')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> Reselect Invigilator</span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/nurse/home/')}}">Patient List</a>
</div>

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/nurse/doctor_selection')}}">Reselect</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')





                    <!--confirm surgeon-->

                    <div class="patient_form_element_one_is_to_100px">

                        <div class="content_container_bg_less">
        
                            <p><b>You have selected {{Session::get('D_NAME')}}</b></p>

                        </div>

                        <div class="content_nav">
        
                            <a href="{{url('/nurse/confirm/selection')}}" class="content_nav_link purple">Confirm</a>

                        </div>

                    </div>

                    <div class="purple_line"></div>
                    <div class="gap"></div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Patient Info</p>

                        <div class="info">

                            <p class="collected_info">Patients's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('patient_name')}}</p>

                        </div>

                    </div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Bed Info</p>

                        <div class="info">

                            <p class="collected_info">Bed No</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('bed_no')}}</p>

                            <p class="collected_info">Floor No</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('floor_no')}}</p>

                        </div>

                    </div>




@endsection

<!--------------------content end---------------------->
