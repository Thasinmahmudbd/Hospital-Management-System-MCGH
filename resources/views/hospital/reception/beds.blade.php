@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Bed Selection)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/doctor_selection')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> Reselect Consultant </span>
    </a>
</li>
<li class="link_item">
    <a href="{{url('/reception/cancel/admission')}}" class="link">
        <i class="link_icons far fa-window-close"></i>
        <span class="link_name"> Cancel Admission </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/doctor_selection')}}">Reselect Consultant</a>
</div>
<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/cancel/admission')}}">Cancel Admission</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <!--Links to navigate invoice pages-->

                <div class="content_nav">

                @if(Session::get('BED_TYPE')=='male_ward')
                    <a href="/reception/ward/male" class="content_nav_link_active">Male Ward</a>
                @else
                    <a href="/reception/ward/male" class="content_nav_link">Male Ward</a>
                @endif

                @if(Session::get('BED_TYPE')=='female_ward')
                    <a href="/reception/ward/female" class="content_nav_link_active">Female Ward</a>
                @else
                    <a href="/reception/ward/female" class="content_nav_link">Female Ward</a>
                @endif

                @if(Session::get('BED_TYPE')=='child_ward')
                    <a href="/reception/ward/child" class="content_nav_link_active">Child Ward</a>
                @else
                    <a href="/reception/ward/child" class="content_nav_link">Child Ward</a>
                @endif

                @if(Session::get('BED_TYPE')=='cabin')
                    <a href="/reception/cabin" class="content_nav_link_active">Cabin</a>
                @else
                    <a href="/reception/cabin" class="content_nav_link">Cabin</a>
                @endif

                    <a href="/reception/ward/cabin/none" class="content_nav_link table_item_red">None</a>

                </div>







                <div class="purple_line"></div>
                <div class="gap"></div>







                <!--Session message-->

                @if(session('msg')=='This bed is already taken. Please pick another one.')

                    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

                @endif







                <!--Showing beds-->

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="10%" class="frame_header_item">Bed No</th>
                        <th width="15%" class="frame_header_item">Quality</th>
                        <th width="10%" class="frame_header_item">Room No</th>
                        <th width="25%" class="frame_header_item">Bed Location</th>
                        <th width="15%" class="frame_header_item">Normal Price</th>
                        <th width="15%" class="frame_header_item">Package Price</th>
                        <th width="5%" class="frame_header_item">Pick</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($bed as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="Bed No">{{$list->Bed_No}}</td>
                        <td class="frame_data" data-label="Quality">{{$list->Quality}}</td>
                        <td class="frame_data" data-label="Room No">{{$list->Room_No}}</td>
                        <td class="frame_data" data-label="Bed Location">{{$list->B_Location}}</td>
                        <td class="frame_data" data-label="Normal Price">{{$list->Normal_Pricing}}</td>
                        <td class="frame_data" data-label="Package Price">{{$list->Package_Pricing}}</td>

                        @if($list->Confirmation == '0')
                            <td class="frame_action" data-label="Pick">
                                <a href="{{url('/reception/bed/confirmation/'.$list->B_ID)}}">
                                    <i class="fas fa-check-circle table_btn"></i>
                                </a>
                            </td>
                        @else
                            <td class="frame_action disable shade" data-label="Pick">
                                <a href="">
                                    <i class="fas fa-times-circle table_btn_red"></i>
                                </a>
                            </td>
                        @endif

                    </tr>

                    @endforeach

                </table>

@endsection

<!--------------------content end---------------------->
