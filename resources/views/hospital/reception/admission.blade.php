@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Admission Info)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/cancel/before/bed')}}" class="link">
        <i class="link_icons far fa-window-close"></i>
        <span class="link_name"> Cancel Admission </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/cancel/before/bed')}}">Cancel Admission</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <!--Session message-->

                @if(session('msg')=='Patient Entry Successful.')

                    <div class="content_container text_center success_msg">{{session('msg')}}</div> 

                @elseif(session('msg')=='Appointment Canceled.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Patient Found.')

                    <div class="content_container text_center success_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Patient Not Found.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @endif






                <!--results if patient is old patient-->

                <!--@if(Session::get('PATIENT_TYPE')=='old')

                    @if(Session::get('PATIENT_FOUND_BY')=='id')-->

                    <!--admit old patients-->

                    <!--<form action="{{url('/reception/submit_basic_patient_info')}}" class="content_container patient_info_form" method="post">
                    @csrf

                        <p>Present</p>

                        <div class="form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="pre_village" class="label">Village</label>
                                <input type="text" class="input disable shade" name="pre_village" value="{{Session::get('PRE_VILLAGE')}}" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="pre_postOffice" class="label">Post Office</label>
                                <input type="text" class="input disable shade" name="pre_postOffice" value="{{Session::get('PRE_PO')}}" required>

                            </div>

                        </div>

                        <div class="form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="pre_upazilla" class="label">Upazilla</label>
                                <input type="text" class="input disable shade" name="pre_upazilla" value="{{Session::get('PRE_UPAZILLA')}}" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="pre_district" class="label">District</label>
                                <input type="text" class="input disable shade" name="pre_district" value="{{Session::get('PRE_DIST')}}" required>

                            </div>

                        </div>

                        <p>Permanent</p>

                        <div class="form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="per_village" class="label">Village</label>
                                <input type="text" class="input disable shade" name="per_village" value="{{Session::get('PER_VILLAGE')}}" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="per_postOffice" class="label">Post Office</label>
                                <input type="text" class="input disable shade" name="per_postOffice" value="{{Session::get('PER_PO')}}" required>

                            </div>

                        </div>

                        <div class="form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="per_upazilla" class="label">Upazilla</label>
                                <input type="text" class="input disable shade" name="per_upazilla" value="{{Session::get('PER_UPAZILLA')}}" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="per_district" class="label">District</label>
                                <input type="text" class="input disable shade" name="per_district" value="{{Session::get('PER_DIST')}}" required>

                            </div>

                        </div>

                        <div class="patient_form_element_one_is_to_three">

                            <div class="patient_form_element">

                                <label for="religion" class="label">Religion</label>
                                <input type="text" class="input disable shade" name="religion" value="{{Session::get('PATIENT_RELIGION')}}" required>

                            </div>

                            <div class="patient_form_element">

                                <label for="relative_address" class="label">Emergency Relative Address</label>
                                <input type="text" class="input disable shade"  name="relative_address" value="{{Session::get('RELATIVE_ADDRESS')}}" required>

                            </div>

                        </div>

                        <div class="form_element_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="emergency_cell" class="label">Emergency Cell Number</label>
                                <input type="text" class="input disable shade" name="emergency_cell" value="{{Session::get('EMERGENCY_CELL')}}" required>

                            </div>

                            <div class="patient_form_element_one_is_to_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="packages" class="label">Packages</label>
                                    <select name="packages" id="packages" class="input" required>
                                        <option value="none">None</option>
                                        <option value="maternity">Maternity</option>
                                    </select>

                                </div>

                                <div class="patient_form_element">

                                    <label for="ligation" class="label">Ligation</label>
                                    <select name="ligation" id="ligation" class="input" required>
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>

                                </div>

                                <div class="patient_form_element">

                                    <label for="thirdSeizure" class="label">3rd Seizure</label>
                                    <select name="thirdSeizure" id="thirdSeizure" class="input" required>
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>

                                </div>

                            </div>

                        </div>

                        <input type="hidden" value="old" name="patient_type">

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Select Consultant" name="select_consultant">

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

                @else-->

                <!--admit new patients-->

                <form action="{{url('/reception/submit_admit_patient_info')}}" class="content_container patient_info_form" method="post">
                @csrf

                    <p>Present Address</p>

                    <div class="patient_form_element_one_is_to_one">

                        <div class="patient_form_element">

                            <label for="pre_village" class="label">Village</label>
                            <input type="text" class="input" name="pre_village" required>

                        </div>

                        <div class="patient_form_element">

                            <label for="pre_postOffice" class="label">Post Office</label>
                            <input type="text" class="input" name="pre_postOffice" required>

                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_one">

                        <div class="patient_form_element">

                            <label for="pre_upazilla" class="label">Upazilla</label>
                            <input type="text" class="input" name="pre_upazilla" required>

                        </div>

                        <div class="patient_form_element">

                            <label for="pre_district" class="label">District</label>
                            <input type="text" class="input" name="pre_district" required>

                        </div>

                    </div>

                    <p>Permanent Address</p>

                    <div class="patient_form_element_one_is_to_one">

                        <div class="patient_form_element">

                            <label for="per_village" class="label">Village</label>
                            <input type="text" class="input" name="per_village" required>

                        </div>

                        <div class="patient_form_element">

                            <label for="per_postOffice" class="label">Post Office</label>
                            <input type="text" class="input" name="per_postOffice" required>

                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_one">

                        <div class="patient_form_element">

                            <label for="per_upazilla" class="label">Upazilla</label>
                            <input type="text" class="input" name="per_upazilla" required>

                        </div>

                        <div class="patient_form_element">

                            <label for="per_district" class="label">District</label>
                            <input type="text" class="input" name="per_district" required>

                        </div>

                    </div>

                    <p>Other Info</p>

                    <div class="patient_form_element_one_is_to_three">

                        <div class="patient_form_element">

                            <label for="religion" class="label">Religion</label>
                            <input type="text" class="input" name="religion" required>

                        </div>

                        <div class="patient_form_element">

                            <label for="relative_address" class="label">Emergency Relative Address</label>
                            <input type="text" class="input"  name="relative_address" required>

                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_one">

                        <div class="patient_form_element">

                            <label for="emergency_cell" class="label">Emergency Cell Number</label>
                            <input type="text" class="input" name="emergency_cell" required>

                        </div>

                        <div class="patient_form_element_one_is_to_one_is_to_one">

                            <div class="patient_form_element">

                                <label for="packages" class="label">Packages</label>
                                <select name="packages" id="packages" class="input" required>
                                    <option value="none">None</option>
                                    <option value="maternity">Maternity</option>
                                </select>

                            </div>

                            <div class="patient_form_element">

                                <label for="ligation" class="label">Ligation</label>
                                <select name="ligation" id="ligation" class="input" required>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>

                            </div>

                            <div class="patient_form_element">

                                <label for="thirdSeizure" class="label">3rd Seizure</label>
                                <select name="thirdSeizure" id="thirdSeizure" class="input" required>
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="patient_form_element">

                        <input type="submit" class="btn patient_form_btn form_btn"  value="Select Consultant" name="select_consultant">

                    </div>

                </form>

                <!--@endif-->

@endsection

<!--------------------content end---------------------->
