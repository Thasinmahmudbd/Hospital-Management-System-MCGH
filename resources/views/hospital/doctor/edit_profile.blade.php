@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Edit Profile')






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

                    <form action="{{url('/doctor/save_edit/')}}" method="post" enctype="multipart/form-data" class="rounded_photo_width_is_to_rest">
                    @csrf

                        <div class="content_container center_element">

                        @if(Session::get('DOCTORS_IMAGE'))

                            <img src="{{asset('storage/doctor_profile_pictures/'.Session::get('DOCTORS_IMAGE'))}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">
                        
                        @elseif(Session::get('DOCTORS_GENDER')=='male' || Session::get('DOCTORS_GENDER')=='Male')

                            <img src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-male.png')}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">

                        @elseif(Session::get('DOCTORS_GENDER')=='female' || Session::get('DOCTORS_GENDER')=='Female')

                            <img src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-female.png')}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">

                        @else

                            <img src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

                            <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">

                        @endif

                        </div>





                        <div class="span_hidden_bar">

                            <div class="info content_container_bg_less">

                                <p class="collected_info">Name</p>
                                <p class="collected_info">:</p>
                                <input type="text" value="{{Session::get('DOCTORS_NAME')}}" name="doc_name" class="collected_info input">

                                <p class="collected_info">Department</p>
                                <p class="collected_info">:</p>
                                <input type="text" value="{{Session::get('DOCTORS_DEPARTMENT')}}" name="doc_dept" class="collected_info input">

                                <p class="collected_info">Specialty</p>
                                <p class="collected_info">:</p>
                                <input type="text" value="{{Session::get('DOCTORS_SPECIALTY')}}" name="doc_specialty" class="collected_info input">

                                <p class="collected_info">Fee</p>
                                <p class="collected_info">:</p>
                                <input type="tel" value="{{Session::get('DOCTORS_BASIC_FEE')}}" name="doc_fee" class="collected_info input">

                                <p class="collected_info">Discount</p>
                                <p class="collected_info">:</p>
                                <input type="tel" value="{{Session::get('DOCTORS_DISCOUNT')}}" name="doc_discount" class="collected_info input">

                            </div>

                            <button type="submit" class="cancel_btn_style purple_icon">
                                <i class="fas fa-check-circle log_out_btn purple_icon"></i>
                            </button>

                        </div>

                    </form>

                    @error('profile_photo')
						<span class="content_container_bg_less_thin text_center warning_msg">{{$message}}</span>
					@enderror























@endsection

<!--------------------content end---------------------->
