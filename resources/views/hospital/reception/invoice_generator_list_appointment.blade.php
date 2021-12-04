@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Invoice Generator')






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
    <a class="mobile_link" href="{{url('/reception/invoice_list/appointment/')}}">Patients List</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <div class="patient_and_doctor_info_one_is_to_one">

                    <!--Links to navigate invoice pages-->

                    @if(Session::get('InvoiceType')=='appoint')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link_active">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link">Dental</a>
                        <a href="" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='admit')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link">Dental</a>
                        <a href="" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link_active">Admits</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='dental')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link_active">Dental</a>
                        <a href="" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>

                    </div>

                    @endif

                    <!--Search bar to search patients-->

                    <form action="{{url('/reception/find_patient/by_search/invoice/appointment/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Patient full ID" required>
                            <button type="submit" class="btn form_btn" name="search_old_patient">Search</button>

                        </div>

                    </form>

                </div>







            <!--Session message-->

            @if(session('msg')=='Bed Change Successful.')

            <div class="content_container text_center success_msg">{{session('msg')}}</div> 

            @elseif(session('msg')=='Bed has been changed once. Discharge patient then re-admit again.')

            <div class="content_container text_center warning_msg">{{session('msg')}}</div>

            @endif









        @if(Session::get('InvoiceType')=='appoint')

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
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Cancel</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Cancel">
                            <a href="{{url('/reception/cancel/appointment/'.$list->AI_ID)}}">
                                <i class="table_btn_red fas fa-times-circle"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/appointment/invoice/data/'.$list->AI_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

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







                <!--Showing todays patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Today</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Cancel</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($today as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Cancel">
                            <a href="{{url('/reception/cancel/appointment/'.$list->AI_ID)}}">
                                <i class="table_btn_red fas fa-times-circle"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/appointment/invoice/data/'.$list->AI_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>





                <div class="gap"></div>


                <!--Showing all patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Others</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Cancel</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($all as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Cancel">
                            <a href="{{url('/reception/cancel/appointment/'.$list->AI_ID)}}">
                                <i class="table_btn_red fas fa-times-circle"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/appointment/invoice/data/'.$list->AI_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif























        @elseif(Session::get('InvoiceType')=='admit')

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
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Bed</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Bed">
                            <a href="{{url('/reception/switch/bed/'.$list->A_ID)}}">
                                <i class="table_btn_orange fas fa-sync-alt"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/admission/invoice/data/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

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







                <!--Showing todays patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Today</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Bed</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($today as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Bed">
                            <a href="{{url('/reception/switch/bed/'.$list->A_ID)}}">
                                <i class="table_btn_orange fas fa-sync-alt"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/admission/invoice/data/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>





                <div class="gap"></div>


                <!--Showing all patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Others</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Bed</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($all as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Bed">
                            <a href="{{url('/reception/switch/bed/'.$list->A_ID)}}">
                                <i class="table_btn_orange fas fa-sync-alt"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/admission/invoice/data/'.$list->A_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif























        @elseif(Session::get('InvoiceType')=='dental')

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
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Due</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Due">
                            <a href="{{url('')}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        
                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/dental/invoice/data/'.$list->Dental_Test_No)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

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







                <!--Showing todays patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Today</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Due</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($today as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Due">
                            <a href="{{url('')}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/dental/invoice/data/'.$list->Dental_Test_No)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>





                <div class="gap"></div>


                <!--Showing all patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Others</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Due</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($all as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Due">
                            <a href="{{url('')}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/dental/invoice/data/'.$list->Dental_Test_No)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif

        @endif

@endsection

<!--------------------content end---------------------->