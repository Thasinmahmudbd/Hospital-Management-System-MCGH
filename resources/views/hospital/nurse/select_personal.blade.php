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

                            <div class="content_container_bg_less">

                                <p class="section_title">Service Info</p>

                                <div class="info">

                                    <p class="collected_info">Service</p>
                                    <p>:</p>
                                    <p class="collected_info">{{Session::get('Service_Name')}}</p>

                                    <p class="collected_info">Quantity</p>
                                    <p>:</p>
                                    <p class="collected_info">{{Session::get('quantity')}}</p>

                                    <p class="collected_info">Service Charge</p>
                                    <p>:</p>
                                    <p class="collected_info">{{Session::get('Service_Charge')}}</p>

                                </div>

                            </div>

                        </div>

                        <div class="block">

                            <div class="gap"></div>

                            <table class="frame_table">

                                <!--enter others-->
                                <form action="{{url('/nurse/personal/selected')}}" class="content_container patient_info_form" method="post">
                                @csrf

                                @if(Session::get('DMO')=='yes')

                                <tr class="frame_rows">

                                    <th width="20%" class="frame_header_item">Doctor</th>
                                    <td class="frame_data" data-label="Personal">
                                        <select name="dmo" id="dmo" class="input_less" required>
                                            @foreach($info as $list)
                                            <option value="{{$list->D_ID}}">{{$list->Dr_Name}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>

                                @endif

                                @if(Session::get('Nurse')=='yes')

                                <tr class="frame_rows">

                                    <th width="20%" class="frame_header_item">Nurse</th>    
                                    <td class="frame_data" data-label="Personal">
                                        <select name="nurse" id="nurse" class="input_less" required>
                                            @foreach($info2 as $list)
                                            <option value="{{$list->N_ID}}">{{$list->N_Name}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>

                                @endif

                                @if(Session::get('Assistant')=='yes')

                                <tr class="frame_rows">

                                    <th width="20%" class="frame_header_item">Assistant</th>    
                                    <td class="frame_data" data-label="Personal">
                                        <input type="text" class="input_less"  name="assistant_name" placeholder="Enter Name">
                                    </td>

                                </tr>

                                @endif

                                <tr class="frame_rows">

                                    <td class="frame_action table_item_dark_green" data-label="Action" colspan="2">
                                        <input type="submit" class="table_item_dark_green btn"  value="Done" name="next">
                                    </td>

                                </tr>

                                </form>

                            </table>

                        </div>

                    </div>










@endsection

<!--------------------content end---------------------->
