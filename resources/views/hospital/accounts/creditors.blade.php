@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Creditors')








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
    <a href="{{url('/accounts/pay/salary/'.Session::get('pay_salary_person'))}}" class="link">
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
    <a class="mobile_link" href="{{url('/accounts/pay/salary/'.Session::get('pay_salary_person'))}}">Pay Salary</a>
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

    <p class="content_container_bg_less_thin text_left">
            Logs are updated after every action. Click on logs to check logs.
    </p>

    <div class="patient_form_element_three_is_to_one">
        <span></span>
        <a class="content_container_thin title_bar_purple btn form_btn" href="{{url('/account/creditor/log/')}}">Logs</a>
    </div>

</div>




<div class="purple_line"></div>
<div class="gap"></div>







        <!--Session message-->

        @if(session('msg')=='Successfully paid creditors.')

        <div class="content_container text_center success_msg">{{session('msg')}}</div>

        @elseif(session('msg')=='Sorry, you are trying to overpay.')

        <div class="content_container text_center warning_msg">{{session('msg')}}</div>

        @elseif(session('msg')=='Invalid amount.')

        <div class="content_container text_center alert_msg">{{session('msg')}}</div>

        @endif







        <table class="frame_table">
            
            <tr class="frame_header">
                <th width="5%" class="frame_header_item">S/N</th>
                <th width="60%" class="frame_header_item">Name</th>
                <th width="15%" class="frame_header_item">Owned (TK)</th>
                <th width="15%" class="frame_header_item">Pay (TK)</th>
                <th width="5%" class="frame_header_item">Action</th>
            </tr>

            <!--From bed invigilators-->

            <?php $serial = 1; ?>
            @foreach($result1 as $item)
            <form action="{{url('/account/creditor/pay/')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
            @csrf

            <tr class="frame_rows">
                <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                <td class="frame_data" data-label="Name">{{$item->Assistant_Name}}</td>
                <td class="frame_data" data-label="Owned (TK)">{{$item->Assistant_Fee-$item->Debt_Payed}}</td>
                <td class="frame_data" data-label="Pay (TK)">

                    <input class="input" type="tel" name="payed_amount" required> 
                    <input class="input" type="hidden" name="ai_id" value="{{$item->AI_ID}}"> 
                    <input class="input" type="hidden" name="table" value="bed_invigilators"> 
                    <input class="input" type="hidden" name="name" value="{{$item->Assistant_Name}}"> 

                </td>

                <td class="frame_action" data-label="Action">

                    <button class="btn_less" type="submit" name="submit"> 

                        <i class="fas fa-check-circle table_btn"></i>

                    </button>

                </td>
            </tr>

            </form>
            @endforeach

            <!--From OT assistant logs-->

            @foreach($result2 as $item)
            <form action="{{url('/account/creditor/pay/')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
            @csrf

            <tr class="frame_rows">
                <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                <td class="frame_data" data-label="Name">{{$item->Assistant_Name}}</td>
                <td class="frame_data" data-label="Owned (TK)">{{$item->Assistant_Fee-$item->Debt_Payed}}</td>
                <td class="frame_data" data-label="Pay (TK)">

                    <input class="input" type="tel" name="payed_amount" required> 
                    <input class="input" type="hidden" name="ai_id" value="{{$item->AI_ID}}"> 
                    <input class="input" type="hidden" name="table" value="ot_assistant_logs"> 
                    <input class="input" type="hidden" name="name" value="{{$item->Assistant_Name}}"> 

                </td>

                <td class="frame_action" data-label="Action">

                    <button class="btn_less" type="submit" name="submit"> 

                        <i class="fas fa-check-circle table_btn"></i>

                    </button>

                </td>
            </tr>

            </form>
            @endforeach

        </table>

@endsection

<!--------------------content end---------------------->
