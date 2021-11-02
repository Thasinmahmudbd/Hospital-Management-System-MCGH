@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','OT (Role Selection)')






<!-----------------------link---------------------->

@section('links')

<li class="list_item">
    <a href="{{url('/ot/new/entry/all/data')}}" class="link">
        <i class="link_icons fas fa-th-list"></i>
        <span class="link_name"> Go To List </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/reception/doctor_selection')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Surgeon </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/show/anesthesiologist/list')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Anesthesiologist </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/show/nurse/list')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Nurse </span>
    </a>
</li>

<li class="list_item">
    <a href="{{url('/ot/assistant/data/collection')}}" class="link">
        <i class="link_icons fas fa-user-plus"></i>
        <span class="link_name"> Pick Assistant </span>
    </a>
</li>

<li class="link_item">
    <a href="{{url('/ot/new/entry/cancel')}}" class="link">
        <i class="link_icons far fa-window-close"></i>
        <span class="link_name"> Cancel Entry </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/ot/new/entry/all/data')}}">Go To List</a>
    <a class="mobile_link" href="{{url('/reception/doctor_selection')}}">Pick Surgeon</a>
    <a class="mobile_link" href="{{url('/ot/show/anesthesiologist/list')}}">Pick Anesthesiologist</a>
    <a class="mobile_link" href="{{url('/ot/show/nurse/list')}}">Pick Nurse</a>
    <a class="mobile_link" href="{{url('/ot/assistant/data/collection')}}">Pick Assistant</a>
    <a class="mobile_link" href="{{url('/ot/new/entry/cancel')}}">Cancel Entry</a>
</div>

@endsection

<!--------------------mobile link end---------------------->







<!-----------------------content---------------------->

@section('content')




                <!--Anesthesiologists info-->

                    <div class="content_container_bg_less_thin">

                        <span></span>
                            
                        @if(Session::get('list_data')=='anesthesiologist')
                        <p><b>Anesthesiologists:</b></p>
                        @elseif(Session::get('list_data')=='nurse')
                        <p><b>Nurses:</b></p>
                        @endif

                        <span></span>

                    </div>




                <table class="frame_table">

                    <tr class="frame_header">
                        <th width="5%" class="frame_header_item">S/N</th>
                        <th width="87%" class="frame_header_item">Name</th>
                        <th width="8%" class="frame_header_item">Remove</th>
                    </tr>

                    @if(Session::get('list_data')=='anesthesiologist')

                        <?php $serial = 1; ?>
                        @foreach($data as $list)

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                            <td class="frame_data" data-label="Name">{{$list->Dr_Name}}</td>

                            <td class="frame_action" data-label="Action">
                                <a target="blank" href="{{url('/ot/select/anesthesiologist/'.$list->D_ID)}}">
                                <i class="table_btn fas fa-check-circle"></i>
                                </a>
                            </td>

                        </tr>

                        @endforeach

                    @elseif(Session::get('list_data')=='nurse')

                        <?php $serial = 1; ?>
                        @foreach($data as $list)

                        <tr class="frame_rows">
                            <td class="frame_data" data-label="S/N"><?php echo $serial; $serial++; ?></td>
                            <td class="frame_data" data-label="Name">{{$list->N_Name}}</td>

                            <td class="frame_action" data-label="Action">
                                <a target="blank" href="{{url('/ot/select/nurse/'.$list->N_ID)}}">
                                <i class="table_btn fas fa-check-circle"></i>
                                </a>
                            </td>

                        </tr>

                        @endforeach

                    @endif

                </table>
                <div class="gap"></div>



@endsection

<!--------------------content end---------------------->
