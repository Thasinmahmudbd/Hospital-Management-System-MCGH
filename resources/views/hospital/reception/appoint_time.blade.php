@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Reception (Appoint Time)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="receptionist_doctor_selection.html" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> Reselect Doctor </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="receptionist_doctor_selection.html">Reselect Doctor</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="12.5%" class="frame_header_item">Time</th>
                        <th width="12.5%" class="frame_header_item">Sat</th>
                        <th width="12.5%" class="frame_header_item">Sun</th>
                        <th width="12.5%" class="frame_header_item">Mon</th>
                        <th width="12.5%" class="frame_header_item">Tue</th>
                        <th width="12.5%" class="frame_header_item">Wed</th>
                        <th width="12.5%" class="frame_header_item">Thu</th>
                        <th width="12.5%" class="frame_header_item">Fri</th>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">8:00 - 8:15</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="">
                                <p class="table_basic_btn table_item_green">A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <p class="table_basic_btn table_item_green">A</p>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn table_item_yellow">R</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Fri">
                            <p class="table_basic_btn table_item_green">A</p>
                        </td>
                    </tr>

                </table>

@endsection

<!--------------------content end---------------------->

