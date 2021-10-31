@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (Scheduling Operations)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/ot/home/')}}" class="link">
        <i class="link_icons fas fa-window-maximize"></i>
        <span class="link_name"> Schedule </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/admission/list/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> New Entry </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/invoice/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Invoice </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/ot/home/')}}">Schedule</a>
    <a class="mobile_link" href="{{url('/ot/admission/list/')}}">New Entry</a>
    <a class="mobile_link" href="{{url('/ot/invoice/')}}">Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')



                <!--Session message-->

                @if(session('msg')=='Provided P_ID is non existent.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @endif



                    <!--entry patients-->

                    <form action="{{url('/ot/surgeon/selection')}}" class="content_container patient_info_form" method="post">
                    @csrf

                        <div class="patient_form_element">

                            <label for="patient_id" class="label">Patient's ID</label>
                            <input type="text" class="input" name="patient_id" value="{{Session::get('PATIENT_NAME')}}" required>

                        </div>

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element_one_is_to_one">
                                
                                <div class="patient_form_element">

                                    <label for="otno" class="label">OT No</label>
                                    <input type="tel" class="input"  name="otno" required>

                                </div>

                                <div class="patient_form_element">

                                    <label for="operationDate" class="label">Operation Date</label>
                                    <input type="date" class="input"  name="operationDate" required>

                                </div>

                            </div>

                            <div class="patient_form_element_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="operationTime" class="label">Operation Time</label>
                                    <input type="time" class="input"  name="operationTime" required>

                                </div>

                                <div class="patient_form_element">

                                    <label for="operationDuration" class="label">Est.Operation Duration</label>
                                    <input type="text" class="input"  name="operationDuration" required>

                                </div>

                            </div>

                        </div>

                        <div class="patient_form_element">

                            <label for="operationType" class="label">Operation Type</label>
                            <input type="text" class="input"  name="operationType" required>

                        </div>

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Select Surgeon" name="select_doctor">

                        </div>

                    </form>




@endsection

<!--------------------content end---------------------->
