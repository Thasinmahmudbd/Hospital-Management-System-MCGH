@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Nurse (Patient List)')






<!-----------------------link---------------------->

@section('links')

<li class="list_item">
    <a href="{{url('/nurse/home/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Patient List </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/nurse/home/')}}">Patient List</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')


                <div class="patient_and_doctor_info_one_is_to_one">

                    <!--Placeholder-->

                    <span></span>

                    <!--Search bar to search patients-->

                    <form action="{{url('/nurse/find_patient/by_search/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <div class="patient_form_element_one_is_to_three">

                                <input type="text" class="input" name="floor_no" placeholder="Floor No">

                                <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Patient full ID">

                            </div>

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
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Bed No</th>
                        <th width="20%" class="frame_header_item">Floor No</th>
                        <th width="17.25%" class="frame_header_item">Invigilator</th>
                        <th width="17.25%" class="frame_header_item">Others</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Bed No">{{$list->Bed_No}}</td>
                        <td class="frame_data" data-label="Floor No">{{$list->Floor_No}}</td>

                        <td class="frame_action" data-label="Invigilator">
                            <a href="{{url('/choose/invigilator/'.$list->A_ID)}}">
                                Select
                            </a>
                        </td>
                        
                        <td class="frame_action" data-label="Others">
                            <a href="{{url('/nurse/input/other/'.$list->A_ID)}}">
                                Input
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







                <!--Showing patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Patients</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Bed No</th>
                        <th width="20%" class="frame_header_item">Floor No</th>
                        <th width="17.25%" class="frame_header_item">Invigilator</th>
                        <th width="17.25%" class="frame_header_item">Others</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Bed No">{{$list->Bed_No}}</td>
                        <td class="frame_data" data-label="Floor No">{{$list->Floor_No}}</td>

                        <td class="frame_action table_item_dark_green" data-label="Invigilator">
                            <a class="table_item_dark_green" href="{{url('/choose/invigilator/'.$list->A_ID)}}">
                                Select
                            </a>
                        </td>
                        
                        <td class="frame_action table_item_dark_green" data-label="Others">
                            <a class="table_item_dark_green" href="{{url('/nurse/input/other/'.$list->A_ID)}}">
                                Input
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif





@endsection

<!--------------------content end---------------------->
