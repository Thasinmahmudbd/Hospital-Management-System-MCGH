@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Appoint Time)')






<!-----------------------link---------------------->

@section('links')

    @if(Session::get('PATIENT_TYPE') == 'new')

    <li class="link_item">
        <a href="{{url('/reception/doctor_selection/reselection/'.Session::get('P_L_AI_ID'))}}" class="link">
            <i class="link_icons fas fa-user-md"></i>
            <span class="link_name"> Reselect Doctor </span>
        </a>
    </li>

    @else

    <li class="link_item">
        <a href="{{url('/reception/cancel_appointment_from_time_selection/')}}" class="link">
            <i class="link_icons far fa-window-close"></i>
            <span class="link_name"> Cancel Appointment </span>
        </a>
    </li>

    @endif

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

    @if(Session::get('PATIENT_TYPE') == 'new')

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/doctor_selection/reselection/'.Session::get('P_L_AI_ID'))}}">Reselect Doctor</a>
    </div>

    @else

    <div id="myLinks" class="mobile_links">
        <a class="mobile_link" href="{{url('/reception/cancel_appointment_from_time_selection/')}}">Cancel Appointment</a>
    </div>

    @endif

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <p class="content_container">{{Session::get('D_NAME')}}'s schedule</p>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="12.5%" class="frame_header_item">Time</th>
                        <th width="12.5%" class="frame_header_item">Sat</th>
                        <th width="12.5%" class="frame_header_item">Sun</th>
                        <th width="12.5%" class="frame_header_item">Mon</th>
                        <th width="12.5%" class="frame_header_item">Tue</th>
                        <th width="12.5%" class="frame_header_item">Wed</th>
                        <th width="12.5%" class="frame_header_item">Thu</th>
                        <th width="12.5%" class="frame_header_item">Fri</th>
                    </tr>


                    @foreach($routine as $time)

                    <tr class="frame_rows">

                        <td class="frame_data" data-label="Time">{{$time->F}} - {{$time->T}}</td>

                        <td class="frame_data" data-label="Sat">

                            @if($time->sat=='A' || $time->sat=='a')
                                <a href="{{url('/reception/take_spot_sat/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->sat}}</p>
                                </a>
                            @elseif($time->sat=='N/A' || $time->sat=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->sat}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->sat}}</p>
                                </a>
                            @endif

                        </td>

                        <td class="frame_data" data-label="Sun">

                            @if($time->sun=='A' || $time->sun=='a')
                                <a href="{{url('/reception/take_spot_sun/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->sun}}</p>
                                </a>
                            @elseif($time->sun=='N/A' || $time->sun=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->sun}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->sun}}</p>
                                </a>
                            @endif

                        </td>

                        <td class="frame_data" data-label="Mon">

                            @if($time->mon=='A' || $time->mon=='a')
                                <a href="{{url('/reception/take_spot_mon/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->mon}}</p>
                                </a>
                            @elseif($time->mon=='N/A' || $time->mon=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->mon}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->mon}}</p>
                                </a>
                            @endif

                        </td>

                        <td class="frame_data" data-label="Tue">

                            @if($time->tue=='A' || $time->tue=='a')
                                <a href="{{url('/reception/take_spot_tue/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->tue}}</p>
                                </a>
                            @elseif($time->tue=='N/A' || $time->tue=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->tue}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->tue}}</p>
                                </a>
                            @endif

                        </td>

                        <td class="frame_data" data-label="Wed">

                            @if($time->wed=='A' || $time->wed=='a')
                                <a href="{{url('/reception/take_spot_wed/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->wed}}</p>
                                </a>
                            @elseif($time->wed=='N/A' || $time->wed=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->wed}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->wed}}</p>
                                </a>
                            @endif

                        </td>

                        <td class="frame_data" data-label="Thu">

                            @if($time->thu=='A' || $time->thu=='a')
                                <a href="{{url('/reception/take_spot_thu/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->thu}}</p>
                                </a>
                            @elseif($time->thu=='N/A' || $time->thu=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->thu}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->thu}}</p>
                                </a>
                            @endif

                        </td>

                        <td class="frame_data" data-label="Fri">

                            @if($time->fri=='A' || $time->fri=='a')
                                <a href="{{url('/reception/take_spot_fri/'.$time->AI_ID)}}" class="">
                                    <p class="table_basic_btn table_item_green">{{$time->fri}}</p>
                                </a>
                            @elseif($time->fri=='N/A' || $time->fri=='n/a')
                                <a href="" class="disable">
                                    <p class="table_basic_btn">{{$time->fri}}</p>
                                </a>
                            @else
                                <a href="" class="disable">
                                    <p class="table_basic_btn table_item_yellow">{{$time->fri}}</p>
                                </a>
                            @endif

                        </td>

                    </tr>

                    @endforeach

                </table>

@endsection

<!--------------------content end---------------------->

