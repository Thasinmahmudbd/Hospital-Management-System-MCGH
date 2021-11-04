@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (Fees Input)')






<!-----------------------link---------------------->

@section('links')

<li class="list_item">
    <a href="{{url('/ot/new/entry/all/data')}}" class="link">
        <i class="link_icons fas fa-th-list"></i>
        <span class="link_name"> Go To List </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/doctor_selection')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Surgeon </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/show/anesthesiologist/list')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Anesthesiologist </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/show/nurse/list')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Nurse </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/assistant/data/collection')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Assistant </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/ot/new/entry/cancel')}}" class="link">
        <i class="link_icons far fa-window-close"></i>
        <span class="link_name"> Cancel Entry </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/ot/new/entry/all/data')}}">Go To List</a>
    <a class="mobile_link" href="{{url('/ot/doctor_selection')}}">Pick Surgeon</a>
    <a class="mobile_link" href="{{url('/ot/show/anesthesiologist/list')}}">Pick Anesthesiologist</a>
    <a class="mobile_link" href="{{url('/ot/show/nurse/list')}}">Pick Nurse</a>
    <a class="mobile_link" href="{{url('/ot/assistant/data/collection')}}">Pick Assistant</a>
    <a class="mobile_link" href="{{url('/ot/new/entry/cancel')}}">Cancel Entry</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')




                    <!--surgeon info-->

                    @if(Session::get('fee_input_type')=='surgeon' || Session::get('fee_input_type')=='anesthesiologist'  || Session::get('fee_input_type')=='nurse')

                    <div class="patient_form_element_one_is_to_100px">

                        <div class="content_container_bg_less">

                            @if(Session::get('fee_input_type')=='surgeon')
        
                            <p><b>You have selected {{Session::get('D_NAME')}}</b></p>

                            @elseif(Session::get('fee_input_type')=='anesthesiologist')
        
                            <p><b>You have selected {{Session::get('Anesthesiologist_Name')}}</b></p>

                            @elseif(Session::get('fee_input_type')=='nurse')
        
                            <p><b>You have selected {{Session::get('Nurse_Name')}}</b></p>

                            @endif

                        </div>

                        <div class="content_nav">

                            @if(Session::get('fee_input_type')=='surgeon')
        
                            <a href="{{url('/ot/doctor_selection')}}" class="content_nav_link purple">Reselect</a>

                            @elseif(Session::get('fee_input_type')=='anesthesiologist')
        
                            <a href="{{url('/ot/show/anesthesiologist/list')}}" class="content_nav_link purple">Reselect</a>

                            @elseif(Session::get('fee_input_type')=='nurse')
        
                            <a href="{{url('/ot/show/nurse/list')}}" class="content_nav_link purple">Reselect</a>

                            @endif

                        </div>

                    </div>

                    <div class="purple_line"></div>
                    <div class="gap"></div>

                    @endif




                    <!--entry surgeon/anesthesiologist fee-->

                    @if(Session::get('fee_input_type')=='surgeon')
        
                    <form action="{{url('/ot/surgeon/fee/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                    @elseif(Session::get('fee_input_type')=='anesthesiologist')

                    <form action="{{url('/ot/anesthesiologist/fee/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                    @endif

                    @if(Session::get('fee_input_type')=='surgeon' || Session::get('fee_input_type')=='anesthesiologist')

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="fee" class="label">Fee</label>
                                <input type="text" class="input" name="fee" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="discount" class="label">Discount</label>
                                <input type="text" class="input" name="discount" placeholder="BDT" required>

                            </div>

                        </div>

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Next" name="Next">

                        </div>

                    </form>

                    @endif


                    <!--entry nurse fee-->
                    @if(Session::get('fee_input_type')=='nurse')

                    <form action="{{url('/ot/nurse/fee/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="fee" class="label">Fee</label>
                                <input type="text" class="input" name="fee" required>

                            </div>

                            <span></span>

                        </div>

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Next" name="Next">

                        </div>

                    </form>

                    <!--entry assistant data-->
                    @elseif(Session::get('fee_input_type')=='assistant')

                    <form action="{{url('/ot/assistant/data/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="fee" class="label">Assistant Name</label>
                                <input type="text" class="input" name="name" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="fee" class="label">Assistant Fee</label>
                                <input type="text" class="input" name="fee" required>

                            </div>

                        </div>

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Next" name="Next">

                        </div>

                    </form>

                    @endif




@endsection

<!--------------------content end---------------------->
