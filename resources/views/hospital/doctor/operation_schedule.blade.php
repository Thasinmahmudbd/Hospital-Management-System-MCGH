@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Operation Schedule')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/doctor/home/')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> My Profile </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/patients/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> My Patients </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/schedule/')}}" class="link">
        <i class="link_icons fas fa-calendar-alt"></i>
        <span class="link_name"> My Schedule </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/operation/schedule/')}}" class="link">
        <i class="link_icons fas fa-calendar-alt"></i>
        <span class="link_name"> Operation Schedule </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> My Logs </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/doctor/edit_profile/')}}" class="link">
        <i class="link_icons fas fa-user-edit"></i>
        <span class="link_name"> Edit Profile </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/doctor/home/')}}">My Profile</a>
    <a class="mobile_link" href="{{url('/doctor/patients/')}}">My Patients</a>
    <a class="mobile_link" href="{{url('/doctor/schedule/')}}">My Schedule</a>
    <a class="mobile_link" href="{{url('/doctor/operation/schedule/')}}">Operation Schedule</a>
    <a class="mobile_link" href="{{url('/doctor/log/')}}">My Logs</a>
    <a class="mobile_link" href="{{url('/doctor/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')





                <!--Showing schedules-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>My Operation Schedules</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">P-ID</th>
                        <th width="20%" class="frame_header_item">Operation Type</th>
                        <th width="10%" class="frame_header_item">OT</th>
                        <th width="15%" class="frame_header_item">Date</th>
                        <th width="15%" class="frame_header_item">Time</th>
                        <th width="15%" class="frame_header_item">Est. Duration</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">

                        <td class="frame_data" data-label="S/N" width="5%"><?php echo $serial; $serial++; ?></td>

                        <td class="frame_data" data-label="P-ID" width="20%">{{$list->P_ID}}</td>

                        <td class="frame_data" data-label="Operation Type" width="20%">{{$list->Operation_Type}}</td>

                        <td class="frame_data" data-label="OT" width="10%">{{$list->OT_No}}</td>

                        <td class="frame_data" data-label="Date" width="15%">{{$list->Operation_Date}}</td>

                        <td class="frame_data" data-label="Time" width="15%">{{$list->Operation_Start_Time}}</td>

                        <td class="frame_data" data-label="Est. Duration" width="15%">{{$list->Estimated_Duration}}</td>

                    </tr>

                    @endforeach

                </table>




@endsection

<!--------------------content end---------------------->
