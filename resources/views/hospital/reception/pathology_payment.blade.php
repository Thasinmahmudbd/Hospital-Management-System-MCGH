@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Test Payment')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/cancel_test/pathology/')}}" class="link">
        <i class="link_icons fas fa-home"></i>
        <span class="link_name"> Go Home </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/reception/show_tests/pathology/'.Session::get('test_pathology'))}}" class="link">
        <i class="link_icons fas fa-plus-circle"></i>
        <span class="link_name"> Pathology </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/reception/show_tests/pathology/'.Session::get('test_hormone'))}}" class="link">
        <i class="link_icons fas fa-plus-circle"></i>
        <span class="link_name"> Hormone </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/reception/show_tests/pathology/'.Session::get('test_usg'))}}" class="link">
        <i class="link_icons fas fa-plus-circle"></i>
        <span class="link_name"> Ultrasonography </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/reception/show_tests/pathology/'.Session::get('test_xray'))}}" class="link">
        <i class="link_icons fas fa-plus-circle"></i>
        <span class="link_name"> X-Ray </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/reception/show_tests/pathology/'.Session::get('test_more'))}}" class="link">
        <i class="link_icons fas fa-plus-circle"></i>
        <span class="link_name"> Others </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/cancel_test/dental/')}}">Go Home</a>
        <a class="mobile_link" href="{{url('/reception/show_tests/dental/')}}">Add More</a>
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











            <!--Patient info tab-->

            <form action="{{url('/reception/submit/test/pathology/')}}" method="post" class="content_container_white_super_thin center_self">
            @csrf

            <div class="patient_and_doctor_info_one_is_to_one">

                <div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Patient Info</p>

                        <div class="info">

                            <p class="collected_info">Patient ID</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_P_ID')}}</p>

                            <p class="collected_info">Patient's Name</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_NAME')}}</p>

                            <p class="collected_info">Patient's Age</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_AGE')}}</p>

                            <p class="collected_info">Patient's Gender</p>
                            <p>:</p>
                            <p class="collected_info">{{Session::get('PATIENT_GENDER')}}</p>

                        </div>

                    </div>

                    <div class="content_container_bg_less">

                        <p class="section_title">Referred By</p>

                        <div class="info">

                            <p class="collected_info">Doctor</p>
                            <p>:</p>
                            <select name="doctor" class="input" required>
                                <option value="self">Self</option>   
                                @foreach($info as $list)
                                <option value="{{$list->D_ID}}">{{$list->Dr_Name}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>

                </div>




                <div>

                    <!--consultant info-->

                    <div class="content_container_bg_less">

                        <!--<p class="section_title">Delivery</p>

                        <div class="info">

                            <p class="collected_info">Date</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input type="date" class="input" name="del_date" value="{{Session::get('DATE_TODAY')}}">
                            </p>

                        </div>

                        <div class="gap"></div>-->

                        <p class="section_title">Billing Info</p>

                        <div class="info">

                            <p class="collected_info">Total Bill</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input type="tel" class="disNone" id="fee" value="{{Session::get('Pathology_Test_Total_Fee')}}" readonly>
                                <input class="input disable shade" type="text" name="calculated_bill" value="{{Session::get('Pathology_Test_Total_Fee')}}" id="estimate" required>
                            </p>

                            <p class="collected_info">Payment Status</p>
                            <p>:</p>
                            <p class="collected_info">
                                <select name="payment_status" class="input" required>
                                    <option value="Paid">Paid</option>
                                    <option value="Due">Due</option>
                                </select>
                            </p>

                            <p class="collected_info">Discount</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="discount" id="disc" oninput="calcDisc()" value="0" required>
                            </p>

                            <p class="collected_info">Received</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="received" oninput="calcAppointmentFee()" id="r2" value="0" required>
                            </p>

                            <p class="collected_info">Change</p>
                            <p>:</p>
                            <p class="collected_info">
                                <input class="input" type="text" name="change" id="c2" value="0" required>
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

                <!--Showing all of pathologic tests-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Selected Tests</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="50%" class="frame_header_item">Test Name</th>
                        <th width="20%" class="frame_header_item">Group</th>
                        <th width="20%" class="frame_header_item">Test Fee</th>
                        <th width="5%" class="frame_header_item">Action</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($logs as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="Test Name">{{$list->Test_Name}}</td>
                        <td class="frame_data" data-label="Test Name">{{$list->Groups}}</td>
                        <td class="frame_data" data-label="Test Fee">{{$list->Test_Fee}}</td>

                        <td class="frame_action" data-label="Action">
                            <a href="{{url('/reception/unselect/test/pathology/'.$list->AI_ID)}}">
                                <i class="table_btn_red fas fa-times-circle"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>




            </form>









@endsection

<!--------------------content end---------------------->

