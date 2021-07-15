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
    <link rel="stylesheet" href="Design/Global/global_design.css">
    <link rel="stylesheet" href="Design/Global/form_design.css">

    <!--basic design-->
    <link rel="stylesheet" href="Design/Basic/reception_design.css">

    <!--frame design-->
    <link rel="stylesheet" href="Design/frame_design.css">

    <!--responsive design-->
    <link rel="stylesheet" href="Design/Responsive/reception_res.css">
    <link rel="stylesheet" href="Design/Responsive/frame_res.css">

    <!--javascript-->
    <script src="Javascript/dropdown_menu.js"></script>


    <title>MCGH Portal</title>



</head>


<body>

    <!--frame-->
    <div class="frame">

        <!--frame left side-->
        <div class="left_side">

            <div class="left_side_top">

                <p class="title">MCGH Portal</p>
                <div class="line"></div>
                <p class="user_name_id">Mr.A (RM001)</p>

            </div>
            
            <ul class="list">

<!-----------------------link---------------------->

                <li class="list_item">
                    <a href="receptionist_appoint_time.html" class="link">
                        <i class="link_icons fas fa-clock"></i>
                        <span class="link_name"> Reselect Time </span>
                    </a>
                </li>

                <li class="list_item">
                    <a href="#" class="link">
                        <i class="link_icons far fa-window-close"></i>
                        <span class="link_name"> Cancel Appointment </span>
                    </a>
                </li>

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
                <p class="page_type">Reception (Doctor Selection)</p>
                <a href="#">
                    <i class="log_out_btn fas fa-power-off"></i>
                </a>

            </div>

            <!--frame right side mobile menu links-->
            <div id="myLinks" class="mobile_links">
                <a class="mobile_link" href="receptionist_appoint_time.html">Reselect Time</a>
                <a class="mobile_link" href="#">Cancel Appointment</a>
            </div>

            <!--frame right side middle-->
            <div class="right_side_middle">

<!-----------------------content---------------------->

                <div class="patient_and_doctor_info_one_is_to_one">

                    <div class="content_container">

                        <p class="section_title">Patient Info</p>

                        <div class="info">

                            <p class="collected_info">Patient's Name</p>
                            <p>:</p>
                            <p class="collected_info">Mr.B</p>

                            <p class="collected_info">Patient's Gender</p>
                            <p>:</p>
                            <p class="collected_info">Male</p>

                            <p class="collected_info">Cell Number</p>
                            <p>:</p>
                            <p class="collected_info">0191536248</p>

                            <p class="collected_info">Patient ID</p>
                            <p>:</p>
                            <p class="collected_info">M2962021001</p>

                        </div>

                    </div>

                    <div class="content_container">

                        <p class="section_title">Doctor Chosen</p>

                        <div class="info">

                            <p class="collected_info">Doctor's Name</p>
                            <p>:</p>
                            <p class="collected_info">Mr.C</p>

                            <p class="collected_info">Fee</p>
                            <p>:</p>
                            <p class="collected_info">1000 TK</p>

                            <p class="collected_info">Time</p>
                            <p>:</p>
                            <p class="collected_info">8:15 - 8:30</p>

                            <form action="" class="doctor_form">

                                <div class="doctor_form_element">
                                    <p class="collected_info">Date</p>
                                    <input type="date" class="input collected_info" name="appoint_date" required>
                                </div>
                                
                                <!--<div class="doctor_form_element">
                                    <p class="collected_info">Fee</p>
                                    <input type="tel" class="input collected_info" name="fee" required>
                                    <p class="collected_info">TK</p>
                                </div>-->

                                <div class="doctor_form_element">
                                    <p class="collected_info">Discount</p>
                                    <input type="tel" class="input collected_info" name="discount" required>
                                    <p class="collected_info">%</p>
                                </div>

                                <div class="doctor_form_element">
                                    <span class="collected_info"></span>
                                    <input type="submit" class="btn form_btn" name="enroll" value="Submit">
                                </div>

                            </form>


                        </div>

                    </div>

                </div>



<!--------------------content end---------------------->

            </div>

        </div>

    </div>

    <!--removable link-->
    <p class="removable_link_text">This links are temporary, used to travel through the site: 
        <a href="index.html" class="removable_link">Log in</a>,
        <a href="receptionist_home.html" class="removable_link">Patient Info</a>,
        <a href="receptionist_list.html" class="removable_link">Patient List</a>.
    </p>
    <!--removable link end-->

</body>
</html>