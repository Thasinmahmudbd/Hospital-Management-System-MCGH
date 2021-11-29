@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Test Selection (Dental)')






<!-----------------------link---------------------->

@section('links')

<li class="link_item">
    <a href="{{url('/reception/cancel_test/dental/')}}" class="link">
        <i class="link_icons fas fa-window-maximize"></i>
        <span class="link_name"> Cancel Test </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/reception/cancel_test/dental/')}}">Cancel Test</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')

                <div class="patient_and_doctor_info_one_is_to_three">

                    <!--Links to navigate invoice pages-->

                    <span></span>

                    <!--Search bar to search patients-->

                    <form action="{{url('/reception/find_test/dental/by_search/')}}" method="post" class="content_container_white_super_thin center_self">
                    @csrf

                        <div class="patient_form_element_three_is_to_one">

                            <input type="text" class="input" name="old_patient_search_info" placeholder="Enter Test Name" required>

                            <div class="patient_and_doctor_info_one_is_to_one">

                                <button type="submit" class="btn form_btn" name="search_old_patient">Search</button>

                                <a class="btn form_btn text_center" href="{{url('/reception/cancel_test/dental/')}}">Next</a>

                            </div>

                        </div>

                    </form>

                </div>







            <!--Session message-->

            @if(session('msg')=='Patient registered, choose tests to proceed.')

            <div class="content_container text_center success_msg">{{session('msg')}}</div> 

            @endif










            @if(Session::get('dental_test_search')=='1')

                <div class="purple_line"></div>
                <div class="gap"></div>

                <!--Showing search results of dental tests-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Search Result</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="50%" class="frame_header_item">Test Name</th>
                        <th width="20%" class="frame_header_item">Rate</th>
                        <th width="20%" class="frame_header_item">Fee</th>
                        <th width="5%" class="frame_header_item">Action</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($info as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="Test Name">{{$list->Test_Name}}</td>
                        <td class="frame_data" data-label="Rate">{{$list->Rate}}</td>

                        <form action="{{url('/reception/select/test/dental/')}}" method="post" class="content_container_white_super_thin center_self">
                        @csrf

                        @if(Session::get('dtl_state')==0)

                            <td class="frame_data" data-label="Fee">
                                <input class="input" type="text" name="test_fee">
                                <input type="hidden" value="{{$list->AI_ID}}" name="test_id">
                                <input type="hidden" value="{{Session::get('dental_test_no')}}" name="test_no">
                            </td>

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn_less">
                                    <i class="fas fa-check-circle table_btn"></i>
                                </button>
                            </td>

                        @else

                            @foreach($logs as $test)

                            @if($test->Dental_Info_AI_ID != $list->AI_ID)

                            <td class="frame_data" data-label="Fee">
                                <input class="input" type="text" name="test_fee">
                                <input type="hidden" value="{{$list->AI_ID}}" name="test_id">
                                <input type="hidden" value="{{Session::get('dental_test_no')}}" name="test_no">
                            </td>

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn_less">
                                    <i class="fas fa-check-circle table_btn"></i>
                                </button>
                            </td>

                            @else

                            <td class="frame_data" data-label="Fee">{{$test->Fee}}</td>

                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/reception/unselect/test/dental/'.$test->AI_ID)}}">
                                    <i class="table_btn_red fas fa-times-circle"></i>
                                </a>
                            </td>

                            @endif

                            @endforeach

                        @endif

                        </form>

                    </tr>

                    @endforeach

                </table>



                <div class="gap"></div>





            @elseif(Session::get('dental_test_search')=='0')

                <div class="purple_line"></div>
                <div class="gap"></div>

                <!--Showing search results of dental tests when no result-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Search Result</b></p>

                    <span></span>

                </div>

                <div class="warning_msg content_container_bg_less_thin">

                    <p class="text_center">No one here.</p>

                </div>





            @elseif(Session::get('dental_test_search')=='3')


                <div class="purple_line"></div>
                <div class="gap"></div>

                <!--Showing all of dental tests-->

                <div class="content_container_bg_less_thin">

                    <span></span>
                        
                    <p><b>Dental Tests</b></p>

                    <span></span>

                </div>

                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="50%" class="frame_header_item">Test Name</th>
                        <th width="20%" class="frame_header_item">Rate</th>
                        <th width="20%" class="frame_header_item">Fee</th>
                        <th width="5%" class="frame_header_item">Action</th>
                    </tr>

                    <?php $serial = 1; ?>
                    @foreach($info as $list)

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                        <td class="frame_data" data-label="Test Name">{{$list->Test_Name}}</td>
                        <td class="frame_data" data-label="Rate">{{$list->Rate}}</td>

                        <form action="{{url('/reception/select/test/dental/')}}" method="post" class="content_container_white_super_thin center_self">
                        @csrf

                        @if(Session::get('dtl_state')==0)

                            <td class="frame_data" data-label="Fee">
                                <input class="input" type="text" name="test_fee">
                                <input type="hidden" value="{{$list->AI_ID}}" name="test_id">
                                <input type="hidden" value="{{Session::get('dental_test_no')}}" name="test_no">
                            </td>

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn_less">
                                    <i class="fas fa-check-circle table_btn"></i>
                                </button>
                            </td>

                        @else

                            @foreach($logs as $test)

                            @if($test->Dental_Info_AI_ID != $list->AI_ID)

                            <td class="frame_data" data-label="Fee">
                                <input class="input" type="text" name="test_fee">
                                <input type="hidden" value="{{$list->AI_ID}}" name="test_id">
                                <input type="hidden" value="{{Session::get('dental_test_no')}}" name="test_no">
                            </td>

                            <td class="frame_action" data-label="Action">
                                <button type="submit" class="btn_less">
                                    <i class="fas fa-check-circle table_btn"></i>
                                </button>
                            </td>

                            @else

                            <td class="frame_data" data-label="Fee">{{$test->Fee}}</td>

                            <td class="frame_action" data-label="Action">
                                <a href="{{url('/reception/unselect/test/dental/'.$test->AI_ID)}}">
                                    <i class="table_btn_red fas fa-times-circle"></i>
                                </a>
                            </td>

                            @endif

                            @endforeach

                        @endif

                        </form>

                    </tr>

                    @endforeach

                </table>

            @endif

@endsection

<!--------------------content end---------------------->