@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Patient Info)')






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

                <!--Search bar to search old patients-->

                <form action="{{url('/reception/find_old_patient/by_search')}}" method="post" class="content_container patient_info_form">
                @csrf

                    <div class="doctor_search_form_element">

                        <label for="old_patient_search_info" class="collected_info vanish_label">Search Old Patients</label>

                        <div class="patient_and_doctor_info_one_is_to_one">
                            <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Patient full ID">
                            <input type="text" class="input" name="old_patient_cell" placeholder="Or Mobile">                      
                        </div>

                        <button type="submit" class="btn form_btn" name="search_old_patient">Search</button>

                    </div>

                </form>




                <div class="purple_line"></div>
                <div class="gap"></div>




                <!--Session message-->

                @if(session('msg')=='Patient Entry Successful.')

                    <div class="content_container text_center success_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Patient Admission Successful.')

                    <div class="content_container text_center success_msg">{{session('msg')}}</div> 

                @elseif(session('msg')=='Appointment Canceled.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Patient Found.')

                    <div class="content_container text_center success_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Patient Not Found.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Admission Canceled.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @endif






                <!--results if patient is old patient-->

                @if(Session::get('PATIENT_TYPE')=='old')

                    @if(Session::get('PATIENT_FOUND_BY')=='id')

                    <!--admit old patients-->

                    <form action="{{url('/reception/submit_basic_patient_info')}}" class="content_container patient_info_form" method="post">
                    @csrf

                        <p>Old Patient Entry</p>

                        <div class="patient_form_element">

                            <label for="patient_name" class="label">Patient's Name</label>
                            <input type="text" class="input disable shade" name="patient_name" value="{{Session::get('PATIENT_NAME')}}" required>

                        </div>

                        <div class="patient_form_element_one_is_to_three">

                            <div class="patient_form_element">

                                <label for="patient_gender" class="label">Patient's Gender</label>
                                <select name="patient_gender" id="patient_gender" class="input disable shade" required>
                                    <option value="{{Session::get('PATIENT_GENDER')}}">{{Session::get('PATIENT_GENDER')}}</option>
                                </select>

                            </div>

                            <div class="patient_form_element_one_is_to_three">

                                <div class="patient_form_element">

                                    <label for="age" class="label">Age</label>
                                    <input type="tel" class="input disable shade"  name="age" value="{{Session::get('PATIENT_AGE')}}" required>

                                </div>
                                
                                <div class="patient_form_element">

                                    <label for="cell_number" class="label">Cell Number</label>
                                    <input type="tel" class="input disable shade"  name="cell_number" value="{{Session::get('PATIENT_CELL')}}" required>

                                </div>

                            </div>

                        </div>

                        <div class="patient_form_element_one_is_to_three">

                            <div class="patient_form_element">

                                <label for="nid_type" class="label">NID Type</label>
                                <select name="nid_type" id="nid_type" class="input disable shade" required>
                                    <option value="{{Session::get('PATIENT_NID_TYPE')}}">{{Session::get('PATIENT_NID_TYPE')}}</option>
                                </select>

                            </div>

                            <div class="patient_form_element">

                                <label for="nid" class="label">NID Number</label>
                                <input type="tel" class="input disable shade"  name="nid"  value="{{Session::get('PATIENT_NID')}}">

                            </div>

                        </div>

                        <div class="patient_form_element_one_is_to_three">

                            <div class="patient_form_element">

                                <label for="appoint_date" class="label">Date</label>
                                <input type="date" class="input"  name="appoint_date" value="{{Session::get('DATE_TODAY')}}" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="ap_type" class="label">Service Type</label>
                                <select name="ap_type" id="ap_type" class="input" required>
                                    <option value="Appoint-Doctor">Appoint Doctor</option>
                                    <option value="Admit">Admit Patient</option>
                                    <option value="Test">Test</option>
                                </select>

                            </div>

                        </div>

                        <input type="hidden" value="old" name="patient_type">

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Next" name="select_doctor">

                        </div>

                    </form>

                    @elseif(Session::get('PATIENT_FOUND_BY')=='cell')

                    <table class="frame_table">

                        <tr class="frame_header">
                            <th width="10%" class="frame_header_item">S/N</th>
                            <th width="40%" class="frame_header_item">P-ID</th>
                            <th width="40%" class="frame_header_item">Patient Name</th>
                            <th width="10%" class="frame_header_item">Select</th>
                        </tr>

                        <?php $serial = 1; ?>
                        @foreach($via_cell as $list)

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                            <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                            <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>

                            <td class="frame_action" data-label="Select">
                                <a href="{{url('/reception/parse/old/patient/data/'.$list->P_ID)}}">
                                    <i class="table_btn fas fa-print"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach

                    </table>

                    @endif

                @else

                <!--admit new patients-->

                <form action="{{url('/reception/submit_basic_patient_info')}}" class="content_container patient_info_form" method="post">
                @csrf

                    <p>New Patient Entry</p>

                    <div class="patient_form_element">

                        <label for="patient_name" class="label">Patient's Name</label>
                        <input type="text" class="input" name="patient_name" required>

                    </div>

                    <div class="patient_form_element_one_is_to_three">

                        <div class="patient_form_element">

                            <label for="patient_gender" class="label">Patient's Gender</label>
                            <select name="patient_gender" id="patient_gender" class="input" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                                <option value="Child">Child</option>
                            </select>

                        </div>

                        <div class="patient_form_element_one_is_to_three">

                            <div class="patient_form_element">

                                <label for="age" class="label">Age</label>
                                <input type="tel" class="input"  name="age" required>

                            </div>
                            
                            <div class="patient_form_element">

                                <label for="cell_number" class="label">Cell Number</label>
                                <input type="tel" class="input"  name="cell_number" required>

                            </div>

                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_three">

                        <div class="patient_form_element">

                            <label for="nid_type" class="label">NID Type</label>
                            <select name="nid_type" id="nid_type" class="input" required>
                                <option value="None">None</option>
                                <option value="Own">Own</option>
                                <option value="Guardian">Guardian</option>
                            </select>

                        </div>

                        <div class="patient_form_element">

                            <label for="nid" class="label">NID Number</label>
                            <input type="tel" class="input"  name="nid">

                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_three">

                        <div class="patient_form_element">

                            <label for="appoint_date" class="label">Date</label>
                            <input type="date" class="input"  name="appoint_date" value="{{Session::get('DATE_TODAY')}}" required>

                        </div>

                        <div class="patient_form_element">

                            <label for="ap_type" class="label">Service Type</label>
                            <select name="ap_type" id="ap_type" class="input" required>
                                <option value="Appoint-Doctor">Appoint Doctor</option>
                                <option value="Admit">Admit Patient</option>
                                <option value="Dental">Dental</option>
                                <option value="Test">Test</option>
                            </select>

                        </div>

                    </div>

                    <input type="hidden" value="new" name="patient_type">

                    <div class="patient_form_element">

                        <input type="submit" class="btn patient_form_btn form_btn"  value="Next" name="select_doctor">

                    </div>

                </form>

                @endif

@endsection

<!--------------------content end---------------------->
