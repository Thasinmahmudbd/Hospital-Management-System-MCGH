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

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/admin/home/')}}">Dashboard</a>
    <a class="mobile_link" href="{{url('/admin/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/admin/doctor/list')}}">Doctors</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')


                <div class="patient_and_doctor_info_one_is_to_one">

                    <div class="content_nav">
        
                        <a href="{{url('/admin/doctor/add')}}" class="content_nav_link">Register a new doctor</a>

                    </div>

                    <!--Search bar to search doctor-->

                    <form action="{{url('/admin/doctor/search')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Patient full ID, cell number or doctor name." required>
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
                        <th width="5%" class="frame_header_item">D-ID</th>
                        <th width="25%" class="frame_header_item">Name</th>
                        <th width="5%" class="frame_header_item">Gender</th>
                        <th width="10%" class="frame_header_item">Specialty</th>
                        <th width="15%" class="frame_header_item">Department</th>
                        <th width="10%" class="frame_header_item">Wallet</th>
                        <th width="5%" class="frame_header_item">Fees</th>
                        <th width="5%" class="frame_header_item">Discount</th>
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

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="D-ID">{{$list->D_ID}}</td>
                        <td class="frame_data" data-label="Name">{{$list->Dr_Name}}</td>
                        <td class="frame_data" data-label="Gender">{{$list->Dr_Gender}}</td>
                        <td class="frame_data" data-label="Specialty">{{$list->Specialty}}</td>
                        <td class="frame_data" data-label="Department">{{$list->Department}}</td>
                        <td class="frame_data" data-label="wallet">{{$list->Wallet}}</td>
                        <td class="frame_data" data-label="Fees">{{$list->Basic_Fee}}</td>
                        <td class="frame_data" data-label="Discount">{{$list->Second_Visit_Discount}}</td>

                        @if($list->status=='1')
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/block'.$list->AI_ID)}}">
                                <i class="table_btn_red fas fa-pause-circle"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/unblock'.$list->AI_ID)}}">
                                <i class="table_btn fas fa-play-circle"></i>
                            </a>
                        </td>
                        @endif

                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/edit'.$list->AI_ID)}}">
                                <i class="fas fa-pen table_btn_yellow"></i>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/delete'.$list->AI_ID)}}">
                                <i class="fas fa-minus-circle table_btn_red"></i>
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
                        
                    <p><b>All Doctors</b></p>

                    <span></span>

                </div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="5%" class="frame_header_item">D-ID</th>
                        <th width="25%" class="frame_header_item">Name</th>
                        <th width="5%" class="frame_header_item">Gender</th>
                        <th width="10%" class="frame_header_item">Specialty</th>
                        <th width="15%" class="frame_header_item">Department</th>
                        <th width="10%" class="frame_header_item">Wallet</th>
                        <th width="5%" class="frame_header_item">Fees</th>
                        <th width="5%" class="frame_header_item">Discount</th>
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

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="D-ID">{{$list->D_ID}}</td>
                        <td class="frame_data" data-label="Name">{{$list->Dr_Name}}</td>
                        <td class="frame_data" data-label="Gender">{{$list->Dr_Gender}}</td>
                        <td class="frame_data" data-label="Specialty">{{$list->Specialty}}</td>
                        <td class="frame_data" data-label="Department">{{$list->Department}}</td>
                        <td class="frame_data" data-label="wallet">{{$list->Wallet}}</td>
                        <td class="frame_data" data-label="Fees">{{$list->Basic_Fee}}</td>
                        <td class="frame_data" data-label="Discount">{{$list->Second_Visit_Discount}}</td>

                        @if($list->status=='1')
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/block'.$list->AI_ID)}}">
                                <i class="table_btn_red fas fa-pause-circle"></i>
                            </a>
                        </td>
                        @else
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/unblock'.$list->AI_ID)}}">
                                <i class="table_btn fas fa-play-circle"></i>
                            </a>
                        </td>
                        @endif

                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/edit'.$list->AI_ID)}}">
                                <i class="fas fa-pen table_btn_yellow"></i>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Action">
                            <a target="blank" href="{{url('/admin/doctor/delete'.$list->AI_ID)}}">
                                <i class="fas fa-minus-circle table_btn_red"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach

                </table>

            @endif















@endsection

<!--------------------content end---------------------->