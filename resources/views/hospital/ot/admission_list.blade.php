@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (New Entry)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/ot/home/')}}" class="link">
        <i class="link_icons fas fa-window-maximize"></i>
        <span class="link_name"> Schedule </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/admission/list/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> New Entry </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/invoice/')}}" class="link">
        <i class="link_icons fas fa-file-invoice"></i>
        <span class="link_name"> Invoice </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/ot/home/')}}">Schedule</a>
    <a class="mobile_link" href="{{url('/ot/admission/list/')}}">New Entry</a>
    <a class="mobile_link" href="{{url('/ot/invoice/')}}">Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')











                <!--Showing schedules-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Admitted Patient List:</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="25%" class="frame_header_item">P-ID</th>
                        <th width="30%" class="frame_header_item">Patient Name</th>
                        <th width="30%" class="frame_header_item">Consultant</th>
                        <th width="10%" class="frame_header_item">Select</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($admission as $list)

                    <tr class="frame_rows">

                        <form action="{{url('/ot/select/entry')}}" class="content_container patient_info_form" method="post">
                        @csrf

                            <td class="frame_data" data-label="S/N" width="5%"><?php echo $serial; $serial++; ?></td>

                            <td class="frame_data" data-label="P-ID" width="25%">{{$list->P_ID}}</td>
                            <td class="frame_data" data-label="Patient Name" width="30%">{{$list->Patient_Name}}</td>
                            <td class="frame_data" data-label="Consultant" width="30%">{{$list->Consultant}}</td>

                            <td class="frame_action" data-label="Edit" width="10%">
                                <input type="hidden" name="a_id" value="{{$list->A_ID}}">
                                <input type="hidden" name="p_id" value="{{$list->P_ID}}">
                                <input type="hidden" name="d_id" value="{{$list->D_ID}}">
                                <input type="hidden" name="p_name" value="{{$list->Patient_Name}}">
                                <button type="submit" class="btn_less" required>
                                    <i class="table_btn fas fa-check-circle"></i>
                                </button>
                            </td>

                        </form>

                    </tr>

                    @endforeach

                </table>




@endsection

<!--------------------content end---------------------->
