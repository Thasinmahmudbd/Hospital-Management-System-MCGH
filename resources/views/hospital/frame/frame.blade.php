<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!--icons | font awesome-->
	<link rel="stylesheet" href="{{ asset('UI_assets/Design/Basic/fontawesome.min.css') }}"/>
    
    <!--font | nunito-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet"> 

    <!--global design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Global/global_design.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Global/form_design.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Global/graph_design.css') }}">

    <!--basic design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Basic/reception_design.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Basic/doctor_design.css') }}">

    <!--frame design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/frame_design.css') }}">

    <!--responsive design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Responsive/reception_res.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Responsive/doctor_res.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Responsive/frame_res.css') }}">

    <!--javascript-->
    <script src="{{ asset('UI_assets/Javascript/dropdown_menu.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/imageViewer.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/triggerClick.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/calc.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/autoFill.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/swapFields.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/sideBar.js') }}"></script>
    <script src="{{ asset('UI_assets/Javascript/toggles.js') }}"></script>
	<script src="{{ asset('UI_assets/Javascript/fontawesome.min.js') }}"></script>
    
    <script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };

        window.onload=function(){
            calcDisc();
            calcAdmissionFee();
            calcAppointmentFee();
        }
    </script>


<!-----------------------charts---------------------->

    @section('charts')
    @show

<!--------------------charts end---------------------->


    <title>@yield('page_title')</title>



</head>


<body>

    <!--frame-->
    <div class="frame">

        <!--frame left side-->
        <div class="left_side">

            <div class="left_side_top">

                <p class="title">MCGH Portal</p>
                <div class="line"></div>
                <p class="user_name_id">
                    
                    @if(Session::get('REC_SESSION_ID'))
                        {{ Session::get('R_NAME') }}
                    @elseif(Session::get('DOC_SESSION_ID'))
                        {{ Session::get('DOCTORS_NAME') }}
                    @elseif(Session::get('ACC_SESSION_ID'))
                        {{ Session::get('ACC_NAME') }}
                    @elseif(Session::get('OTO_SESSION_ID'))
                        {{ Session::get('OTO_NAME') }}
                    @elseif(Session::get('NRS_SESSION_ID'))
                        {{ Session::get('N_NAME') }}
                    @elseif(Session::get('ADMIN_SESSION_ID'))
                        {{ Session::get('ADMIN_NAME') }}
                    @endif
                
                    <br>(
                    
                    @if(Session::get('REC_SESSION_ID'))
                        {{ Session::get('REC_SESSION_ID') }}
                    @elseif(Session::get('DOC_SESSION_ID'))
                        {{ Session::get('DOC_SESSION_ID') }}
                    @elseif(Session::get('ACC_SESSION_ID'))
                        {{ Session::get('ACC_SESSION_ID') }}
                    @elseif(Session::get('OTO_SESSION_ID'))
                        {{ Session::get('OTO_SESSION_ID') }}
                    @elseif(Session::get('NRS_SESSION_ID'))
                        {{ Session::get('NRS_SESSION_ID') }}
                    @elseif(Session::get('ADMIN_SESSION_ID'))
                        {{ Session::get('ADMIN_SESSION_ID') }}
                    @endif

                    )
                
                </p>

            </div>
            
            <ul class="list">

<!-----------------------link---------------------->

            @section('links')
            @show

<!--------------------link end---------------------->

            </ul>

        </div>

        <!--frame right side-->
        <div class="right_side">

            <!--frame right side top-->
            <div class="right_side_top">

                <a href="javascript:void(0);" onclick="myFunction()">
                    <i class="fas fa-bars menu_btn"></i>
                </a>
                <p class="page_type">@yield('page_type')</p>
                <a href="{{url('/logout')}}">
                    <i class="fas fa-power-off log_out_btn"></i>
                </a>

            </div>

            <!--frame right side mobile menu links-->
            @section('mobile_links')
            @show

            <!--frame right side middle-->
            <div class="right_side_middle">

            <!--Session message-->

            @if(session('msgHook')=='edit')

            <div class="content_container_bg_less_thin text_center alert_msg">{{session('msg')}}</div>

            @elseif(session('msgHook')=='delete')

            <div class="content_container_bg_less_thin text_center warning_msg">{{session('msg')}}</div>

            @elseif(session('msgHook')=='entry')

            <div class="content_container_bg_less_thin text_center success_msg">{{session('msg')}}</div>

            @endif

<!-----------------------content---------------------->


            @section('content')
            @show

<!--------------------content end---------------------->


                <a href="#" class="half_hidden_btn" onclick="closePassChange()" id="closePassChanger"><i class="fas fa-ellipsis-h title_bar_purple"></i></a>

                <a href="#" class="half_hidden_btn" onclick="openPassChange()" id="openPassChanger"><i class="fas fa-ellipsis-h title_bar_purple"></i></a>

                <div class="half_hidden_portion security_background" id="passChanger">  

                    <div class="rounded_photo_width_is_to_rest">

                        <p class="content_container_bg_less collected_info text_center">Password</p>

                        <form class="security content_container_bg_less" action="{{url('/password/change')}}" method="post">
                        @csrf

                            <input type="password" placeholder="Old Password" name="old_pass" class="collected_info input text_center" required>

                            <input type="password" placeholder="New Password" name="new_pass" class="collected_info input text_center" required>

                            <input type="password" placeholder="Confirm Password" name="confirm_pass" class="collected_info input text_center" required>

                            @if(Session::get('REC_SESSION_ID'))
                                <input type="hidden" name="user_id" value="{{Session::get('REC_SESSION_ID')}}">
                            @elseif(Session::get('DOC_SESSION_ID'))
                                <input type="hidden" name="user_id" value="{{Session::get('DOC_SESSION_ID')}}">
                            @elseif(Session::get('ACC_SESSION_ID'))
                                <input type="hidden" name="user_id" value="{{Session::get('ACC_SESSION_ID')}}">
                            @elseif(Session::get('OTO_SESSION_ID'))
                                <input type="hidden" name="user_id" value="{{Session::get('OTO_SESSION_ID')}}">
                            @elseif(Session::get('NRS_SESSION_ID'))
                                <input type="hidden" name="user_id" value="{{Session::get('NRS_SESSION_ID')}}">
                            @elseif(Session::get('ADMIN_SESSION_ID'))
                                <input type="hidden" name="user_id" value="{{Session::get('ADMIN_SESSION_ID')}}">
                            @endif

                            <button type="submit" class="btn_less">
                                <i class="fas fa-fingerprint log_out_btn purple_icon"></i>
                            </button>

                        </form>

                    </div>

                </div>

            </div> 

        </div>

    </div>


</body>
</html>