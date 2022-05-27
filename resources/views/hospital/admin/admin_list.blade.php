@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Admin's List")






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






                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Add Admins</b></p>

                    <span></span>

                </div>


                    <form action="{{url('/admin/admin/add')}}" class="patient_info_form" method="post">
                    @csrf

                        <div class="content_container">

                            <div class="patient_form_element_one_is_to_one">

                                <div class="patient_form_element">

                                    <label for="name" class="label">Name</label>
                                    <input type="text" class="input" name="name" required>

                                </div>

                                <div class="patient_form_element_one_is_to_one">

                                    <div class="patient_form_element">

                                        <label for="pass" class="label">Password</label>
                                        <input type="password" class="input" name="password" value="" required>

                                    </div>

                                    <div class="patient_form_element">

                                        <label for="gender" class="label">Gender</label>
                                        <select name="gender" id="gender" class="input" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="patient_form_element">

                            <input type="submit" class="btn patient_form_btn form_btn"  value="Register Admin" name="submit">

                        </div>

                    </form>


                <div class="gap"></div>
                <div class="purple_line"></div>
                <div class="gap"></div>


                <!--Showing all admin-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>All Admins</b></p>

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

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="15%" class="frame_header_item">ID</th>
                        <th width="50%" class="frame_header_item">Name</th>
                        <th width="15%" class="frame_header_item">Gender</th>
                        @if(Session::get('status')=='red')
                        <th width="5%" class="frame_header_item">Status</th>
                        @else
                        <th width="5%" class="frame_header_item">Status</th>
                        @endif
                        <th width="5%" class="frame_header_item">Edit</th>
                        <th width="5%" class="frame_header_item">Delete</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <form action="{{url('/admin/admin/edit/'.$list->AI_ID)}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>

                            <td class="frame_data" data-label="ID">{{$list->Ad_ID}}</td>

                            <td class="frame_data" data-label="Name">
                                <input type="text" class="input_less_2 textFix" name="edit_name" value="{{$list->Ad_Name}}">
                            </td>

                            <td class="frame_data" data-label="Gender">
                                <input type="text" class="input_less_2 textFix" name="edit_gender" value="{{$list->Ad_Gender}}">
                            </td>

                            @if($list->status=='1')
                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/account/block/'.$list->Ad_ID)}}">
                                    <i class="table_btn_red fas fa-pause-circle"></i>
                                </a>
                            </td>
                            @else
                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/account/unblock/'.$list->Ad_ID)}}">
                                    <i class="table_btn fas fa-play-circle"></i>
                                </a>
                            </td>
                            @endif

                            <input type="hidden" name="edit_id" value="{{$list->Ad_ID}}">

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn transparent" name="edit">
                                    <i class="fas fa-pen table_btn_yellow"></i>
                                </button>
                            </td>

                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/admin/delete/'.$list->Ad_ID.'/'.$list->AI_ID)}}">
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
                        <a class="modal_yes" href="{{url('/admin/confirm/admin/delete')}}">Yes</a>
                        <a class="modal_no" href="{{url('/admin/cancel/admin/delete')}}">No</a>
                    </div>
                </div>
            </div>
            @endif










@endsection

<!--------------------content end---------------------->