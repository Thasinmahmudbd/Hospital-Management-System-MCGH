@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Nurse (Others)')






<!-----------------------link---------------------->

@section('links')

<li class="list_item">
    <a href="{{url('/nurse/home/')}}" class="link">
        <i class=" link_icons fas fa-th-list"></i>
        <span class="link_name"> Patient List </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/nurse/home/')}}">Patient List</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')







                    <div class="patient_form_element_one_is_to_one">

                        <div class="block">

                            <div class="content_container_bg_less">

                                <p class="section_title">Patient Info</p>

                                <div class="info">

                                    <p class="collected_info">Patients's Name</p>
                                    <p>:</p>
                                    <p class="collected_info">{{Session::get('patient_name')}}</p>

                                </div>

                            </div>

                            <div class="content_container_bg_less">

                                <p class="section_title">Bed Info</p>

                                <div class="info">

                                    <p class="collected_info">Bed No</p>
                                    <p>:</p>
                                    <p class="collected_info">{{Session::get('bed_no')}}</p>

                                    <p class="collected_info">Floor No</p>
                                    <p>:</p>
                                    <p class="collected_info">{{Session::get('floor_no')}}</p>

                                </div>

                            </div>

                        </div>

                        <div class="block">

                            <div class="gap"></div>

                            <table class="frame_table">

                                <tr class="frame_header">
                                    <th width="70%" class="frame_header_item">Service</th>
                                    <th width="20%" class="frame_header_item">Quantity</th>
                                    <th width="10%" class="frame_header_item">Action</th>
                                </tr>

                                <tr class="frame_rows">

                                    <!--enter others-->
                                    <form action="{{url('/nurse/other/input')}}" class="content_container patient_info_form" method="post">
                                    @csrf

                                    <td class="frame_data" data-label="Service">
                                        <select name="service" id="service" class="input_less" required>
                                            @foreach($info as $list)
                                            <option value="{{$list->AI_ID}}">{{$list->Other_Name}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="frame_data" data-label="Quantity">
                                        <input type="text" class="input"  name="quantity" required>
                                    </td>

                                    <td class="frame_action table_item_dark_green" data-label="Action No">
                                        <input type="submit" class="table_item_dark_green btn cover"  value="Next" name="next">
                                    </td>

                                    </form>

                                </tr>

                            </table>

                        </div>

                    </div>

                    <div class="purple_line"></div>
                    <div class="gap"></div>

                    <div class="content_container_bg_less_thin">

                        <span></span>
                            
                        <p><b>Patient Chart</b></p>

                        <span></span>

                    </div>

                    <table class="frame_table">

                        <tr class="frame_header">
                            <th width="5%" class="frame_header_item">S/N</th>
                            <th width="20%" class="frame_header_item">Invigilator</th>
                            <th width="20%" class="frame_header_item">Nurse</th>
                            <th width="20%" class="frame_header_item">Assistant</th>
                            <th width="15%" class="frame_header_item">Services</th>
                            <th width="5%" class="frame_header_item">Quantity</th>
                            <th width="15%" class="frame_header_item">Timestamp</th>
                        </tr>

                        <?php $serial = 1; ?>
                        @foreach($chart as $list)

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                            <td class="frame_data" data-label="Invigilator">{{$list->D_ID}}</td>
                            <td class="frame_data" data-label="Nurse">{{$list->Duty_N_ID}}</td>
                            <td class="frame_data" data-label="Assistant">{{$list->Assistant_Name}}</td>
                            <td class="frame_data" data-label="Services">{{$list->Others}}</td>
                            <td class="frame_data" data-label="Quantity">{{$list->Others_Use_Count}}</td>
                            <td class="frame_data" data-label="Timestamp">{{$list->Timestamp}}</td>
                        </tr>

                        @endforeach

                    </table>








@endsection

<!--------------------content end---------------------->
