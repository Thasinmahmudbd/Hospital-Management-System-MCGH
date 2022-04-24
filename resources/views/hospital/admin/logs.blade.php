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

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/admin/home/')}}">Dashboard</a>
    <a class="mobile_link" href="{{url('/admin/log/')}}">Logs</a>
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
