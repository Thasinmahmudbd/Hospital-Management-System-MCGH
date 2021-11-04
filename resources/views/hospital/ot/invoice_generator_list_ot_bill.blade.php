@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Invoice Generator')






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
    <a href="{{url('/ot/invoice/generate/list/')}}" class="link">
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
    <a class="mobile_link" href="{{url('/ot/invoice/generate/list/')}}">Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <div class="patient_and_doctor_info_one_is_to_one">

                    <span></span>

                    <!--Search bar to search patients-->

                    <form action="{{url('/reception/find_patient/by_search/invoice/ot/bill/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Patient full ID" required>
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
                        <th width="15%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="15%" class="frame_header_item">Cell</th>
                        <th width="20%" class="frame_header_item">Doctor</th>
                        <th width="20%" class="frame_header_item">Operation</th>
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
                        <td class="frame_data" data-label="Operation">{{$list->O_Type}}</td>

                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/ot/collect/ot/bill/invoice/data/'.$list->O_ID)}}">
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


                <!--Showing all patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Bills</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="15%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Patient Name</th>
                        <th width="15%" class="frame_header_item">Cell</th>
                        <th width="20%" class="frame_header_item">Doctor</th>
                        <th width="20%" class="frame_header_item">Operation</th>
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
                        <td class="frame_data" data-label="Operation">{{$list->O_Type}}</td>

                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/ot/collect/ot/bill/invoice/data/'.$list->O_ID)}}">
                                <i class="table_btn fas fa-print"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif















@endsection

<!--------------------content end---------------------->