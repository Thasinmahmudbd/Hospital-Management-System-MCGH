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

                <li class="link_item">
                    <a href="receptionist_doctor_selection.html" class="link">
                        <i class="link_icons fas fa-user-md"></i>
                        <span class="link_name"> Reselect Doctor </span>
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
                <p class="page_type">Reception (Appoint Time)</p>
                <a href="#">
                    <i class="log_out_btn fas fa-power-off"></i>
                </a>

            </div>

            <!--frame right side mobile menu links-->
            <div id="myLinks" class="mobile_links">
                <a class="mobile_link" href="receptionist_doctor_selection.html">Reselect Doctor</a>
            </div>

            <!--frame right side middle-->
            <div class="right_side_middle">

<!-----------------------content---------------------->

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="12.5%" class="frame_header_item">Time</th>
                        <th width="12.5%" class="frame_header_item">Sat</th>
                        <th width="12.5%" class="frame_header_item">Sun</th>
                        <th width="12.5%" class="frame_header_item">Mon</th>
                        <th width="12.5%" class="frame_header_item">Tue</th>
                        <th width="12.5%" class="frame_header_item">Wed</th>
                        <th width="12.5%" class="frame_header_item">Thu</th>
                        <th width="12.5%" class="frame_header_item">Fri</th>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">8:00 - 8:15</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="">
                                <p class="table_basic_btn table_item_green">A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <p class="table_basic_btn table_item_green">A</p>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn table_item_yellow">R</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Fri">
                            <p class="table_basic_btn table_item_green">A</p>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">8:15 - 8:30</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">8:30 - 8:45</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">8:45 - 9:00</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">9:00 - 9:15</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">9:15 - 9:30</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">9:30 - 9:45</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">9:45 - 10:00</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">10:00 - 10:15</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">10:15 - 10:30</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">10:30 - 10:45</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">10:45 - 11:00</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">11:00 - 11:15</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="Time">11:15 - 11:30</td>
                        <td class="frame_data" data-label="Sat">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Sun">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Mon">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Tue">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Wed">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_data" data-label="Thu">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                        <td class="frame_action" data-label="Fri">
                            <a href="" class="disable">
                                <p class="table_basic_btn">N/A</p>
                            </a>
                        </td>
                    </tr>

                </table>

<!--------------------content end---------------------->

            </div>

        </div>

    </div>

    <!--removable link-->
    <p class="removable_link_text">This links are temporary, used to travel through the site: 
        <a href="index.html" class="removable_link">Log in</a>,
        <a href="receptionist_final.html" class="removable_link">Final</a>.
    </p>
    <!--removable link end-->

</body>
</html>