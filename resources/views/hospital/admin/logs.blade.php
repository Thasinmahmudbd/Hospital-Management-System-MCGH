@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Transaction Logs')








<!--------------------charts----------------------->

@section('charts')



@endsection

<!-------------------charts end-------------------->











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
    <a href="#" class="link" onclick="toggleSubLinkContainer4()">
        <i class="link_icons fas fa-vials"></i>
        <span class="link_name"> Tests </span>
    </a>
</li>

<div class="sub_link_item disNone" id="subLinkContainer4">

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Pathology')}}" class="link2">
            <i class="link_icons fas fa-tint"></i>
            <span class="link_name"> Pathology </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Hormone')}}" class="link2">
            <i class="link_icons fas fa-dna"></i>
            <span class="link_name"> Hormone </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Ultrasonography')}}" class="link2">
            <i class="link_icons fas fa-wave-square"></i>
            <span class="link_name"> Ultrasonography </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'X-Ray')}}" class="link2">
            <i class="link_icons fas fa-x-ray"></i>
            <span class="link_name"> X-Ray </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Dental')}}" class="link2">
            <i class="link_icons fas fa-tooth"></i>
            <span class="link_name"> Dental </span>
        </a>
    </li>

    <li class="link_item">
        <a href="{{url('/admin/test/list/'.'Others')}}" class="link2">
            <i class="link_icons fas fa-vial"></i>
            <span class="link_name"> Others </span>
        </a>
    </li>

</div>

<li class="link_item">
    <a href="{{url('/admin/show/services')}}" class="link">
        <i class="link_icons fas fa-stethoscope"></i>
        <span class="link_name"> Other Services </span>
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
    <a class="mobile_link" href="{{url('/admin/show/services')}}">Other Services</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

<form action="{{url('/admin/log/filter')}}" method="post" class="span_hidden_bar content_container_bg_less_thin center_element">
@csrf

    <div class="patient_form_element_one_is_to_one_is_to_one">

        <div class="patient_form_element_one_is_to_three center_element content_container">
            <label class="center_element" for="search_from">From</label>
            <input class="input" type="date" name="search_from">  
        </div>

        <div class="patient_form_element_one_is_to_three center_element content_container">
            <label class="center_element" for="search_to">To</label>
            <input class="input" type="date" name="search_to">  
        </div>

        <select name="type" id="type" class="input content_container_white_thin" required>

            <option value="Credit">Credit</option>
            <option value="Debit">Debit</option>
            <option value="Total_Income">Total Income</option>
            <option value="Doctor Salary">Doctor Salary</option>
            <option value="Nurse Salary">Nurse Salary</option>
            <option value="Reception Salary">Reception Salary</option>
            <option value="Account Salary">Account Salary</option>
            <option value="Other Salary">Other Salary</option>
            <option value="Creditor">Creditors</option>
            <option value="Ambulance">Ambulance</option>
            <option value="Others">Others</option>


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
        
        <p><b>{{session('logs_hook')}} Logs, Sum: {{session('total_of_data')}}</b></p>

    <span></span>

</div>

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="20%" class="frame_header_item">Date</th>
                        <th width="40%" class="frame_header_item text_left">Message</th>
                        <th width="20%" class="frame_header_item text_left">Type</th>
                        <th width="15%" class="frame_header_item text_right">Amount</th>
                    </tr>

                    @if(session('tp')=='1')

                        <?php 
                            $serial = 1;
                            $hook = session('lg'); 
                        ?>
                        @foreach($result as $item)
                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                            <td class="frame_data" data-label="Date">{{$item->Time_Stamp}}</td>
                            <td class="frame_data text_left" data-label="Message">{{$item->Message}}</td>
                            <td class="frame_data text_left" data-label="Type">{{$item->Credit_Type}}</td>
                            <td class="frame_data text_right" data-label="Amount">{{$item->$hook}}</td>
                        </tr>
                        @endforeach

                    @elseif(session('tp')=='2')

                        <?php 
                            $serial = 1;
                        ?>
                        @foreach($result as $item)
                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                            <td class="frame_data" data-label="Date">{{$item->Time_Stamp}}</td>
                            <td class="frame_data text_left" data-label="Message">{{$item->Log_Message}}</td>
                            <td class="frame_data text_left" data-label="Type">{{$item->Log_Type}}</td>
                            <td class="frame_data text_right" data-label="Amount">{{$item->Log_Amount}}</td>
                        </tr>
                        @endforeach

                    @endif

                </table>

@endsection

<!--------------------content end---------------------->
