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
    <a href="{{url('/reception/patient_list/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Patients List </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/home/')}}">Patient Entry</a>
    <a class="mobile_link" href="{{url('/reception/patient_list/')}}">Patients List</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <!--Search bar to search old patients-->
                
                <form action="" method="get" class="content_container patient_info_form">

                    <div class="doctor_search_form_element">

                        <label for="doctor_name_search" class="collected_info vanish_label">Search Old Patients</label>
                        <input type="text" class="input" name="doctor_name_search" placeholder="Enter Patient id or cell" required>
                        <button type="submit" class="btn form_btn" name="search_doctor">Search</button>

                    </div>

                </form>



                <!--results if patient is old patient-->

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="14%" class="frame_header_item">P-ID</th>
                        <th width="17%" class="frame_header_item">Patient Name</th>
                        <th width="14%" class="frame_header_item">Cell</th>
                        <th width="17%" class="frame_header_item">Doctor</th>
                        <th width="10%" class="frame_header_item">Fee</th>
                        <th width="5%" class="frame_header_item">Disc</th>
                        <th width="10%" class="frame_header_item">Total</th>
                        <th width="8%" class="frame_header_item">Appointed</th>
                        <th width="5%" class="frame_header_item">Action</th>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Appointed">Date</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <p class="table_btn">OK</p>
                            </a>
                        </td>
                    </tr>

                </table>

                
                
                <!--gap-->

                <div class="gap"></div>


                <!--admit new patients-->

                <form action="{{url('/reception/submit_basic_patient_info')}}" class="content_container patient_info_form" method="post">
                @csrf

                    <p>New Patient Entry:</p>

                    <div class="patient_form_element">

                        <label for="patient_name" class="label">Patient's Name</label>
                        <input type="text" class="input" name="patient_name" required>
    
                    </div>

                    <div class="patient_form_element_one_is_to_three">
    
                        <div class="patient_form_element">
        
                            <label for="patient_gender" class="label">Patient's Gender</label>
                            <select name="patient_gender" id="patient_gender" class="input">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                                <option value="Child">Child</option>
                            </select>
        
                        </div>

                        <div class="patient_form_element">
        
                            <label for="cell_number" class="label">Cell Number</label>
                            <input type="tel" class="input"  name="cell_number" required>
        
                        </div>

                    </div>

                    <div class="patient_form_element_one_is_to_three">
    
                        <div class="patient_form_element">
        
                            <label for="nid_type" class="label">NID Type</label>
                            <select name="nid_type" id="nid_type" class="input">
                                <option value="Own">Own</option>
                                <option value="Guardian">Guardian</option>
                            </select>
        
                        </div>

                        <div class="patient_form_element">
        
                            <label for="nid" class="label">NID Number</label>
                            <input type="tel" class="input"  name="nid" required>
        
                        </div>

                    </div>
    
                    <div class="patient_form_element">
    
                        <input type="submit" class="btn patient_form_btn form_btn"  value="Select Doctor" name="select_doctor">
    
                    </div>

                </form>

@endsection

<!--------------------content end---------------------->
