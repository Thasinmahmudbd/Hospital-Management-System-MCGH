@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','My Logs')






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
            
            <p><b>Search patients</b></p>

        <span></span>

    </div>





    <form action="{{url('/doctor/search_based_on_date/')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
    @csrf

        <div class="patient_and_doctor_info_one_is_to_one">

            <div class="patient_form_element_one_is_to_three center_element content_container">
                <label class="center_element" for="search_from">From</label>
                <input class="input" type="date" name="search_from" required>  
            </div>

            <div class="patient_form_element_one_is_to_three center_element content_container">
                <label class="center_element" for="search_to">To</label>
                <input class="input" type="date" name="search_to" required>  
            </div>

        </div>

        <div>

            <button class="btn form_btn" type="submit" name="submit"> 
                <i class="fas fa-search log_out_btn"></i>
            </button>

        </div>

    </form>




    <div class="purple_line"></div>


    <div class="content_container_bg_less_thin">

        <span></span>
            
            <p><b>Logs {{Session::get('LOG_LIMIT')}}</b></p>

        <span></span>

    </div>





                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="20%" class="frame_header_item">Date</th>
                        <th width="30%" class="frame_header_item">P-ID</th>
                        <th width="30%" class="frame_header_item">Patient Name</th>
                        <th width="20%" class="frame_header_item">Gender</th>
                    </tr>

                    @foreach($patients as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Date">{{$list->Ap_Date}}</td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Gender">{{$list->Patient_Gender}}</td>
                    </tr>

                    @endforeach

                </table>







@endsection

<!--------------------content end---------------------->
