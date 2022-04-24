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
    <a href="{{url('/accounts/home/')}}" class="link">
        <i class="link_icons fas fa-user-md"></i>
        <span class="link_name"> Dashboard </span>
    </a>
</li>

@endsection

<!--------------------link end---------------------->






<!-----------------------mobile link---------------------->

@section('mobile_links')

<div id="myLinks" class="mobile_links">
    <a class="mobile_link" href="{{url('/accounts/home/')}}">Dashboard</a>
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

                <div>










@endsection

<!--------------------content end---------------------->
