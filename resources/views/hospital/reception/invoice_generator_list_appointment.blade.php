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
    <a href="{{url('/reception/patient_list/'.Session::get('DATE_TODAY'))}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Daily Summary </span>
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
    <a class="mobile_link" href="{{url('/reception/patient_list/'.Session::get('DATE_TODAY'))}}">Daily Summary</a>
    <a class="mobile_link" href="{{url('/reception/invoice_list/appointment/')}}">Generate Invoice</a>
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
                        <a href="{{url('/reception/invoice_list/pathology/')}}" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>
                        <a href="{{url('/reception/invoice_list/physio/')}}" class="content_nav_link">Physio</a>
                        <a href="{{url('/reception/invoice_list/er/')}}" class="content_nav_link">Er</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='admit')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link">Dental</a>
                        <a href="{{url('/reception/invoice_list/pathology/')}}" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link_active">Admits</a>
                        <a href="{{url('/reception/invoice_list/physio/')}}" class="content_nav_link">Physio</a>
                        <a href="{{url('/reception/invoice_list/er/')}}" class="content_nav_link">Er</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='dental')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link_active">Dental</a>
                        <a href="{{url('/reception/invoice_list/pathology/')}}" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>
                        <a href="{{url('/reception/invoice_list/physio/')}}" class="content_nav_link">Physio</a>
                        <a href="{{url('/reception/invoice_list/er/')}}" class="content_nav_link">Er</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='pathology')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link">Dental</a>
                        <a href="{{url('/reception/invoice_list/pathology/')}}" class="content_nav_link_active">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>
                        <a href="{{url('/reception/invoice_list/physio/')}}" class="content_nav_link">Physio</a>
                        <a href="{{url('/reception/invoice_list/er/')}}" class="content_nav_link">Er</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='physio')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link">Dental</a>
                        <a href="{{url('/reception/invoice_list/pathology/')}}" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>
                        <a href="{{url('/reception/invoice_list/physio/')}}" class="content_nav_link_active">Physio</a>
                        <a href="{{url('/reception/invoice_list/er/')}}" class="content_nav_link">Er</a>

                    </div>

                    @elseif(Session::get('InvoiceType')=='er')
                    <div class="content_nav">
    
                        <a href="{{url('/reception/invoice_list/appointment/')}}" class="content_nav_link">Appointments</a>
                        <a href="{{url('/reception/invoice_list/dental/')}}" class="content_nav_link">Dental</a>
                        <a href="{{url('/reception/invoice_list/pathology/')}}" class="content_nav_link">Tests</a>
                        <a href="{{url('/reception/invoice_list/admission/')}}" class="content_nav_link">Admits</a>
                        <a href="{{url('/reception/invoice_list/physio/')}}" class="content_nav_link">Physio</a>
                        <a href="{{url('/reception/invoice_list/er/')}}" class="content_nav_link_active">Er</a>

                    </div>

                    @endif

                    <!--Search bar to search patients-->

                    @if(Session::get('InvoiceType')=='appoint')

                    <form action="{{url('/reception/find_patient/by_search/invoice/appointment/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                    @elseif(Session::get('InvoiceType')=='admit')

                    <form action="{{url('/reception/find_patient/by_search/invoice/admit/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                    @elseif(Session::get('InvoiceType')=='dental')

                    <form action="{{url('/reception/find_patient/by_search/invoice/dental/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                    @elseif(Session::get('InvoiceType')=='pathology')

                    <form action="{{url('/reception/find_patient/by_search/invoice/pathology/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                    @elseif(Session::get('InvoiceType')=='physio')

                    <form action="{{url('/reception/find_patient/by_search/invoice/physio/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                    @elseif(Session::get('InvoiceType')=='er')

                    <form action="{{url('/reception/find_patient/by_search/invoice/er/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                    @endif

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

                        @if($list->Due_Amount==0)
                        <td class="frame_action disable shade" data-label="Due">
                            <a href="{{url('/reception/collect/dental/due/'.$list->Dental_Test_No)}}">
                                <i class="table_btn_orange fas fa-donate broken"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Due">
                            <a href="{{url('/reception/collect/dental/due/'.$list->Dental_Test_No)}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        @endif
                        
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

                        @if($list->Due_Amount==0)
                        <td class="frame_action disable shade" data-label="Due">
                            <a href="{{url('/reception/collect/dental/due/'.$list->Dental_Test_No)}}">
                                <i class="table_btn_orange fas fa-donate broken"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Due">
                            <a href="{{url('/reception/collect/dental/due/'.$list->Dental_Test_No)}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        @endif

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
                        
                    <p><b>Last Week</b></p>

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

                        @if($list->Due_Amount==0)
                        <td class="frame_action disable shade" data-label="Due">
                            <a href="{{url('/reception/collect/dental/due/'.$list->Dental_Test_No)}}">
                                <i class="table_btn_orange fas fa-donate broken"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Due">
                            <a href="{{url('/reception/collect/dental/due/'.$list->Dental_Test_No)}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        @endif


                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/dental/invoice/data/'.$list->Dental_Test_No)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif
























        @elseif(Session::get('InvoiceType')=='pathology')

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
                        <th width="25%" class="frame_header_item">P-ID</th>
                        <th width="35%" class="frame_header_item">Patient Name</th>
                        <th width="25%" class="frame_header_item">Cell</th>
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

                        @if($list->Due_Amount==0)
                        <td class="frame_action disable shade" data-label="Due">
                            <a href="{{url('/reception/collect/pathology/due/'.$list->Test_No)}}">
                                <i class="table_btn_orange fas fa-donate broken"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Due">
                            <a href="{{url('/reception/collect/pathology/due/'.$list->Test_No)}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        @endif

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/pathology/invoice/data/'.$list->Test_No)}}">
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
                        <th width="25%" class="frame_header_item">P-ID</th>
                        <th width="35%" class="frame_header_item">Patient Name</th>
                        <th width="25%" class="frame_header_item">Cell</th>
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

                        @if($list->Due_Amount==0)
                        <td class="frame_action disable shade" data-label="Due">
                            <a href="{{url('/reception/collect/pathology/due/'.$list->Test_No)}}">
                                <i class="table_btn_orange fas fa-donate broken"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Due">
                            <a href="{{url('/reception/collect/pathology/due/'.$list->Test_No)}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        @endif

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/pathology/invoice/data/'.$list->Test_No)}}">
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
                        
                    <p><b>Last Week</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="25%" class="frame_header_item">P-ID</th>
                        <th width="35%" class="frame_header_item">Patient Name</th>
                        <th width="25%" class="frame_header_item">Cell</th>
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

                        @if($list->Due_Amount==0)
                        <td class="frame_action disable shade" data-label="Due">
                            <a href="{{url('/reception/collect/pathology/due/'.$list->Test_No)}}">
                                <i class="table_btn_orange fas fa-donate broken"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Due">
                            <a href="{{url('/reception/collect/pathology/due/'.$list->Test_No)}}">
                                <i class="table_btn_orange fas fa-donate"></i>
                            </a>
                        </td>
                        @endif

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/pathology/invoice/data/'.$list->Test_No)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif

            























        @elseif(Session::get('InvoiceType')=='physio')

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
                        <th width="25%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
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

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/physio/invoice/data/'.$list->AI_ID)}}">
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
                        <th width="25%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
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

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/physio/invoice/data/'.$list->AI_ID)}}">
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
                        
                    <p><b>Last Week</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="25%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
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

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/physio/invoice/data/'.$list->AI_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif

            






















        @elseif(Session::get('InvoiceType')=='er')

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
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="25%" class="frame_header_item">Reference Name</th>
                        <th width="20%" class="frame_header_item">Reference Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->Name}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Ref_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Ref_Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/er/invoice/data/'.$list->AI_ID)}}">
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
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="25%" class="frame_header_item">Reference Name</th>
                        <th width="20%" class="frame_header_item">Reference Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($today as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->Name}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Ref_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Ref_Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/er/invoice/data/'.$list->AI_ID)}}">
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
                        
                    <p><b>Last Week</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="25%" class="frame_header_item">Reference Name</th>
                        <th width="20%" class="frame_header_item">Reference Cell</th>
                        <th width="25%" class="frame_header_item">Doctor</th>
                        <th width="5%" class="frame_header_item">Print</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($all as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->Name}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Ref_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Ref_Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>

                        <td class="frame_action" data-label="Print">
                            <a target="blank" href="{{url('/reception/collect/er/invoice/data/'.$list->AI_ID)}}">
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