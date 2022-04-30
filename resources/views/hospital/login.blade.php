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
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Basic/index_design.css') }}">

    <!--responsive design-->
    <link rel="stylesheet" href="{{ asset('UI_assets/Design/Responsive/index_res.css') }}">

    <!--javascript-->
    <script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
    </script>


    <title>MCGH Portal</title>



</head>


<body class="login_slider">

    <span class="fader"></span>

    <h1 class="text">Mainamati Cantonment General Hospital, Web Portal.</h1>

    <div class="landing_page_container">

        <!--art-->
        <div class="landing_page_art">

            <img class="clip_art" src="{{url('UI_assets/Media/Images/Template_Images/hospital/HOSPITAL.png')}}" alt="" width="100%">

            <div class="text_box_container">

                <h1 class="text_box_header">Login requirements</h1>

                <p class="text_box">To login insert your <b>Unique ID</b> & <b>Password</b>. If you don't have one contact with an admin to get registered in the system.</p>

                <br>

                <h2 class="text_box_header2">Common questions</h2>

                <p class="text_box"><b class="Q">Q</b> I am a registered user, so why does it say <b class="alert">Account Deactivated</b> when I try to log in?</p>

                <p class="text_box"><b class="A">A</b> It seems you are blocked from using the system. Contact the admin to get a better understanding of the situation.</p>

                <p class="text_box"><b class="Q">Q</b> Should I share my password with another employee?</p>

                <p class="text_box"><b class="A">A</b> Sharing your login information is highly risky & will cause you trouble in the future.</p>

                <br>

                <h2 class="text_box_header2">Disadvantages of sharing passwords</h2>

                <ul>
                    <li class="text_list">Password repetition is the use of the same password for separate accounts.</li>
                    <li class="text_list">Sharing a repeated password increases your danger of becoming a victim of identity theft.</li>
                </ul>

            </div>

        </div>

        <!--log in form-->

            <div class="login_form">

                <form action="{{url('/admin/login_users')}}" method="post">
                @csrf

                    <div class="form_element">

                        <label for="used_id" class="label">User ID</label>
                        <input type="text" class="input" name="user_id" required>

                    </div>

                    <div class="form_element">

                        <label for="password" class="label">Password</label>
                        <input type="password" class="input"  name="password" required>

                    </div>

                    <div class="form_element">

                        <input type="submit" class="btn login_btn_round form_btn"  value="Log in" name="login">

                    </div>

                </form>

                @if(session('msg'))

                    <span class="warning_msg">{{session('msg')}}</span>

                @endif

            </div>

    </div>


    <footer class="footer">&copy; 2021 MCGH.portal.com</footer>


    

</body>
</html>