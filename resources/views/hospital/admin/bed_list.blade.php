@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Bed List")






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/admin/home/')}}" class="link">
        <i class="link_icons fas fa-th"></i>
        <span class="link_name"> Dashboard </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/admin/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> Logs </span>
    </a>
</li>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer()">
        <i class="link_icons fas fa-users"></i>
        <span class="link_name"> Employees </span>
    </a>
</li>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer2()">
        <i class="link_icons fas fa-procedures"></i>
        <span class="link_name"> Wards </span>
    </a>
</li>

<li class="link_item">
    <a href="#" class="link" onclick="toggleSubLinkContainer3()">
        <i class="link_icons fas fa-procedures"></i>
        <span class="link_name"> Cabins </span>
    </a>
</li>

<div class="sub_link_item disNone" id="subLinkContainer">

    <li class="link_item">
        <a href="{{url('/admin/doctor/list')}}" class="link2">
            <i class="link_icons fas fa-user-md"></i>
            <span class="link_name"> Doctors </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/accountant/list')}}" class="link2">
            <i class="link_icons fas fa-user-tie"></i>
            <span class="link_name"> Accountants </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/receptionist/list')}}" class="link2">
            <i class="link_icons fas fa-user"></i>
            <span class="link_name"> Receptionists </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/nurse/list')}}" class="link2">
            <i class="link_icons fas fa-user-nurse"></i>
            <span class="link_name"> Nurses </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/ot/list')}}" class="link2">
            <i class="link_icons fas fa-user"></i>
            <span class="link_name"> OT Operators </span>
        </a>
    </li>

</div>

<div class="sub_link_item disNone" id="subLinkContainer2">

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Male')}}" class="link2">
            <i class="link_icons fas fa-male"></i>
            <span class="link_name"> Male </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Female')}}" class="link2">
            <i class="link_icons fas fa-female"></i>
            <span class="link_name"> Female </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Child')}}" class="link2">
            <i class="link_icons fas fa-child"></i>
            <span class="link_name"> Child </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Ward'.'/'.'Maternity')}}" class="link2">
            <i class="link_icons fas fa-baby"></i>
            <span class="link_name"> Maternity </span>
        </a>
    </li>

</div>

<div class="sub_link_item disNone" id="subLinkContainer3">

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Cabin'.'/'.'Normal')}}" class="link2">
            <i class="link_icons fas fa-bed"></i>
            <span class="link_name"> Normal </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Cabin'.'/'.'AC')}}" class="link2">
            <i class="link_icons fas fa-wind"></i>
            <span class="link_name"> AC </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/bed/list/'.'Cabin'.'/'.'Double AC')}}" class="link2">
            <i class="link_icons fas fa-snowflake"></i>
            <span class="link_name"> Double AC </span>
        </a>
    </li>

</div>

<li class="link_item">
    <a href="{{url('/admin/show/services')}}" class="link">
        <i class="link_icons fas fa-stethoscope"></i>
        <span class="link_name"> Other Services </span>
    </a>
</li>




@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/admin/home/')}}">Dashboard</a>
    <a class="mobile_link" href="{{url('/admin/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/admin/doctor/list')}}">Doctors</a>
    <a class="mobile_link" href="{{url('/admin/accountant/list')}}">Accountants</a>
    <a class="mobile_link" href="{{url('/admin/receptionist/list')}}">Receptionists</a>
    <a class="mobile_link" href="{{url('/admin/nurse/list')}}">Nurses</a>
    <a class="mobile_link" href="{{url('/admin/ot/list')}}">OT Operators</a>
    <a class="mobile_link" href="{{url('/admin/show/services')}}">Other Services</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')


                <div class="patient_and_doctor_info_one_is_to_one">

                    <div class="content_nav">
        
                        <a href="{{url('/admin/bed/add/form/'.session('type').'/'.session('quality'))}}" class="content_nav_link">Register a new bed</a>

                    </div>

                    <span></span>

                </div>


                <!--Session message-->

                @if(session('msgHook')=='edit')

                    <div class="content_container_bg_less_thin text_center alert_msg">{{session('msg')}}</div>

                @elseif(session('msgHook')=='delete')

                    <div class="content_container_bg_less_thin text_center warning_msg">{{session('msg')}}</div>

                @elseif(session('msgHook')=='entry')

                    <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div>

                @endif







                <div class="purple_line"></div>
                <div class="gap"></div>


                <!--Showing all patients-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>{{session('quality')}} {{session('type')}}</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="10%" class="frame_header_item">Bed</th>
                        <th width="5%" class="frame_header_item">Floor</th>
                        <th width="5%" class="frame_header_item">Room</th>
                        <th width="10%" class="frame_header_item">Type</th>
                        <th width="10%" class="frame_header_item">Quality</th>
                        <th width="10%" class="frame_header_item">Location</th>
                        <th width="10%" class="frame_header_item">Package</th>
                        <th width="5%" class="frame_header_item">Normal Fee</th>
                        <th width="5%" class="frame_header_item">Package Fee</th>
                        <th width="5%" class="frame_header_item">Package Day</th>
                        <th width="5%" class="frame_header_item">Admission Fee</th>
                        <th width="5%" class="frame_header_item">Status</th>
                        <th width="5%" class="frame_header_item">Edit</th>
                        <th width="5%" class="frame_header_item">Delete</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <form action="{{url('/admin/bed/info/edit/'.$list->B_ID)}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>

                            <td class="frame_data" data-label="Bed">
                                <input type="text" class="input_less_2 flexible textFix" name="bed" value="{{$list->Bed_No}}">
                            </td>

                            <td class="frame_data" data-label="Floor">
                                <input type="text" class="input_less_2 flexible textFix" name="floor" value="{{$list->Floor_No}}">
                            </td>

                            <td class="frame_data" data-label="Room">
                                <input type="text" class="input_less_2 flexible textFix" name="room" value="{{$list->Room_No}}">
                            </td>

                            <td class="frame_data" data-label="Type">
                                <input type="text" class="input_less_2 flexible textFix" name="type" value="{{$list->Bed_Type}}">
                            </td>

                            <td class="frame_data" data-label="Quality">
                                <input type="text" class="input_less_2 flexible textFix" name="quality" value="{{$list->Quality}}">
                            </td>

                            <td class="frame_data" data-label="Location">
                                <input type="text" class="input_less_2 flexible textFix" name="location" value="{{$list->B_Location}}">
                            </td>

                            <td class="frame_data" data-label="Package">
                                <input type="text" class="input_less_2 flexible textFix" name="package" value="{{$list->Package_Name}}">
                            </td>

                            <td class="frame_data" data-label="Normal Fee">
                                <input type="text" class="input_less_2 flexible textFix" name="normal_fee" value="{{$list->Normal_Pricing}}">
                            </td>

                            <td class="frame_data" data-label="Package Fee">
                                <input type="text" class="input_less_2 flexible textFix" name="package_fee" value="{{$list->Package_Pricing}}">
                            </td>

                            <td class="frame_data" data-label="Package Day">
                                <input type="text" class="input_less_2 flexible textFix" name="range" value="{{$list->Day_Range}}">
                            </td>

                            <td class="frame_data" data-label="Admission Fee">
                                <input type="text" class="input_less_2 flexible textFix" name="admission" value="{{$list->Admission_Fee}}">
                            </td>

                            @if($list->Confirmation=='1')
                            <td class="frame_action" data-label="Action">
                                <i class="table_btn_red far fa-circle"></i>
                            </td>
                            @else
                            <td class="frame_action" data-label="Action">
                                <i class="table_btn far fa-circle"></i>
                            </td>
                            @endif

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn transparent" name="edit">
                                    <i class="fas fa-pen table_btn_yellow"></i>
                                </button>
                            </td>

                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/bed/delete/'.$list->B_ID.'/'.$list->Bed_No.'/'.$list->Quality.'/'.$list->Bed_Type.'/'.$list->Confirmation)}}">
                                    <i class="fas fa-minus-circle table_btn_red"></i>
                                </a>
                            </td>
                        </tr>

                    </form>

                    @endforeach

                </table>



            @if(Session::get('modal')=='on')
            <div class="modal">
                <p class="modal_title">Notice</p>

                <div class="modal_body">
                    <p>Warning: This is a destructive & irreversible action.</p>
                    <p>Do you want to proceed anyway?</p>
                    <div class="gap"></div>
                    <div class="modal_btn">
                        <a class="modal_yes" href="{{url('/admin/confirm/bed/delete')}}">Yes</a>
                        <a class="modal_no" href="{{url('/admin/cancel/bed/delete')}}">No</a>
                    </div>
                </div>
            </div>
            @endif















@endsection

<!--------------------content end---------------------->