@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (New Entry)')






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

                    <form action="{{url('/ot/submit/entry')}}" class="content_container patient_info_form" method="post">
                    @csrf

                        <div class="patient_form_element">

                            <label for="patient_name" class="label">Patient's Name</label>
                            <input type="text" class="input shade disable" name="patient_name" value="{{session('OT_NEW_ENTRY_P_NAME')}}" required>

                        </div>

                        <div class="patient_form_element_one_is_to_one">

                            <div class="patient_form_element_one_is_to_one">
                                
                                <div class="patient_form_element">

                                    <label for="otno" class="label">OT No</label>
                                    <input type="tel" class="input"  name="otno" required>

                                </div>

                                <div class="patient_form_element">

                                    <label for="o_date" class="label">Operation Date</label>
                                    <input type="date" class="input"  name="o_date" required>

                                </div>

                            </div>

                            <div class="patient_form_element_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="o_time" class="label">Operation Start Time</label>
                                    <input type="time" class="input"  name="o_time" required>

                                </div>

                                <div class="patient_form_element">

                                    <label for="o_duration" class="label">Operation Duration</label>
                                    <input type="text" class="input"  name="o_duration" placeholder="00 hr 00 min" required>

                                </div>

                            </div>

                            <div class="patient_form_element">

                                <label for="o_type" class="label">Operation Type</label>
                                <input type="text" class="input"  name="o_type" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="a_type" class="label">Anesthesia Type</label>
                                <input type="text" class="input"  name="a_type" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="ot_charge" class="label">OT Charge</label>
                                <input type="text" class="input"  name="ot_charge" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="ot_charge_discount" class="label">OT Charge Discount</label>
                                <input type="text" class="input"  name="ot_charge_discount" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="others" class="label">Others</label>
                                <input type="text" class="input"  name="others" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="other_charges" class="label">Other Charges</label>
                                <input type="text" class="input"  name="other_charges" required>

                            </div>

                        </div>

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Select Surgeon" name="select_doctor">

                        </div>

                    </form>




@endsection

<!--------------------content end---------------------->
