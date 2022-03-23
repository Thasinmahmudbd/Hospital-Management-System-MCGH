@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Pay Salary')








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

<form action="{{url('/accounts/pay/salary/search')}}" method="post" class="content_container patient_info_form">
@csrf

    <div class="doctor_search_form_element">

        @if(session('pay_salary_person')!='Others')
        <label for="doctor_name_search" class="collected_info vanish_label">Search Employee</label>
        @else
        <label for="doctor_name_search" class="collected_info vanish_label">ID less accounts:</label>
        @endif

        <div class="patient_and_doctor_info_one_is_to_one">

            @if(session('pay_salary_person')!='Others')
            <input type="text" class="input" name="employee_search_info" placeholder="Enter Employee Name or ID">
            @else
            <label class="collected_info vanish_label">Be careful while entering name. This is uneditable.</label>
            @endif

            <select name="type" id="type" class="input" required>

                <option value="Doctors">Doctors</option>
                <option value="Nurses">Nurses</option>
                <option value="Receptionists">Receptionists</option>
                <option value="Accountants">Accountants</option>
                <option value="Others">Others</option>

            </select>

        </div>

        <button type="submit" class="btn form_btn" name="search_doctor">Search</button>

    </div>

</form>



<div class="purple_line"></div>
<div class="gap"></div>



    <!--Session message-->

    @if(session('msg')=='Salary payment log Successfully updated')

    <div class="content_container text_center success_msg">{{session('msg')}}</div>

    @elseif(session('msg')=='Insufficient balance on user wallet.')

    <div class="content_container text_center warning_msg">{{session('msg')}}</div>

    @elseif(session('msg')=='Entry must be greater then 0.')

    <div class="content_container text_center alert_msg">{{session('msg')}}</div>

    @endif



    <div class="content_container_bg_less_thin">

        <span></span>
            
            <p><b>{{session('pay_salary_person')}}</b></p>

        <span></span>

    </div>




    @if(session('pay_salary_person')=='Doctors')

    <div class="one_line_five_item_style_one">

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100px">
        
        <!--<p class="content_container_bg_change_thin text_center center_element frame_header_item"><b><i class="fas fa-user-circle text_center center_element round_image thumbnail"></i></b></p>-->
        
        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>ID</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Name</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Wallet</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Enter Salary</b></p>

    </div>




    @foreach($result as $item)
    <div class="one_line_five_item_style_one">

        @if($item->Dr_Image)

        <img class="round_image thumbnail" src="{{asset('storage/doctor_profile_pictures/'.$item->Dr_Image)}}" alt="" width="100px">

        @elseif($item->Dr_Gender=='male' || $item->Dr_Gender=='Male')

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-male.png')}}" alt="" width="100px">

        @elseif($item->Dr_Gender=='female' || $item->Dr_Gender=='Female')

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-doctor-half-length-portrait-vector-female.png')}}" alt="" width="100px">

        @else

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100px">

        @endif

        <p class="content_container_bg_change_thin text_center center_element">{{$item->D_ID}}</p>

        <a href="{{url('/accounts/salary/log/'.$item->D_ID)}}" class="content_container_bg_change_thin text_center center_element">{{$item->Dr_Name}}</a>

        <p class="content_container_bg_change_thin text_center center_element">{{$item->Wallet}}Tk</p>

        <form action="{{url('/accounts/pay/salary/submit/')}}" method="post" class="content_container_bg_change_thin">
        @csrf

            <div class="patient_form_element_three_is_to_one">

                <input type="tel" class="input" name="amount" placeholder="Enter Amount" required>
                <input type="hidden" value="{{$item->D_ID}}" name="wallet_hook">

                <button type="submit" class="btn form_btn" name="pay">Pay</button>

            </div>

        </form>

    </div>
    @endforeach







    @elseif(session('pay_salary_person')=='Nurses')

    <div class="one_line_four_item_style_one">
        
        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>ID</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Name</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Wallet</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Enter Salary</b></p>

    </div>




    @foreach($result as $item)
    <div class="one_line_four_item_style_one">

        <p class="content_container_bg_change_thin text_center center_element">{{$item->N_ID}}</p>

        <a href="{{url('/accounts/salary/log/'.$item->N_ID)}}" class="content_container_bg_change_thin text_center center_element">{{$item->N_Name}}</a>

        <p class="content_container_bg_change_thin text_center center_element">{{$item->Wallet}}Tk</p>

        <form action="{{url('/accounts/pay/salary/submit/')}}" method="post" class="content_container_bg_change_thin">
        @csrf

            <div class="patient_form_element_three_is_to_one">

                <input type="tel" class="input" name="amount" placeholder="Enter Amount" required>
                <input type="hidden" value="{{$item->N_ID}}" name="wallet_hook">

                <button type="submit" class="btn form_btn" name="pay">Pay</button>

            </div>

        </form>

    </div>
    @endforeach







    @elseif(session('pay_salary_person')=='Receptionists')

    <div class="one_line_three_item_style_one">
        
        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>ID</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Name</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Enter Salary</b></p>

    </div>




    @foreach($result as $item)
    <div class="one_line_three_item_style_one">

        <p class="content_container_bg_change_thin text_center center_element">{{$item->R_ID}}</p>

        <a href="{{url('/accounts/salary/log/'.$item->R_ID)}}" class="content_container_bg_change_thin text_center center_element">{{$item->R_Name}}</a>

        <form action="{{url('/accounts/pay/salary/submit/')}}" method="post" class="content_container_bg_change_thin">
        @csrf

            <div class="patient_form_element_three_is_to_one">

                <input type="tel" class="input" name="amount" placeholder="Enter Amount" required>
                <input type="hidden" value="{{$item->R_ID}}" name="wallet_hook">

                <button type="submit" class="btn form_btn" name="pay">Pay</button>

            </div>

        </form>

    </div>
    @endforeach







    @elseif(session('pay_salary_person')=='Accountants')

    <div class="one_line_four_item_style_two">

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100px">
        
        <!--<p class="content_container_bg_change_thin text_center center_element frame_header_item"><b><i class="fas fa-user-circle text_center center_element round_image thumbnail"></i></b></p>-->
        
        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>ID</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Name</b></p>

        <p class="content_container_bg_change_thin text_center center_element frame_header_item"><b>Enter Salary</b></p>

    </div>




    @foreach($result as $item)
    <div class="one_line_four_item_style_two">

        @if($item->Acc_Image)

        <img class="round_image thumbnail" src="{{asset('storage/account_profile_pictures/'.$item->Acc_Image)}}" alt="" width="100px">

        @elseif($item->Acc_Gender=='male' || $item->Acc_Gender=='Male')

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-account-half-length-portrait-vector-male.png')}}" alt="" width="100px">

        @elseif($item->Acc_Gender=='female' || $item->Acc_Gender=='Female')

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/default-placeholder-account-half-length-portrait-vector-female.png')}}" alt="" width="100px">

        @else

        <img class="round_image thumbnail" src="{{url('/UI_Assets/Media/Images/Template_Images/system/Profile_avatar_placeholder_large.png')}}" alt="" width="100px">

        @endif

        <p class="content_container_bg_change_thin text_center center_element">{{$item->Acc_ID}}</p>

        <a href="{{url('/accounts/salary/log/'.$item->Acc_ID)}}" class="content_container_bg_change_thin text_center center_element">{{$item->Acc_Name}}</a>

        <form action="{{url('/accounts/pay/salary/submit/')}}" method="post" class="content_container_bg_change_thin">
        @csrf

            <div class="patient_form_element_three_is_to_one">

                <input type="tel" class="input" name="amount" placeholder="Enter Amount" required>
                <input type="hidden" value="{{$item->Acc_ID}}" name="wallet_hook">

                <button type="submit" class="btn form_btn" name="pay">Pay</button>

            </div>

        </form>

    </div>
    @endforeach





    @elseif(session('pay_salary_person')=='Others')

    <form action="{{url('/accounts/pay/salary/submit/')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
    @csrf

        <div class="patient_and_doctor_info_one_is_to_one">

            <div class="patient_form_element_one_is_to_three center_element content_container">
                <label class="center_element" for="name">Name</label>
                <input class="input" type="text" name="name" required>  
            </div>

            <div class="patient_form_element_one_is_to_three center_element content_container">
                <label class="center_element" for="amount">Salary</label>
                <input class="input" type="text" name="amount" required>  
            </div>

        </div>

        <div>

            <button class="btn form_btn" type="submit" name="submit"> 
                <i class="fas fa-check-circle log_out_btn"></i>
            </button>

        </div>

    </form>

    <div class="purple_line"></div>
    <div class="gap"></div>






    <!-- Filtering others -->

    <div class="content_container_bg_less_thin">

        <span></span>
            
            <p><b>Filter</b></p>

        <span></span>

    </div>

    <form action="{{url('/accounts/salary/log/filter/'.Session::get('Salary_log_of_Emp_ID'))}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
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

                    <p><b>Log details,</b> From {{Session::get('from')}} To {{Session::get('to')}}.</p>

                    <form class="text_right" action="{{url('/accounts/salary/log/'.Session::get('Salary_log_of_Emp_ID'))}}" method="get">
                    @csrf
                        <input type="submit" name="select_doctor" value="Show All" class="btn_less btn text_link">
                    </form>

                </div>

            @else

                <p><b>Log details</b></p> 

            @endif

        <span></span>

    </div>





        <table class="frame_table">
            
            <tr class="frame_header">
                <th width="5%" class="frame_header_item">S/N</th>
                <th width="50" class="frame_header_item">Transaction Message</th>
                <th width="15%" class="frame_header_item">Salary Paid</th>
                <th width="15%" class="frame_header_item">Accountant</th>
                <th width="15%" class="frame_header_item">Payment Date & Time</th>
            </tr>

            <?php $serial = 1; ?>
            @foreach($result as $log)
            <tr class="frame_rows">
                <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                <td class="frame_data" data-label="Transaction Message">{{$log->Log_Message}}</td>
                <td class="frame_data text_right" data-label="Salary Paid">{{$log->Log_Amount}}</td>
                <td class="frame_data" data-label="Accountant">{{$log->Acc_ID}}</td>
                <td class="frame_data" data-label="Payment Date & Time">{{$log->Time_Stamp}}</td>
            </tr>
            @endforeach

        </table>

    @endif












@endsection

<!--------------------content end---------------------->
