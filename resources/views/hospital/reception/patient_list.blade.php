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
                    <a href="receptionist_home.html" class="link">
                        <i class="link_icons fas fa-window-maximize"></i>
                        <span class="link_name"> Patient Entry </span>
                    </a>
                </li>

                <li class="list_item">
                    <a href="receptionist_list.html" class="link">
                        <i class=" link_icons fas fa-th-list"></i>
                        <span class="link_name"> Patients List </span>
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
                <p class="page_type">Reception (Patients List)</p>
                <a href="#">
                    <i class="log_out_btn fas fa-power-off"></i>
                </a>

            </div>

            <!--frame right side mobile menu links-->
            <div id="myLinks" class="mobile_links">
                <a class="mobile_link" href="receptionist_home.html">Patient Entry</a>
                <a class="mobile_link" href="#">Patients List</a>
            </div>

            <!--frame right side middle-->
            <div class="right_side_middle">

<!-----------------------content---------------------->

                <table class="frame_table">
                    
                    <tr class="frame_header">
                        <th width="14%" class="frame_header_item">P-ID</th>
                        <th width="17%" class="frame_header_item">Patient Name</th>
                        <th width="14%" class="frame_header_item">Cell</th>
                        <th width="17%" class="frame_header_item">Doctor</th>
                        <th width="10%" class="frame_header_item">Fee</th>
                        <th width="5%" class="frame_header_item">Disc</th>
                        <th width="10%" class="frame_header_item">Total</th>
                        <th width="8%" class="frame_header_item">Status</th>
                        <th width="5%" class="frame_header_item">Action</th>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
                            </a>
                        </td>
                    </tr>

                    <tr class="frame_rows">
                        <td class="frame_data" data-label="P-ID">M2962021001</td>
                        <td class="frame_data" data-label="Patient Name">Mr.B</td>
                        <td class="frame_data" data-label="Cell">01985423614</td>
                        <td class="frame_data" data-label="Doctor">Mrs.Z</td>
                        <td class="frame_data" data-label="Fee">800</td>
                        <td class="frame_data" data-label="Disc">5</td>
                        <td class="frame_data" data-label="Total">760</td>
                        <td class="frame_data" data-label="Status">Unpaid</td>
                        <td class="frame_action" data-label="Action">
                            <a href="">
                                <i class="table_btn far fa-money-bill-alt"></i>
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
        <a href="index.html" class="removable_link">Log in</a>.
    </p>
    <!--removable link end-->

</body>
</html>