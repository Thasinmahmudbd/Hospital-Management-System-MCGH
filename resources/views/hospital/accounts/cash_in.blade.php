@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Cash In (Full List)')








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







<div class="patient_form_element_three_is_to_one">

    <p class="content_container_thin text_center">
        Refreshing before every action is recommended.
    </p>

    <a class="content_container_thin title_bar_purple btn form_btn" href="{{url('/accounts/cash/in/')}}">Refresh</a>

</div>




<div class="purple_line"></div>
<div class="gap"></div>








        <table class="frame_table">
            
            <tr class="frame_header">
                <th width="10%" class="frame_header_item">S/N</th>
                <th width="15%" class="frame_header_item">R-ID</th>
                <th width="25%" class="frame_header_item">Receptionist</th>
                <th width="20%" class="frame_header_item">Collected (TK)</th>
                <th width="20%" class="frame_header_item">Cashed In (TK)</th>
                <th width="10%" class="frame_header_item">Action</th>
            </tr>

            <form action="{{url('')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
            @csrf

            <tr class="frame_rows">
                <td class="frame_data" data-label="S/N"></td>
                <td class="frame_data" data-label="R-ID"></td>
                <td class="frame_data" data-label="Receptionist"></td>
                <td class="frame_data" data-label="Collected"></td>
                <td class="frame_data" data-label="Cashed In">

                    <input class="input" type="number" name="search_from" required> 

                </td>

                <td class="frame_action" data-label="Action">

                    <button class="btn_less" type="submit" name="submit"> 

                        <i class="fas fa-check-circle table_btn"></i>

                    </button>

                </td>
            </tr>

            </form>

        </table>

@endsection

<!--------------------content end---------------------->
