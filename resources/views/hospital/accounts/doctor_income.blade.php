@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type',"Doctor's Income")








<!--------------------charts----------------------->

@section('charts')



@endsection

<!-------------------charts end-------------------->











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
    <a href="{{url('/accounts/pay/salary/')}}" class="link">
        <i class="link_icons fas fa-credit-card"></i>
        <span class="link_name"> Pay Salary </span>
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
    <a class="mobile_link" href="{{url('/accounts/pay/salary/')}}">Pay Salary</a>
    <a class="mobile_link" href="{{url('/accounts/log/')}}">Logs</a>
    <a class="mobile_link" href="{{url('/accounts/edit_profile/')}}">Edit Profile</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')



<form action="{{url('')}}" method="post" class="content_container patient_info_form">
@csrf

    <div class="doctor_search_form_element">

        <label for="doctor_name_search" class="collected_info vanish_label">Search Doctor</label>

        <div class="patient_and_doctor_info_one_is_to_one">

            <input type="text" class="input" name="doctor_search_info" placeholder="Enter Doctor Name or ID" required>

            <select name="department" id="department" class="input" required>

                <option value="">All</option>
                <option value="">Department</option>
                <option value="">Department</option>
                <option value="">Department</option>
                <option value="">Department</option>
                <option value="">Department</option>

            </select>

        </div>

        <button type="submit" class="btn form_btn" name="search_doctor">Search</button>

    </div>

</form>



<div class="purple_line"></div>
<div class="gap"></div>


    <div class="content_container_bg_less_thin">

        <span></span>
            
            <p><b>All</b></p>

        <span></span>

    </div>



<div class="doctors_list">

    <a href="{{url('/accounts/doctor/income/select/')}}"><!--<form class="doctor_list_item" action="{{url('')}}" method="post">-->
    @csrf
        <input type="hidden" name="d_id" value="">
        <input type="hidden" name="dr_name" value="">
        <input type="hidden" name="fee" value="">
        <input type="hidden" name="second_visit_discount" value="">
        <button type="submit" name="select_doctor" class="btn capsule">

        

            <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-male.png')}}" alt="" width="100%">

        

            <!--<img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-female.png')}}" alt="" width="100%">

        

            <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100%">-->

        

            <div class="doctor_name_dept">
                <p class="doctor_name">Name</p>
                <p> Wallet: 10 tk </p>
            </div>
        </button>
    <!--</form>--></a>

</div>







@endsection

<!--------------------content end---------------------->
