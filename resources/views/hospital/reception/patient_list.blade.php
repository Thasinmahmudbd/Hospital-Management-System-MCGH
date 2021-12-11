@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Patients List)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/home/')}}" class="link">
        <i class="link_icons fas fa-window-maximize"></i>
        <span class="link_name"> Patient Entry </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/emergency/')}}" class="link">
        <i class="link_icons fas fa-first-aid"></i>
        <span class="link_name"> Emergency </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/patient_list/'.Session::get('DATE_TODAY'))}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Daily Summary </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/invoice_list/appointment/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Generate Invoice </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/home/')}}">Patient Entry</a>
    <a class="mobile_link" href="{{url('/reception/emergency/')}}">Emergency</a>
    <a class="mobile_link" href="{{url('/reception/patient_list/'.Session::get('DATE_TODAY'))}}">Daily Summary</a>
    <a class="mobile_link" href="{{url('/reception/invoice_list/appointment/')}}">Generate Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')





                <div class="patient_and_doctor_info_one_is_to_one">

                    <p class="content_container_bg_less_thin text_center alert_msg">
                        You've collected : {{Session::get('collection')}} Tk.
                    </p>

                    <form action="{{url('/reception/filter/summary/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="date" class="input" name="summary_date" value="{{Session::get('DATE_TODAY')}}" required>
                            <button type="submit" class="btn form_btn" name="search_summary">Filter</button>

                        </div>

                    </form>



                </div>





                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="60%" class="frame_header_item">Transaction Message</th>
                        <th width="20%" class="frame_header_item">Timestamp</th>
                        <th width="15%" class="frame_header_item">Amount Collected</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($doctor as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data text_left" data-label="Transaction Message">Appointment for {{$list->P_ID}} with {{$list->D_ID}}.</td>
                        <td class="frame_data" data-label="Timestamp">{{$list->Time_Stamp}}</td>
                        <td class="frame_data text_right" data-label="Amount Collected">{{$list->Final_Fee}}</td>
                    </tr>

                    @endforeach
                    
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data text_left" data-label="Transaction Message">{{$list->Message}}</td>
                        <td class="frame_data" data-label="Timestamp">{{$list->Time_Stamp}}</td>
                        <td class="frame_data text_right" data-label="Amount Collected">{{$list->Credit}}</td>
                    </tr>

                    @endforeach

                </table>













@endsection

<!--------------------content end---------------------->