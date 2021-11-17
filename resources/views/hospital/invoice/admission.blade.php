<!DOCTYPE html>
<html>



<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> invoice</title>
<style>

.invoice{
    height:100%;
    width: 1754px;
    margin-top:0px;
    margin-right: 50px;
    margin-left: 50px;
    font-family:arial,sans-serif,helvetica;
}

.header{
    background-color: #bdbbb7;
    font-size: 20px;
    text-align: center;
    padding: 5px;
}

.main {
    border:px solid black;
    text-align: center;
    margin-top: 0px;
}

.ticket_table{
    width:100%;
    margin-top: 10px;
    text-align: center;
    background-color: #bdbbb7;
    color: BLACK;
    font-weight: bold;
    font-size: 20px;
    padding: 5px;
}

.patient_details {
    border:1px solid black;
    padding:5px;
}

.Address_table {
    border:1px solid black;
    padding:5px;
}

.add_dis_table {
    border:1px solid black;
    padding:5px;
}

.Consultant_table{
    border:1px solid black;
    padding:5px;
}

h3{
    text-align: center;
    font-size: 20px;
}

.relative_emergency{
    border:1px solid black;
    padding:5px;
}

.Diagnosis_table{
    border:1px solid black;
    padding:5px;
}

.footer{
    width:100%;
    margin-top: 10px;
    text-align: center;
    background-color: #bdbbb7;
    color: #000;
    font-weight: bold;
    font-size: 20px;
    padding: 5px;
}

.invisible{
    opacity:0;
}

</style>
</head>







<body class="invoice">





    <table style="width:100%"><!--main table start-->

    <tr><!--main tr start-->


    <!--1st invoice start--> 




    

<!--Header start-->
<td style="width:50%;padding: 20px;">  <br> <!--1st invoice main td start-->
<table class="main" style="width:100%">
        <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব সাধারনের জন্য উন্মুক্ত</div>
            <tr>
                <td style="line-height: 1.5;">
                    <div style="font-size:30px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
                    <div style="font-size:22px;">MAYNAMATI CANTONMENT GENERAL HOSPITAL</div>
                    <div style="font-size:20px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
                    <div style="font-size:15px ;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯, ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭</div>
                </td> 
            </tr>
</table><!--Header end-->





<!--admission ticket start-->


<table class="ticket_table">
        <tr>
            <td>Admission Ticket</td>
        </tr>
</table><!--admission ticket end-->






<!--reg_date table start-->

<table style="width:100%;margin-top: 10px;"> 

        <tr>
            <td style="width:80%">Patient ID: {{Session::get('pId')}}</td>
            <td style="width:20%">Date: {{Session::get('DATE_TODAY')}}</td>
        </tr>

</table><!--reg_date table end-->





<!--patient details start-->




<table  style="width:100%;margin-top: 10px;">


            <tr>
                <td class= "patient_details"style="width:57.5%">Patient's Name: {{Session::get('pName')}}</td>
                <td class= "patient_details"style="width:42.5%">Gender: {{Session::get('pGender')}}</td>  
            </tr>

            <tr>
                <td class= "patient_details">Age: {{Session::get('pAge')}}</td>
                <td class= "patient_details">Bed/cabin no: {{Session::get('bed_no')}}, ({{Session::get('quality')}}-{{Session::get('bed_type')}})</td>
            </tr>

            <tr>
                <td class= "patient_details">Religion: {{Session::get('religion')}}</td>
                <td class= "patient_details">Floor No: {{Session::get('floor_no')}}</td>
            </tr>

</table> <!--patient details end-->






<!--address section start-->


<!--Present Address_table_start-->

<table style="width:100%;margin-top: 20px;">

            <tr>
                <td  rowspan="2"style="width:15%">Present <br>Address:</td>
                <td class= "Address_table"style="width:42%">Vill: {{Session::get('pre_vill')}}</td>
                <td class= "Address_table"style="width:42%">P.O: {{Session::get('pre_po')}}</td>
            </tr>


            <tr>
                <td class= "Address_table">Upazilla: {{Session::get('pre_upa')}}</td>
                <td class= "Address_table">Dist: {{Session::get('pre_dist')}}</td>
            </tr>


</table> <!--Present Address_table_end-->





<!--Permanent_Address_table_start-->


<table style="width:100%;margin-top: 20px;">

            <tr>
                <td  rowspan="2"style="width:15%">Parmanent Address:</td>
                <td class= "Address_table"style="width:42.5%">Vill: {{Session::get('per_vill')}}</td>
                <td class= "Address_table"style="width:42.5%">P.O: {{Session::get('per_po')}}</td>
            </tr>
            <tr>
                <td class= "Address_table">Upazilla: {{Session::get('per_upa')}}</td>
                <td class= "Address_table">Dist: {{Session::get('per_dist')}}</td>
            </tr>
</table> <!--Permanent_Address_table_start-->



<!--address section end-->









<!--relative_emergency section start-->


<table style="width:100%;margin-top: 20px;">
        <tr>
            <td style="width:30%">Emergency Address:</td>
            <td class= "relative_emergency">{{Session::get('rel_address')}}</td>
        </tr>
        <tr>
            <td style="width:30%">Emergency Number:</td>
            <td class= "relative_emergency">{{Session::get('rel_num')}}</td>
        </tr>
</table><!--relative_emergency section end-->








<!--admission_discharge section start-->


<table style="width:100%;margin-top:20PX;">

        <tr>
            <td style="width:15%">Consultant:</td>
            <td class= "add_dis_table" style="width:50%">{{Session::get('consultant')}}</td>
            <td style="width:20%; text-align:right;">Date of admission:</td>
            <td style="width:15%">{{Session::get('admission_date')}}</td>
        </tr>

</table> <!--admission_admission section end-->













<!--Diagnosis section start-->


<table style="width:100%; margin-top:20px;">
        
        <tr>
            <td style="width:15%;">Diagnosis:</td>
            <td style="width:85%; height:50px; border: 1px solid black;"></td>
        </tr>

</table><!--Diagnosis section start-->





<table style="width:100%;margin-top:20PX;">

        <tr>
            <td style="width:50%"></td>
            <td style="width:20%">Package: {{Session::get('package_confirmation')}}</td>
            <td style="width:15%;">Ligation: {{Session::get('ligation')}}</td>
            <td style="width:15%;">3rd seizure: {{Session::get('third_seizure')}}</td>
        </tr>

</table>

<table style="width:100%;margin-top:20PX;">
    <tr>
        <th style="width:50%;">DISCHARGE NOTE/DEATH NOTE</th>
        <td></td>
    </tr>
    <tr>
        <td rowspan="4"style="border: 1px solid black;"></td>
        <td style="width:50%;border: 1px solid transparent;">Fee: {{Session::get('admission_fee')}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid transparent;">Paid: {{Session::get('paid_amount')}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid transparent;">Change: {{Session::get('changes')}}</td>
    </tr>
    <tr>
        <td style="border: 1px solid transparent;">Receptionist: {{Session::get('R_NAME')}} ({{Session::get('REC_SESSION_ID')}})</td>
    </tr>
</table>




<!--footer start-->


<table class="footer">
        <tr>
            <td>ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল সেবায় অনন্য</td>
        </tr>
</table><!--footer end-->


</td><!--1st invoice main td end-->









































    <!--2nd invoice start-->

    <td style="width:50%;padding: 20px;"; class="invisible"> <br>  <!--2nd invoice main td start-->

    <table class="main" style="width:100%">
        <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সব সাধরনের জন্য উন্মুক্ত</div>
            <tr >
                <td style="line-height: 210%;">
                    <div style="font-size:30px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
                    <div style="font-size:22px;">MAYNAMATI CANTOMENT GENERAL HOSPITAL</div>
                    <div style="font-size:20px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
                    <div style="font-size:15px ;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯</div>
                    <div style="font-size:15px ;">ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭</div>
                </td> 
            </tr>
</table><!--Header end-->







<!--addmission ticket start-->


<table class="ticket_table">
        <tr>
            <td>Admission Ticket</td>
        </tr>
</table><!--addmission ticket end-->




<!--reg_date table start-->

<table style="width:100%;margin-top: 20px;"> 

        <tr>
            <td style="width:80%">Reg.No- </td>
            <td style="width:50%">Date- </td>
        </tr>

</table><!--reg_date table end-->





<!--patient details start-->




<table  style="width:100%;margin-top: 20px;">


            <tr>
                <td class= "patient_details"style="width:50%">Patient's Name:</td>
                <td class= "patient_details"style="width:50%">Gender:</td>  
            </tr>

            <tr>
                <td class= "patient_details">Age:</td>
                <td class= "patient_details">Bed/cabin no:</td>
            </tr>

            <tr>
                <td class= "patient_details">Religion:</td>
                <td class= "patient_details"></td>
            </tr>

</table> <!--patient details end-->






<!--address section start-->


<!--Present Address_table_start-->

<table style="width:100%;margin-top: 20px;">

            <tr>
                    <td  rowspan="2"style="width:15%">Present Address:</td>
                    <td class= "Address_table"style="width:42%">Vill:</td>
                    <td class= "Address_table"style="width:42%">P.O:</td>
            </tr>


            <tr>
                    <td class= "Address_table">Upazilla:</td>
                    <td class= "Address_table">Dist:</td>
            </tr>


</table> <!--Present Address_table_end-->





<!--Permanent_Address_table_start-->


<table style="width:100%;margin-top: 20px;">

        <tr>
                <td  rowspan="2"style="width:15%">Parmanent Address:</td>
                <td class= "Address_table"style="width:42%">Vill:</td>
                <td class= "Address_table"style="width:42%">P.O:</td>
        </tr>
        <tr>
                <td class= "Address_table">Upazilla:</td>
                <td class= "Address_table">Dist:</td>
        </tr>
</table> <!--Parmanent_Address_table_start-->



<!--adress section end-->









<!--admission_admission section start-->


<table style="width:100%;margin-top:20PX;">

        <tr>
                <td style="width:15%">Date of admission:</td>
                <td class= "add_dis_table" style="width:35%">  </td>
                <td style="width:15%;">Date of discharge:</td>
                <td class= "add_dis_table" style="width:35%">  </td>
        </tr>

</table> <!--admission_admission section end-->







<!--Consultant section start-->

<table style="width:100%;margin-top: 20px;">

        <tr>
                <td style="width:15%">Consultant:</td>
                <td class= "Consultant_table" style="width:85%"></td>
        </tr>

</table><!--Consultant section end-->









<!--relative_emergency section start-->


<table style="width:100%;margin-top: 20px;">

        <tr>
            <td rowspan="3" style="width:30%">Address of relatives for Emergancy <br> Telephone no(if any): </td>
            <td class= "relative_emergency"></td>
        </tr>
        <tr>
            <td class= "relative_emergency"></td>
        </tr>
        <tr>
            <td class= "relative_emergency"></td>
        </tr>
</table><!--relative_emergency section end-->







<!--Diagnosis section start-->

<table style="width:100%;margin-top: 20px;">

        <tr>
                <td style="width:15%">Diagnosis:</td>
                <td class= "Diagnosis_table" style="width:85%"></td>
        </tr>

</table><!--Diagnosis section start-->






<!--DISCHARGE NOTE/DEATH NOTE section start-->

<table style="width:100%;margin-top: 20px;border: 1px solid black;"> 

            <tr> 
                <th>DISCHARGE NOTE/DEATH NOTE</th>
            </tr>
            <tr> 
                <td style="padding: 70px;"></td>
            </tr>

</table><!--DISCHARGE NOTE/DEATH NOTE section end-->




<!--Duty officer/staff section start-->

<table style="width:100%;margin-top: 20px;"> 
        <tr> 
            <td style="padding-left:60% ;"> Duty Medical Officer/ Staff on Duty</td>
        </tr>


</table><!--Duty officer/staff section end-->


<!--footer start-->


<table class="footer">
        <tr>
            <td>ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল সেবায় অনন্য</td>
        </tr>
</table><!--footer end-->





</td> <!--2nd invoice main td end-->
</tr> <!--main tr start-->


</table> <!--main table end-->
