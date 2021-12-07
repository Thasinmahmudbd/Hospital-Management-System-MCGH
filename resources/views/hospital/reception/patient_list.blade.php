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
    <a href="{{url('/reception/patient_list/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Patients List </span>
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
    <a class="mobile_link" href="{{url('/reception/patient_list/')}}">Patients List</a>
    <a class="mobile_link" href="{{url('/reception/invoice_list/appointment/')}}">Generate Invoice</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="14%" class="frame_header_item">P-ID</th>
                        <th width="17%" class="frame_header_item">Patient Name</th>
                        <th width="14%" class="frame_header_item">Cell</th>
                        <th width="17%" class="frame_header_item">Doctor</th>
                        <th width="8%" class="frame_header_item">Fee</th>
                        <th width="5%" class="frame_header_item">Disc</th>
                        <th width="8%" class="frame_header_item">Total</th>
                        <th width="7%" class="frame_header_item">Status</th>
                        <th width="5%" class="frame_header_item">Action</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($result as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="P-ID">{{$list->P_ID}}</td>
                        <td class="frame_data" data-label="Patient Name">{{$list->Patient_Name}}</td>
                        <td class="frame_data" data-label="Cell">{{$list->Cell_Number}}</td>
                        <td class="frame_data" data-label="Doctor">{{$list->Dr_Name}}</td>
                        <td class="frame_data" data-label="Fee">{{$list->Basic_Fee}}</td>
                        <td class="frame_data" data-label="Disc">{{$list->Discount}}</td>
                        <td class="frame_data" data-label="Total">{{$list->Final_Fee}}</td>
                        <td class="frame_data" data-label="Status">{{$list->Payment_Status}}</td>

                        @if($list->Payment_Status == 'Unpaid')

                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>

                        @else

                        <td class="frame_action" data-label="Action">
                            <a href=""  class="disable">
                                <i class="table_basic_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>

                        @endif

                    </tr>

                    @endforeach

                </table>

@endsection

<!--------------------content end---------------------->