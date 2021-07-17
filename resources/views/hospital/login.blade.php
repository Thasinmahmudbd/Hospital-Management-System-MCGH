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


    <title>MCGH Portal</title>



</head>


<body>

    <h1 class="text">Moynamoti Cantonment General Hospital, Web Portal.</h1>

    <div class="landing_page_container">

        <!--art-->
        <div class="landing_page_art">

            <img src="{{url('UI_assets/Media/Images/Template_Images/hospital/HOSPITAL.png')}}" alt="" width="100%">

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


    <!--removable link-->
    <p class="removable_link_text">This links are temporary, used to travel through the site: 
        <a href="receptionist_home.html" class="removable_link">Reception</a>, 
        <a href="Doctor_activity_log.html" class="removable_link">Doctors</a>, 
        <a href="Accounts_doctor_log.html" class="removable_link">Accounts</a>.
    </p>
    <!--removable link end-->

</body>
</html>