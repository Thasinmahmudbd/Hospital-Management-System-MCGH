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
    <a href="{{url('/accounts/cash/in/'.Session::get('DATE_TODAY'))}}" class="link">
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
    <a class="mobile_link" href="{{url('/accounts/cash/in/'.Session::get('DATE_TODAY'))}}">Cash In</a>
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



<form action="{{url('/accounts/doctor/income/filter/')}}" method="post" class="content_container patient_info_form">
@csrf

    <div class="doctor_search_form_element">

        <label for="doctor_name_search" class="collected_info vanish_label">Search Doctor</label>

        <div class="patient_and_doctor_info_one_is_to_one">

            <input type="text" class="input" name="doctor_search_info" placeholder="Enter Doctor Name or ID">

            <select name="department" id="department" class="input" required>

                <option value="All">All</option>

                @foreach($department as $list)
                <option value="{{$list->Department}}">{{$list->Department}}</option>
                @endforeach

            </select>

        </div>

        <button type="submit" class="btn form_btn" name="search_doctor">Search</button>

    </div>

</form>



<div class="purple_line"></div>
<div class="gap"></div>


    <div class="content_container_bg_less_thin">

        <span></span>
            
            <p><b>{{Session::get('doctor_salary_filter_type')}}</b></p>

        <span></span>

    </div>



<div class="doctors_list">

    @foreach($result as $doctor)
    <!--<a href="{{url('/accounts/doctor/income/select/')}}">-->
    <form class="doctor_list_item" action="{{url('/accounts/doctor/income/details/')}}" method="post">
    @csrf
        <input type="hidden" name="d_id" value="{{$doctor->D_ID}}">
        <input type="hidden" name="dr_name" value="{{$doctor->Dr_Name}}">
        <button type="submit" name="select_doctor" class="btn capsule">

        

            @if($doctor->Dr_Image)

                <img class="round_image" src="{{asset('storage/doctor_profile_pictures/'.$doctor->Dr_Image)}}" alt="" width="100%">

            @elseif($doctor->Dr_Gender=='male' || $doctor->Dr_Gender=='Male')

                <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-male.png')}}" alt="" width="100%">

            @elseif($doctor->Dr_Gender=='female' || $doctor->Dr_Gender=='Female')

                <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-female.png')}}" alt="" width="100%">

            @else

                <img class="round_image" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100%">

            @endif

        

            <div class="doctor_name_dept">
                <p class="doctor_name">{{$doctor->Dr_Name}}</p>
                <p> Wallet: {{$doctor->Wallet}} tk </p>
            </div>
        </button>
    </form>
    <!--</a>-->
    @endforeach


</div>







@endsection

<!--------------------content end---------------------->
