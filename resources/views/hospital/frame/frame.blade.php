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
	<script src="{{ asset('UI_assets/Javascript/fontawesome.min.js') }}"></script>
    
    <!--<script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
    </script>-->


<!-----------------------charts---------------------->

    @section('charts')
    @show

<!--------------------charts end---------------------->


    <title>@yield('page_title')</title>



</head>


<body onload="calcDisc()">

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
                    @endif
                
                    <br>(
                    
                    @if(Session::get('REC_SESSION_ID'))
                        {{ Session::get('REC_SESSION_ID') }}
                    @elseif(Session::get('DOC_SESSION_ID'))
                        {{ Session::get('DOC_SESSION_ID') }}
                    @elseif(Session::get('ACC_SESSION_ID'))
                        {{ Session::get('ACC_SESSION_ID') }}
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

<!-----------------------content---------------------->


            @section('content')
            @show

<!--------------------content end---------------------->

            </div>

        </div>

    </div>


</body>
</html>