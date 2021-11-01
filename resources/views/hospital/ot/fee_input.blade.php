@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (Fees Input)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('')}}" class="link">
        <i class="link_icons far fa-window-close"></i>
        <span class="link_name"> Cancel Entry </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/doctor_selection')}}" class="link">
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
    <a href="{{url('/ot/invoice/')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Assistant </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/invoice/')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Nurse </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('')}}">Cancel Entry</a>
    <a class="mobile_link" href="{{url('/reception/doctor_selection')}}">Pick Surgeon</a>
    <a class="mobile_link" href="{{url('/ot/show/anesthesiologist/list')}}">Pick Anesthesiologist</a>
    <a class="mobile_link" href="{{url('')}}">Pick Assistant</a>
    <a class="mobile_link" href="{{url('')}}">Pick Nurse</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')




                    <!--surgeon info-->

                    @if(Session::get('fee_input_type')=='surgeon' || Session::get('fee_input_type')=='anesthesiologist')

                    <div class="patient_form_element_one_is_to_100px">

                        <div class="content_container_bg_less">

                            @if(Session::get('fee_input_type')=='surgeon')
        
                            <p>You have selected {{Session::get('D_NAME')}}</p>

                            @elseif(Session::get('fee_input_type')=='anesthesiologist')
        
                            <p>You have selected {{Session::get('Anesthesiologist_Name')}}</p>

                            @endif

                        </div>

                        <div class="content_nav">

                            @if(Session::get('fee_input_type')=='surgeon')
        
                            <a href="{{url('/reception/doctor_selection')}}" class="content_nav_link purple">Reselect</a>

                            @elseif(Session::get('fee_input_type')=='anesthesiologist')
        
                            <a href="{{url('/ot/show/anesthesiologist/list')}}" class="content_nav_link purple">Reselect</a>

                            @endif

                        </div>

                    </div>

                    <div class="purple_line"></div>
                    <div class="gap"></div>

                    @endif




                    <!--entry surgeon fee-->

                    @if(Session::get('fee_input_type')=='surgeon')
        
                    <form action="{{url('/ot/surgeon/fee/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                    @elseif(Session::get('fee_input_type')=='anesthesiologist')

                    <form action="{{url('/ot/anesthesiologist/fee/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                    @endif

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




@endsection

<!--------------------content end---------------------->
