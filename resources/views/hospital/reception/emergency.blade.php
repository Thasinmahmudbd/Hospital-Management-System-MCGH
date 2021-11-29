@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Emergency)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/home/')}}" class="link">
        <i class="link_icons fas fa-window-maximize"></i>
        <span class="link_name"> Patient Entry </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/emergency/')}}" class="link">
        <i class="link_icons fas fa-first-aid"></i>
        <span class="link_name"> Emergency </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/patient_list/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Patients List </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/invoice_list/appointment/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Generate Invoice </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/home/')}}">Patient Entry</a>
    <a class="mobile_link" href="{{url('/reception/emergency/')}}">Emergency</a>
    <a class="mobile_link" href="{{url('/reception/patient_list/')}}">Patients List</a>
    <a class="mobile_link" href="{{url('/reception/invoice_list/appointment/')}}">Generate Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

    <!--Patient info tab-->

    <div class="patient_and_doctor_info_one_is_to_one">






        <!-- Billing -->

        <div class="content_container_bg_less">

            <p class="section_title">Patient Info</p>

            <form action="{{url('/reception/emergency/data/entry/')}}" method="post" class="doctor_form">
            @csrf

                <div class="info">
                    <p class="collected_info">Patient Name</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info"  placeholder="Insert Patient Name" name="er_patient_name">
                </div>

                <div class="info">
                    <p class="collected_info">Reference Name</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info"  placeholder="Insert Reference Name" name="ref_name">
                </div>

                <div class="info">
                    <p class="collected_info">Reference Cell</p>
                    <p>:</p>
                    <input type="text" class="input_less collected_info"  placeholder="Insert Reference Cell" name="ref_cell">
                </div>

                <div class="info">
                    <p class="collected_info">DMO</p>
                    <p>:</p>
                    <select name="dmo" class="input collected_info" required>
                        @foreach($info as $list)
                        <option value="{{$list->D_ID}}">{{$list->Dr_Name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="info">
                    <p class="collected_info">Bill</p>
                    <p>:</p>
                    <input type="tel" class="input_less collected_info" name="bill" id="estimate" value="{{Session::get('emergency_fee')}}" readonly>
                </div>

                <div class="info">
                    <p class="collected_info">Received</p>
                    <p>:</p>
                    <input type="tel" class="input collected_info" name="received" oninput="calcAppointmentFee()" id="r2" value="0" required>
                </div>

                <div class="info">
                    <p class="collected_info">Change</p>
                    <p>:</p>
                    <input type="tel" class="input collected_info" name="change" id="c2" value="0" required>
                </div>

                <div class="info">
                    <span class="collected_info"></span>
                    <p></p>
                    <input type="submit" class="btn form_btn" name="enlist" value="Enlist Patient">
                </div>

            </form>

        </div>











    </div>

@endsection

<!--------------------content end---------------------->
