@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','My Schedule')






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

                

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Add a new shift</b></p>

                    <span></span>

                </div>





                <form action="{{url('/doctor/add_shift/')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
                @csrf

                <div class="patient_and_doctor_info_one_is_to_one">

                    <div class="patient_form_element_one_is_to_three center_element content_container">
                        <label class="center_element" for="from">From</label>
                        <input class="input" type="time" name="from" required>  
                    </div>

                    <div class="patient_form_element_one_is_to_three center_element content_container">
                        <label class="center_element" for="to">To</label>
                        <input class="input" type="time" name="to" required>  
                    </div>

                </div>

                <div>

                    <button class="btn form_btn" type="submit" name="submit"> 
                        <i class="fas fa-plus-circle log_out_btn"></i>
                    </button>

                </div>

                </form>






                    <div class="purple_line"></div>
                    <div class="gap"></div>


                    <div class="content_container_bg_less_thin">

                        <span></span>
                            
                        <p><b>Edit your schedule</b></p>

                        <span></span>
                
                    </div>





                    <table class="frame_table">
                    
                    <tr class="frame_header">

                        <th width="12%" class="frame_header_item">Shift</th>




                        @if(Session::get('DAY_TODAY')=='Sat')

                            <th width="12%" class="frame_header_item background_indicator_animation">Sat</th>

                        @else

                            <th width="12%" class="frame_header_item">Sat</th>

                        @endif




                        @if(Session::get('DAY_TODAY')=='Sun')

                            <th width="12%" class="frame_header_item background_indicator_animation">Sun</th>
                            
                        @else

                            <th width="12%" class="frame_header_item">Sun</th>

                        @endif




                        @if(Session::get('DAY_TODAY')=='Mon')

                            <th width="12%" class="frame_header_item background_indicator_animation">Mon</th>
                            
                        @else
    
                            <th width="12%" class="frame_header_item">Mon</th>
    
                        @endif




                        @if(Session::get('DAY_TODAY')=='Tue')

                            <th width="12%" class="frame_header_item background_indicator_animation">Tue</th>
                            
                        @else
    
                            <th width="12%" class="frame_header_item">Tue</th>
    
                        @endif




                        @if(Session::get('DAY_TODAY')=='Wed')

                            <th width="12%" class="frame_header_item background_indicator_animation">Wed</th>
                            
                        @else

                            <th width="12%" class="frame_header_item">Wed</th>

                        @endif




                        @if(Session::get('DAY_TODAY')=='Thu')

                            <th width="12%" class="frame_header_item background_indicator_animation">Thu</th>
                            
                        @else
    
                            <th width="12%" class="frame_header_item">Thu</th>
    
                        @endif




                        @if(Session::get('DAY_TODAY')=='Fri')

                            <th width="12%" class="frame_header_item background_indicator_animation">Fri</th>
                            
                        @else
    
                            <th width="12%" class="frame_header_item">Fri</th>
    
                        @endif




                        <th width="4%" class="frame_header_item table_item_red"><i class="fas fa-minus-circle log_out_btn"></i></th>

                    </tr>










                    @foreach($routine as $time)

                    <tr class="frame_rows">

                        <td class="frame_data" data-label="Shift">{{$time->F}} - {{$time->T}}</td>




                        @if(Session::get('DAY_TODAY')=='Sat')

                            <td class="frame_data border_indicator_animation" data-label="Sat">

                        @else

                            <td class="frame_data" data-label="Sat">

                        @endif

                                @if($time->Sat=='A' || $time->Sat=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Sat')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Sat=='N/A' || $time->Sat=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Sat')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Sat}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Sat}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Sun')

                            <td class="frame_data border_indicator_animation" data-label="Sun">

                        @else

                            <td class="frame_data" data-label="Sun">

                        @endif

                                @if($time->Sun=='A' || $time->Sun=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Sun')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Sun=='N/A' || $time->Sun=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Sun')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Sun}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Sun}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Mon')

                            <td class="frame_data border_indicator_animation" data-label="Mon">

                        @else

                            <td class="frame_data" data-label="Mon">

                        @endif

                                @if($time->Mon=='A' || $time->Mon=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Mon')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Mon=='N/A' || $time->Mon=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Mon')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Mon}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Mon}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Tue')

                            <td class="frame_data border_indicator_animation" data-label="Tue">

                        @else

                            <td class="frame_data" data-label="Tue">

                        @endif

                                @if($time->Tue=='A' || $time->Tue=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Tue')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Tue=='N/A' || $time->Tue=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Tue')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Tue}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Tue}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Wed')

                            <td class="frame_data border_indicator_animation" data-label="Wed">

                        @else

                            <td class="frame_data" data-label="Wed">

                        @endif

                                @if($time->Wed=='A' || $time->Wed=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Wed')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Wed=='N/A' || $time->Wed=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Wed')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Wed}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Wed}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Thu')

                            <td class="frame_data border_indicator_animation" data-label="Thu">

                        @else

                            <td class="frame_data" data-label="Thu">

                        @endif

                                @if($time->Thu=='A' || $time->Thu=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Thu')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Thu=='N/A' || $time->Thu=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Thu')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Thu}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Thu}}</p>
                                    </a>
                                @endif

                            </td>




                        @if(Session::get('DAY_TODAY')=='Fri')

                            <td class="frame_data border_indicator_animation" data-label="Fri">

                        @else

                            <td class="frame_data" data-label="Fri">

                        @endif

                                @if($time->Fri=='A' || $time->Fri=='a')
                                    <a href="{{url('/doctor/make_n_a/'.$time->AI_ID,'Fri')}}" class="">
                                        <p class="table_basic_btn table_item_green">Available</p>
                                    </a>
                                @elseif($time->Fri=='N/A' || $time->Fri=='n/a')
                                    <a href="{{url('/doctor/make_a/'.$time->AI_ID,'Fri')}}" class="">
                                        <p class="table_basic_btn table_item_red">{{$time->Fri}}</p>
                                    </a>
                                @else
                                    <a href="{{url('/doctor/reschedule/')}}" class="">
                                        <p class="table_basic_btn table_item_yellow">{{$time->Fri}}</p>
                                    </a>
                                @endif

                            </td>



                            <td width="4%" class="table_item_red table_basic_btn" data-label="Delete">

                                <a class="log_out_btn center_element" href="{{url('/doctor/delete_shift/'.$time->AI_ID)}}">

                                    <i class="fas fa-minus-circle"></i>
                            
                                </a>

                            </td>

                    </tr>

                    @endforeach

                </table>



                <div class="gap"></div>



    <!--Session message-->
    @if(session('msg')=='Seems like there are appointments present in this slot. Reschedule them first in order to edit routine.')

        <div class="content_container_bg_less_thin text_center warning_msg">{{session('msg')}}</div> 

    @elseif(session('msg')=='Seems like there are appointments present in some of the slots. Cancel them first in order to delete shift.')

        <div class="content_container_bg_less_thin text_center warning_msg">{{session('msg')}}</div>

    @elseif(session('msg')=='Shift deleted successfully.')

        <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div>

    @elseif(session('msg')=='Shift added successfully.')

        <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div>

    @endif









                

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Options</b></p>

                    <span></span>

                </div>









                @foreach($info as $data)

                <div class="options">

                    <form action="{{url('/doctor/set_patient_cap/')}}" method="post" class="option_container">
                    @csrf

                        <div class="content_container">

                            <input class="option_input" type="tel" name="patient_cap" value="{{$data->Patient_Cap}}" required>

                        </div>

                        <div class="option_label_btn_bar">

                            <label for="patient_cap" class="content_container_thin text_center center_element">Patients</label>
                            <button type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-check-square log_out_btn"></i></button>

                        </div>

                    </form>

                </div>

                @endforeach










@endsection

<!--------------------content end---------------------->
