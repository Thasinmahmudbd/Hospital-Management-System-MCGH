@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Edit Profile')






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

    <li class="link_item">
        <a href="{{url('/admin/admin/list')}}" class="link2">
            <i class="link_icons fas fa-user-shield"></i>
            <span class="link_name"> Admin </span>
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

<li class="link_item">
    <a href="{{url('/admin/edit/profile')}}" class="link">
        <i class="link_icons fas fa-user-edit"></i>
        <span class="link_name"> Edit Profile </span>
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
    <a class="mobile_link" href="{{url('/admin/admin/list')}}">Admin</a>
    <a class="mobile_link" href="{{url('/admin/show/services')}}">Other Services</a>
    <a class="mobile_link" href="{{url('/admin/edit/profile')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                    <form action="{{url('/admin/save_edit/')}}" method="post" enctype="multipart/form-data" class="rounded_photo_width_is_to_rest">
                    @csrf

                        <div class="content_container center_element">

                        @if(Session::get('ADMIN_IMAGE'))

                            <img src="{{asset('storage/admin_profile_pictures/'.Session::get('ADMIN_IMAGE'))}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">
                        
                        @elseif(Session::get('ADMIN_GENDER')=='male' || Session::get('ADMIN_GENDER')=='Male')

                            <img src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-employee-half-length-portrait-vector-male.png')}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">

                        @elseif(Session::get('ADMIN_GENDER')=='female' || Session::get('ADMIN_GENDER')=='Female')

                            <img src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-employee-half-length-portrait-vector-female.png')}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

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
                                <input type="text" value="{{Session::get('ADMIN_NAME')}}" name="ad_name" class="collected_info input">

                                <p class="collected_info">Email</p>
                                <p class="collected_info">:</p>
                                <input type="text" value="{{Session::get('ADMIN_EMAIL')}}" name="ad_email" class="collected_info input">

                                <p class="collected_info">Phone</p>
                                <p class="collected_info">:</p>
                                <input type="tel" value="{{Session::get('ADMIN_PHONE')}}" name="ad_phone" class="collected_info input">

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
