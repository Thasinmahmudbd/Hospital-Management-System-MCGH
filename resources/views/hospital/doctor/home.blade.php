@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','My Profile')






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
    <a class="mobile_link" href="{{url('/doctor/log/')}}">My Logs</a>
    <a class="mobile_link" href="{{url('/doctor/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                    <div class="rounded_photo_width_is_to_rest">

                        <div class="content_container center_element">

                        @if(Session::get('DOCTORS_IMAGE'))

                            <img class="round_image" src="{{asset('storage/doctor_profile_pictures/'.Session::get('DOCTORS_IMAGE'))}}" alt="" width="100%">

                        @elseif(Session::get('DOCTORS_GENDER')=='male' || Session::get('DOCTORS_GENDER')=='Male')

                            <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-male.png')}}" alt="" width="100%">

                        @elseif(Session::get('DOCTORS_GENDER')=='female' || Session::get('DOCTORS_GENDER')=='Female')

                            <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-female.png')}}" alt="" width="100%">

                        @else

                            <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100%">

                        @endif

                        </div>




                        <div class="span_hidden_bar">

                            <div class="info content_container_bg_less">

                                <p class="collected_info">Name</p>
                                <p>:</p>
                                <p class="collected_info">{{Session::get('DOCTORS_NAME')}}</p>

                                <p class="collected_info">Department</p>
                                <p>:</p>
                                <p class="collected_info">{{Session::get('DOCTORS_DEPARTMENT')}}</p>

                                <p class="collected_info">Specialty</p>
                                <p>:</p>
                                <p class="collected_info">{{Session::get('DOCTORS_SPECIALTY')}}</p>

                                <p class="collected_info"><b>My Wallet</b></p>
                                <p>:</p>
                                <p class="collected_info"><b>{{Session::get('DOCTORS_BALANCE')}}</b> Tk</p>

                            </div>

                            <a class="purple_icon" href="{{url('/doctor/edit_profile/')}}">
                                <i class="fas fa-user-edit log_out_btn purple_icon"></i>
                            </a>

                        </div>

                    </div>



                <!--Session message-->

                @if(session('msg')=='Profile updated successfully.')

                    <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div> 

                @endif



                    <div class="content_container title_bar_purple right_side_top">

                        <span></span>
                            
                        <p><b>My Schedule</b></p>

                        <span><a href="{{url('/doctor/schedule/')}}"><i class="fas fa-calendar-plus log_out_btn"></i></a></span>
                
                    </div>





                    <table class="frame_table">
                    
                    <tr class="frame_header">

                        <th width="12.5%" class="frame_header_item">Shift</th>




                        @if(Session::get('DAY_TODAY')=='Sat')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Sat</th>

                        @else

                            <th width="12.5%" class="frame_header_item">Sat</th>

                        @endif




                        @if(Session::get('DAY_TODAY')=='Sun')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Sun</th>
                            
                        @else

                            <th width="12.5%" class="frame_header_item">Sun</th>

                        @endif




                        @if(Session::get('DAY_TODAY')=='Mon')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Mon</th>
                            
                        @else
    
                            <th width="12.5%" class="frame_header_item">Mon</th>
    
                        @endif




                        @if(Session::get('DAY_TODAY')=='Tue')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Tue</th>
                            
                            @else
    
                                <th width="12.5%" class="frame_header_item">Tue</th>
    
                            @endif




                        @if(Session::get('DAY_TODAY')=='Wed')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Wed</th>
                            
                        @else

                            <th width="12.5%" class="frame_header_item">Wed</th>

                        @endif




                        @if(Session::get('DAY_TODAY')=='Thu')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Thu</th>
                            
                        @else
    
                            <th width="12.5%" class="frame_header_item">Thu</th>
    
                        @endif




                        @if(Session::get('DAY_TODAY')=='Fri')

                            <th width="12.5%" class="frame_header_item background_indicator_animation">Fri</th>
                            
                        @else
    
                            <th width="12.5%" class="frame_header_item">Fri</th>
    
                        @endif

                    </tr>










                    @foreach($routine as $time)

                    <tr class="frame_rows">

                        <td class="frame_data" data-label="Shift">{{$time->F}} - {{$time->T}}</td>




                        @if(Session::get('DAY_TODAY')=='Sat')

                            <td class="frame_data border_indicator_animation disable" data-label="Sat">

                        @else

                            <td class="frame_data disable" data-label="Sat">

                        @endif

                                @if($time->Sat=='A' || $time->Sat=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Sat=='N/A' || $time->Sat=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Sat}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Sat}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Sun')

                            <td class="frame_data border_indicator_animation" data-label="Sun">

                        @else

                            <td class="frame_data disable" data-label="Sun">

                        @endif

                                @if($time->Sun=='A' || $time->Sun=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Sun=='N/A' || $time->Sun=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Sun}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Sun}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Mon')

                            <td class="frame_data border_indicator_animation" data-label="Mon">

                        @else

                            <td class="frame_data disable" data-label="Mon">

                        @endif

                                @if($time->Mon=='A' || $time->Mon=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Mon=='N/A' || $time->Mon=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Mon}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Mon}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Tue')

                            <td class="frame_data border_indicator_animation" data-label="Tue">

                        @else

                            <td class="frame_data disable" data-label="Tue">

                        @endif

                                @if($time->Tue=='A' || $time->Tue=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Tue=='N/A' || $time->Tue=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Tue}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Tue}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Wed')

                            <td class="frame_data border_indicator_animation" data-label="Wed">

                        @else

                            <td class="frame_data disable" data-label="Wed">

                        @endif

                                @if($time->Wed=='A' || $time->Wed=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Wed=='N/A' || $time->Wed=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Wed}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Wed}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Thu')

                            <td class="frame_data border_indicator_animation" data-label="Thu">

                        @else

                            <td class="frame_data disable" data-label="Thu">

                        @endif

                                @if($time->Thu=='A' || $time->Thu=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Thu=='N/A' || $time->Thu=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Thu}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Thu}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Fri')

                            <td class="frame_data border_indicator_animation" data-label="Fri">

                        @else

                            <td class="frame_data disable" data-label="Fri">

                        @endif

                                @if($time->Fri=='A' || $time->Fri=='a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Fri=='N/A' || $time->Fri=='n/a')
                                    <a href="" class="disable">
                                        <p class="table_basic_btn">{{$time->Fri}}</p>
                                    </a>
                                @else
                                    <a href="" class="disable">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Fri}}</p>
                                    </a>
                                @endif

                            </td>




                    </tr>

                    @endforeach

                </table>
















@endsection

<!--------------------content end---------------------->
