<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!--icons | font awesome-->
    <script src="https://kit.fontawesome.com/aafecdc4bf.js" crossorigin="anonymous"></script>
    
    <!--font | nunito-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet"> 

    <!--global design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Global/global_design.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Global/form_design.css') }}">

    <!--basic design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Basic/reception_design.css') }}">

    <!--frame design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/frame_design.css') }}">

    <!--responsive design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Responsive/reception_res.css') }}">
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Responsive/frame_res.css') }}">

    <!--javascript-->
    <script src="{{ asset('UI_assets/Javascript/dropdown_menu.js') }}"></script>


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
                <p class="user_name_id">Mr.A ({{ Session::get('REC_SESSION_ID') }})</p>

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
                    <i class="menu_btn fas fa-bars"></i>
                </a>
                <p class="page_type">@yield('page_type')</p>
                <a href="{{url('/logout')}}">
                    <i class="log_out_btn fas fa-power-off"></i>
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


    <!--removable link-->
    <p class="removable_link_text">This links are temporary, used to travel through the site: 
        <a href="index.html" class="removable_link">Log in</a>,
        <a href="receptionist_doctor_selection.html" class="removable_link">Select Doctor</a>.
    </p>
    <!--removable link end-->


</body>
</html>