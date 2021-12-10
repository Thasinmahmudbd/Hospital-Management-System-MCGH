@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Due Payment')






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

@if(Session::get('DUE_TYPE')=='dental')

<li class="list_item">
    <a href="{{url('/reception/invoice_list/dental/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Generate Invoice </span>
    </a>
</li>

@elseif(Session::get('DUE_TYPE')=='pathology')

<li class="list_item">
    <a href="{{url('/reception/invoice_list/pathology/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Generate Invoice </span>
    </a>
</li>

@endif

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/home/')}}">Patient Entry</a>
    <a class="mobile_link" href="{{url('/reception/emergency/')}}">Emergency</a>
    <a class="mobile_link" href="{{url('/reception/patient_list/')}}">Patients List</a>

    @if(Session::get('DUE_TYPE')=='dental')
    <a class="mobile_link" href="{{url('/reception/invoice_list/dental/')}}">Generate Invoice</a>
    @elseif(Session::get('DUE_TYPE')=='pathology')
    <a class="mobile_link" href="{{url('/reception/invoice_list/pathology/')}}">Generate Invoice</a>
    @endif
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')















            <!--Patient info tab-->
            @if(Session::get('DUE_TYPE')=='dental')

            <form action="{{url('/reception/submit/test/dental/dues/')}}" method="post" class="content_container_white_super_thin center_self">
            @csrf

            @elseif(Session::get('DUE_TYPE')=='pathology')

            <form action="{{url('/reception/submit/test/pathology/dues/')}}" method="post" class="content_container_white_super_thin center_self">
            @csrf

            @endif

            <div class="patient_and_doctor_info_one_is_to_one">

                <div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Patient Info</p>

                        <div class="info">

                            <p class="collected_info">Patient ID</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('due_p_id')}}</p>

                            <p class="collected_info">Patient's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('due_p_name')}}</p>

                            <p class="collected_info">Patient's Age</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('due_p_age')}}</p>

                            <p class="collected_info">Patient's Gender</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('due_p_gender')}}</p>

                        </div>

                    </div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Referred By</p>

                        <div class="info">

                            @if(Session::get('DUE_TYPE')=='dental')
                            <p class="collected_info">Dentist</p>
                            @elseif(Session::get('DUE_TYPE')=='pathology')
                            <p class="collected_info">Refer</p>
                            @endif
                            <p>:</p>
                            <p class="collected_info">{{Session::get('due_d_name')}}</p>

                        </div>

                    </div>

                </div>




                <div>

                    <!--consultant info-->

                    <div class="content_container_bg_less">

                        @if(Session::get('DUE_TYPE')=='pathology')

                        <p class="section_title">Delivery</p>

                        <div class="info">

                            <p class="collected_info">Date</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input type="date" class="input disable shade" value="{{Session::get('DATE_TODAY')}}" readonly>
                            </p>

                        </div>

                        <div class="gap"></div>

                        @endif

                        <p class="section_title">Billing Info</p>

                        <div class="info">

                            <p class="collected_info">Payable Bill</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input disable shade" type="text" value="{{Session::get('bill')}}" readonly>
                            </p>

                            <p class="collected_info">Previously Paid</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input disable shade" type="text" value="{{Session::get('paid')}}" readonly>
                                <input type="hidden"  name="paid" value="{{Session::get('paid')}}">
                            </p>

                            <p class="collected_info">Due</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input type="tel" class="disNone" id="fee" value="{{Session::get('total_amount')}}" readonly>
                                <input class="input disable shade" type="text" name="calculated_bill" value="{{Session::get('total_amount')}}" id="estimate" required>
                                <input class="disNone" type="text"  id="disc" oninput="calcDisc()" value="0" readonly>
                                <input type="hidden"  name="dtn" value="{{Session::get('dtn')}}">
                            </p>

                            <p class="collected_info">Discount</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input disable shade" type="text" value="{{Session::get('discount')}}%" readonly>
                            </p>

                            <p class="collected_info">Received</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="received" oninput="calcAppointmentFee()" id="r2" value="0" required>
                                <input type="hidden"  name="previously_received" value="{{Session::get('previously_received')}}">
                            </p>

                            <p class="collected_info">Change</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="change" id="c2" value="0" required>
                                <input type="hidden"  name="previously_change" value="{{Session::get('previously_change')}}">
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








                <!--Selected tests-->

                <div class="gap"></div>

                <!--Showing all of dental tests-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Selected Tests</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>

                        @if(Session::get('DUE_TYPE')=='dental')
                        <th width="55%" class="frame_header_item">Test Name</th>
                        <th width="20%" class="frame_header_item">Rate</th>
                        @elseif(Session::get('DUE_TYPE')=='pathology')
                        <th width="50%" class="frame_header_item">Test Name</th>
                        <th width="25%" class="frame_header_item">Groups</th>
                        @endif

                        <th width="20%" class="frame_header_item">Fee</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($logs as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="Test Name">{{$list->Test_Name}}</td>

                        @if(Session::get('DUE_TYPE')=='dental')
                        <td class="frame_data" data-label="Rate">{{$list->Rate}}</td>
                        @elseif(Session::get('DUE_TYPE')=='pathology')
                        <td class="frame_data" data-label="Groups">{{$list->Groups}}</td>
                        @endif

                        <td class="frame_data" data-label="Fee">{{$list->Fee}}</td>
                    </tr>

                    @endforeach

                </table>




            </form>









@endsection

<!--------------------content end---------------------->

