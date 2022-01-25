@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Edit Profile')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/accounts/home/')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> My Profile </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/doctor/income/')}}" class="link">
        <i class="link_icons fas fa-hand-holding-usd"></i>
        <span class="link_name"> Doctor's Income </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/cash/in/')}}" class="link">
        <i class="link_icons fas fa-cash-register"></i>
        <span class="link_name"> Cash In </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/pay/salary/')}}" class="link">
        <i class="link_icons fas fa-credit-card"></i>
        <span class="link_name"> Pay Salary </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/creditors/')}}" class="link">
        <i class="link_icons fas fa-search-dollar"></i>
        <span class="link_name"> Creditors </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/patient/release/')}}" class="link">
        <i class="link_icons fas fa-hospital-user"></i>
        <span class="link_name"> Patient Release </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/release/slips/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Release Slips </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/ambulance/')}}" class="link">
        <i class="link_icons fas fa-ambulance"></i>
        <span class="link_name"> Ambulance </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/other/transactions/')}}" class="link">
        <i class="link_icons fas fa-random"></i>
        <span class="link_name"> Other Transactions </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/log/')}}" class="link">
        <i class="link_icons fas fa-clipboard-list"></i>
        <span class="link_name"> Logs </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/accounts/edit_profile/')}}" class="link">
        <i class="link_icons fas fa-user-edit"></i>
        <span class="link_name"> Edit Profile </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/accounts/home/')}}">My Profile</a>
    <a class="mobile_link" href="{{url('/accounts/doctor/income/')}}">Doctors Income</a>
    <a class="mobile_link" href="{{url('/accounts/cash/in/')}}">Cash In</a>
    <a class="mobile_link" href="{{url('/accounts/pay/salary/')}}">Pay Salary</a>
    <a class="mobile_link" href="{{url('/accounts/creditors/')}}">Creditors</a>
    <a class="mobile_link" href="{{url('/accounts/patient/release/')}}">Patient Release</a>
    <a class="mobile_link" href="{{url('/accounts/release/slips/')}}">Release Slips</a>
    <a class="mobile_link" href="{{url('/accounts/ambulance/')}}">Ambulance</a>
    <a class="mobile_link" href="{{url('/accounts/other/transactions/')}}">Other Transactions</a>
    <a class="mobile_link" href="{{url('/accounts/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/accounts/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                    <form action="{{url('/accounts/save_edit/')}}" method="post" enctype="multipart/form-data" class="rounded_photo_width_is_to_rest">
                    @csrf

                        <div class="content_container center_element">

                        @if(Session::get('ACCOUNTANTS_IMAGE'))

                            <img src="{{asset('storage/account_profile_pictures/'.Session::get('ACCOUNTANTS_IMAGE'))}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">
                        
                        @elseif(Session::get('ACCOUNTANTS_GENDER')=='male' || Session::get('ACCOUNTANTS_GENDER')=='Male')

                            <img src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-male.png')}}" alt="Upload Photo" class="placeholder_image" width="100%" onclick="triggerClick()">

			                <input class="input img_uploader" type="file" name="profile_photo" onchange="displayImage(this)" id="place_holder">

                        @elseif(Session::get('ACCOUNTANTS_GENDER')=='female' || Session::get('ACCOUNTANTS_GENDER')=='Female')

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
                                <input type="text" value="{{Session::get('ACCOUNTANTS_NAME')}}" name="acc_name" class="collected_info input">

                                <p class="collected_info">Email</p>
                                <p class="collected_info">:</p>
                                <input type="text" value="{{Session::get('ACCOUNTANTS_EMAIL')}}" name="acc_email" class="collected_info input">

                                <p class="collected_info">Phone</p>
                                <p class="collected_info">:</p>
                                <input type="tel" value="{{Session::get('ACCOUNTANTS_PHONE')}}" name="acc_phone" class="collected_info input">

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
