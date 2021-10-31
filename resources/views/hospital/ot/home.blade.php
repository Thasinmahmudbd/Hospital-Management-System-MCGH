@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (New Entry)')






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
    <a href="{{url('/ot/invoice/')}}" class="link">
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
    <a class="mobile_link" href="{{url('/ot/invoice/')}}">Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')












                <!--schedule nav and search-->

                <div class="patient_form_element_one_is_to_one">

                    <div class="content_nav">
        
                        <a href="{{url('/ot/schedule/entry/')}}" class="content_nav_link">Add schedule</a>

                    </div>

                    <form action="{{url('')}}" method="post" class="content_container_white_super_thin center_self">
                        @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="date" class="input" name="schedule_date" required>
                            <button type="submit" class="btn form_btn" name="schedule_date_search">Search</button>

                        </div>

                    </form>

                </div>

                <div class="purple_line"></div>
                <div class="gap"></div>







                <!--Session message-->

                @if(session('msg')=='New schedule added.')

                    <div class="content_container text_center success_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Schedule edited.')

                    <div class="content_container text_center alert_msg">{{session('msg')}}</div>

                @elseif(session('msg')=='Schedule deleted.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @endif




                <!--Showing schedules-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Schedules</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="13%" class="frame_header_item">P-ID</th>
                        <th width="13%" class="frame_header_item">Surgeon</th>
                        <th width="20%" class="frame_header_item">Operation Type</th>
                        <th width="5%" class="frame_header_item">OT</th>
                        <th width="10%" class="frame_header_item">Date</th>
                        <th width="10%" class="frame_header_item">Time</th>
                        <th width="10%" class="frame_header_item">Est. Duration</th>
                        <th width="7%" class="frame_header_item">Edit</th>
                        <th width="7%" class="frame_header_item">Delete</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($schedule as $list)

                    <tr class="frame_rows">

                        <form action="{{url('/ot/edit/schedule')}}" class="content_container patient_info_form" method="post">
                        @csrf

                            <td class="frame_data" data-label="S/N" width="5%"><?php echo $serial; $serial++; ?></td>

                            <td class="frame_data" data-label="P-ID" width="13%">{{$list->P_ID}}</td>
                            <td class="frame_data" data-label="Surgeon" width="13%">{{$list->Surgeon_Name}}</td>
                            <td class="frame_data" data-label="Operation Type" width="20%">{{$list->Operation_Type}}</td>

                            <td class="frame_data" data-label="OT" width="5%">
                                <input type="number" class="input_less flexible" name="otno" value="{{$list->OT_No}}" required>
                            </td>

                            <td class="frame_data" data-label="Date" width="10%">
                                <input type="date" class="input_less" name="date" value="{{$list->Operation_Date}}" required>
                            </td>

                            <td class="frame_data" data-label="Time" width="10%">
                                <input type="time" class="input_less" name="time" value="{{$list->Operation_Start_Time}}" required>
                            </td>

                            <td class="frame_data" data-label="Est. Duration" width="10%">
                                <input type="text" class="input_less flexible" name="estDuration" value="{{$list->Estimated_Duration}}" required>
                            </td>

                            <td class="frame_action" data-label="Edit" width="7%">
                                <input type="hidden" name="ai_id" value="{{$list->AI_ID}}">
                                <button type="submit" class="btn_less" required>
                                    <i class="table_btn_yellow fas fa-pen"></i>
                                </button>
                            </td>

                            <td class="frame_action" data-label="Delete" width="7%">
                                <a target="blank" href="{{url('/ot/edit/schedule/'.$list->AI_ID)}}">
                                    <i class="table_btn_red fas fa-trash-alt"></i>
                                </a>
                            </td>

                        </form>

                    </tr>

                    @endforeach

                </table>




@endsection

<!--------------------content end---------------------->
