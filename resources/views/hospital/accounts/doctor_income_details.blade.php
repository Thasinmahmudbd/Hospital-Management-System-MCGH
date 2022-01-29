@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Log Details')








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

<div class="content_container_bg_less_thin">

<span></span>
    
    <p><b>Search Logs</b></p>

<span></span>

</div>





<form action="{{url('/accounts/doctor/income/details/filter/')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
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
<div class="gap"></div>


<div class="content_container_bg_less_thin">

    <span></span>

        @if(Session::get('from')!='none')

            <div class="patient_form_element_three_is_to_one">

                <p><b>Log details</b> of {{Session::get('Dr_Name')}} ({{Session::get('D_ID')}}). From {{Session::get('from')}} To {{Session::get('to')}}.</p>

                <form class="text_right" action="{{url('/accounts/doctor/income/details/')}}" method="post">
                @csrf
                    <input type="hidden" name="d_id" value="{{Session::get('D_ID')}}">
                    <input type="hidden" name="dr_name" value="{{Session::get('Dr_Name')}}">
                    <input type="submit" name="select_doctor" value="Show All" class="btn_less btn text_link">
                </form>

            </div>

        @else

            <p><b>Log details</b> of {{Session::get('Dr_Name')}} ({{Session::get('D_ID')}}). </p> 

        @endif

    <span></span>

</div>





        <table class="frame_table">
            
            <tr class="frame_header">
                <th width="5%" class="frame_header_item">S/N</th>
                <th width="19" class="frame_header_item">Timestamp</th>
                <th width="19%" class="frame_header_item">Debit</th>
                <th width="19%" class="frame_header_item">Credit</th>
                <th width="19%" class="frame_header_item">Income</th>
                <th width="19%" class="frame_header_item">Current Balance</th>
            </tr>

            <?php $serial = 1; ?>
            @foreach($logs as $log)
            <tr class="frame_rows">
                <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                <td class="frame_data" data-label="Timestamp">{{$log->Time_Stamp}}</td>
                <td class="frame_data text_right" data-label="Debit">{{$log->Debit}}</td>
                <td class="frame_data text_right" data-label="Credit">{{$log->Credit}}</td>
                <td class="frame_data text_right" data-label="Income">{{$log->Income}}</td>

                @if(Session::get('from')!='none')
                    <td class="frame_data text_right" data-label="Current Balance">{{$log->Current_Balance }}</td>
                @else
                    <td class="frame_data text_right first_child_indicator_animation" data-label="Current Balance">{{$log->Current_Balance }}</td>
                @endif
            </tr>
            @endforeach

        </table>

@endsection

<!--------------------content end---------------------->
