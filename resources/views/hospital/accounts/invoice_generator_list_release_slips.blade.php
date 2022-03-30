@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Invoice Generator')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/accounts/home/')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> My Profile </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/doctor/income/')}}" class="link">
        <i class="link_icons fas fa-hand-holding-usd"></i>
        <span class="link_name"> Doctor's Income </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/cash/in/'.Session::get('DATE_TODAY'))}}" class="link">
        <i class="link_icons fas fa-cash-register"></i>
        <span class="link_name"> Cash In </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/pay/salary/'.Session::get('pay_salary_person'))}}" class="link">
        <i class="link_icons fas fa-credit-card"></i>
        <span class="link_name"> Pay Salary </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/creditors/')}}" class="link">
        <i class="link_icons fas fa-search-dollar"></i>
        <span class="link_name"> Creditors </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/patient/release/')}}" class="link">
        <i class="link_icons fas fa-hospital-user"></i>
        <span class="link_name"> Patient Release </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/release/slips/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Release Slips </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/ambulance/')}}" class="link">
        <i class="link_icons fas fa-ambulance"></i>
        <span class="link_name"> Ambulance </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/other/transactions/')}}" class="link">
        <i class="link_icons fas fa-random"></i>
        <span class="link_name"> Other Transactions </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> Logs </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/edit_profile/')}}" class="link">
        <i class="link_icons fas fa-user-edit"></i>
        <span class="link_name"> Edit Profile </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/accounts/home/')}}">My Profile</a>
    <a class="mobile_link" href="{{url('/accounts/doctor/income/')}}">Doctors Income</a>
    <a class="mobile_link" href="{{url('/accounts/cash/in/'.Session::get('DATE_TODAY'))}}">Cash In</a>
    <a class="mobile_link" href="{{url('/accounts/pay/salary/'.Session::get('pay_salary_person'))}}">Pay Salary</a>
    <a class="mobile_link" href="{{url('/accounts/creditors/')}}">Creditors</a>
    <a class="mobile_link" href="{{url('/accounts/patient/release/')}}">Patient Release</a>
    <a class="mobile_link" href="{{url('/accounts/release/slips/')}}">Release Slips</a>
    <a class="mobile_link" href="{{url('/accounts/ambulance/')}}">Ambulance</a>
    <a class="mobile_link" href="{{url('/accounts/other/transactions/')}}">Other Transactions</a>
    <a class="mobile_link" href="{{url('/accounts/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/accounts/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')


                <div class="patient_and_doctor_info_one_is_to_one">

                    <div class="content_nav">
        
                        <a href="{{url('/accounts/toggle/hook/yes')}}" class="content_nav_link">Admission slip with OT bill</a>
                        <a href="{{url('/accounts/release/slips/')}}" class="content_nav_link">Only admission slips</a>

                    </div>

                    <!--Search bar to search patients-->

                    <form action="{{url('/accounts/find_patient/by_search/invoice/release/slips/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Patient full ID, cell number or doctor name." required>
                            <button type="submit" class="btn form_btn" name="search_old_patient">Search</button>

                        </div>

                    </form>

                </div>



            @if(Session::get('INVOICE')=='1')

                @if(Session::get('SEARCH_RESULT')=='1')

                <div class="purple_line"></div>
                <div class="gap"></div>

                <!--Showing todays patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Search Result</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="12%" class="frame_header_item">P-ID</th>
                        <th width="18%" class="frame_header_item">Patient Name</th>
                        <th width="15%" class="frame_header_item">Cell</th>
                        <th width="15%" class="frame_header_item">Admission Date</th>
                        <th width="15%" class="frame_header_item">Discharge Date</th>
                        @if(Session::get('ot_related_hook')=='yes')
                        <th width="10%" class="frame_header_item">OT Copy</th>
                        <th width="10%" class="frame_header_item">Release Copy</th>
                        @else
                        <th width="10%" class="frame_header_item">Release Copy</th>
                        @endif
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Admission Date">{{$list->Admission_Date}}</td>
                        <td class="frame_data" data-label="Discharge Date">{{$list->Discharge_Date}}</td>

                        @if(Session::get('ot_related_hook')=='yes')
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/accounts/collect/ot/release/slips/'.$list->O_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/accounts/collect/admission/release/slips/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/accounts/collect/admission/release/slips/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>
                        @endif


                    </tr>

                    @endforeach

                </table>



                <div class="gap"></div>

                @else

                <div class="purple_line"></div>
                <div class="gap"></div>

                <div class="warning_msg content_container_bg_less_thin">

                    <p class="text_center">No one here.</p>

                </div>

                @endif



            @elseif(Session::get('INVOICE')=='0')


                <div class="purple_line"></div>
                <div class="gap"></div>


                <!--Showing all patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Bills</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="12%" class="frame_header_item">P-ID</th>
                        <th width="18%" class="frame_header_item">Patient Name</th>
                        <th width="15%" class="frame_header_item">Cell</th>
                        <th width="15%" class="frame_header_item">Admission Date</th>
                        <th width="15%" class="frame_header_item">Discharge Date</th>
                        @if(Session::get('ot_related_hook')=='yes')
                        <th width="10%" class="frame_header_item">OT Copy</th>
                        <th width="10%" class="frame_header_item">Release Copy</th>
                        @else
                        <th width="10%" class="frame_header_item">Release Copy</th>
                        @endif
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($all as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Admission Date">{{$list->Admission_Date}}</td>
                        <td class="frame_data" data-label="Discharge Date">{{$list->Discharge_Date}}</td>

                        @if(Session::get('ot_related_hook')=='yes')
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/accounts/collect/ot/release/slips/'.$list->O_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/accounts/collect/admission/release/slips/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/accounts/collect/admission/release/slips/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>
                        @endif

                    </tr>

                    @endforeach

                </table>

            @endif















@endsection

<!--------------------content end---------------------->