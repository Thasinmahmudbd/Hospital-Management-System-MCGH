@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','My Profile')








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

<form action="{{url('')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
@csrf

    <div class="patient_form_element_one_is_to_one_is_to_one">

        <div class="patient_form_element_one_is_to_three center_element content_container">
            <label class="center_element" for="search_from">From</label>
            <input class="input" type="date" name="search_from" required>  
        </div>

        <div class="patient_form_element_one_is_to_three center_element content_container">
            <label class="center_element" for="search_to">To</label>
            <input class="input" type="date" name="search_to" required>  
        </div>

        <select name="type" id="type" class="input content_container_white_thin" required>

            <option value="">All</option>
            <option value="">Tax</option>
            <option value="">Total Income</option>
            <option value="">Total Profit</option>
            <option value="">Current Balance</option>

        </select>

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
        
        <p><b>Logs</b></p>

    <span></span>

</div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="10%" class="frame_header_item">Date</th>
                        <th width="30%" class="frame_header_item">Message</th>
                        <th width="15%" class="frame_header_item">Debit</th>
                        <th width="15%" class="frame_header_item">Credit</th>
                        <th width="15%" class="frame_header_item">Total Income</th>
                        <th width="15%" class="frame_header_item">Total Profit</th>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Date"></td>
                        <td class="frame_data" data-label="Message"></td>
                        <td class="frame_data" data-label="Debit"></td>
                        <td class="frame_data" data-label="Credit"></td>
                        <td class="frame_data" data-label="Total Income"></td>
                        <td class="frame_data" data-label="Total Profit"></td>
                    </tr>

                </table>

@endsection

<!--------------------content end---------------------->
