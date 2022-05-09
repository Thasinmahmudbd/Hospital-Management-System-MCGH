@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Doctor's List")






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
    <a href="{{url('/admin/doctor/list')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> Doctors </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/admin/accountant/list')}}" class="link">
        <i class="link_icons fas fa-user-tie"></i>
        <span class="link_name"> Accountants </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/admin/nurse/list')}}" class="link">
        <i class="link_icons fas fa-user-nurse"></i>
        <span class="link_name"> Nurses </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/admin/ot/list')}}" class="link">
        <i class="link_icons fas fa-user"></i>
        <span class="link_name"> OT Operators </span>
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
    <a class="mobile_link" href="{{url('/admin/nurse/list')}}">Nurses</a>
    <a class="mobile_link" href="{{url('/admin/ot/list')}}">OT Operators</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')


                <div class="patient_and_doctor_info_one_is_to_one">

                    <div class="content_nav">
        
                        <a href="{{url('/admin/employee/add/form')}}" class="content_nav_link">Register a new OT operator</a>

                    </div>

                    <!--Search bar to search ot-->

                    <form action="{{url('/admin/ot/search')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="text" class="input" name="search_info" placeholder="Enter full ID or name." required>
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

                    <form action="{{url('/admin/info/edit'.$list->AI_ID)}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>

                            <td class="frame_data" data-label="ID">{{$list->OTO_ID}}</td>

                            <td class="frame_data" data-label="Name">
                                <input type="text" class="input_less_2 textFix" name="edit_name" value="{{$list->OTO_Name}}">
                            </td>

                            <td class="frame_data" data-label="Gender">
                                <input type="text" class="input_less_2 textFix" name="edit_gender" value="{{$list->OTO_Gender}}">
                            </td>

                            @if($list->status=='1')
                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/account/block/'.$list->OTO_ID)}}">
                                    <i class="table_btn_red fas fa-pause-circle"></i>
                                </a>
                            </td>
                            @else
                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/account/unblock/'.$list->OTO_ID)}}">
                                    <i class="table_btn fas fa-play-circle"></i>
                                </a>
                            </td>
                            @endif

                            <input type="hidden" name="edit_id" value="{{$list->OTO_ID}}">
                            <input type="hidden" name="personal" value="accounts">

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn transparent" name="edit">
                                    <i class="fas fa-pen table_btn_yellow"></i>
                                </button>
                            </td>

                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/ot/delete'.$list->AI_ID)}}">
                                    <i class="fas fa-minus-circle table_btn_red"></i>
                                </a>
                            </td>
                        </tr>

                    </form>

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
                        
                    <p><b>All Accountants</b></p>

                    <span></span>

                </div>

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

                    <form action="{{url('/admin/info/edit'.$list->AI_ID)}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>

                            <td class="frame_data" data-label="ID">{{$list->OTO_ID}}</td>

                            <td class="frame_data" data-label="Name">
                                <input type="text" class="input_less_2 textFix" name="edit_name" value="{{$list->OTO_Name}}">
                            </td>

                            <td class="frame_data" data-label="Gender">
                                <input type="text" class="input_less_2 textFix" name="edit_gender" value="{{$list->OTO_Gender}}">
                            </td>

                            @if($list->status=='1')
                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/account/block/'.$list->OTO_ID)}}">
                                    <i class="table_btn_red fas fa-pause-circle"></i>
                                </a>
                            </td>
                            @else
                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/account/unblock/'.$list->OTO_ID)}}">
                                    <i class="table_btn fas fa-play-circle"></i>
                                </a>
                            </td>
                            @endif

                            <input type="hidden" name="edit_id" value="{{$list->OTO_ID}}">
                            <input type="hidden" name="personal" value="accounts">

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn transparent" name="edit">
                                    <i class="fas fa-pen table_btn_yellow"></i>
                                </button>
                            </td>

                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/admin/ot/delete'.$list->AI_ID)}}">
                                    <i class="fas fa-minus-circle table_btn_red"></i>
                                </a>
                            </td>
                        </tr>

                    </form>

                    @endforeach

                </table>

            @endif















@endsection

<!--------------------content end---------------------->