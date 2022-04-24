@extends('hospital/frame/frame')

@section('page_title','MCGH Portal')

@section('page_type','Dashboard')








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


                <!--Session message-->

                @if(session('msg')=='Profile updated successfully.')

                    <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div> 

                @endif


                <div class="dashboard_grid">
                
                    <div class="content_container_thin disBlock">

                        <div class="content_container_bg_less_thin text_center"><b>Employees</b></div>

                        <div class="purple_line"></div>
                        <div class="gap"></div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Doctors: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Accountants: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Nurses: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">OT Operators: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                    </div>

                    <div class="content_container_thin disBlock">

                        <div class="content_container_bg_less_thin text_center"><b>Wards</b></div>

                        <div class="purple_line"></div>
                        <div class="gap"></div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Male Ward: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Female Ward: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Child Ward: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Maternity Ward: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                    </div>

                    <div class="content_container_thin disBlock">

                        <div class="content_container_bg_less_thin text_center"><b>Cabins</b></div>

                        <div class="purple_line"></div>
                        <div class="gap"></div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Normal: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">AC: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                        <div class="dashboard_panels">
                            <p class="content_container_white_thin text_left">Double AC: </p>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-eye log_out_btn text_center"></i></div>
                            <div type="submit" class="content_container_bg_less_thin btn form_btn"><i class="fas fa-plus log_out_btn text_center"></i></div>
                        </div>

                    </div>

                </div>



                <div class="purple_line"></div>
                <div class="gap"></div>



                <div class="content_container_bg_less_thin disBlock">
                    <b>Registered Patient Count</b>
                    <p>Outdoor patients  :------ </p>
                    <p>Admitted patients :----- </p>
                </div>










@endsection

<!--------------------content end---------------------->
