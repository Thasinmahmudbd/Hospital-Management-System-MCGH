<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>invoice</title>
<style>

.invoice{
    height:1754px;
    width: 1240px;
    margin-top: 0px;
    
    font-family:arial,sans-serif,helvetica;
}

.main {
    text-align: center;
    margin-top: 10px;
}

.header{
    background-color: #04AA6D; /*#bdbbb7*/
    font-size: 25px;
    text-align: center;
    padding: 5px;
    color:#fff;
}

.m_invoic{
    width:100%;
    margin-top: 20px;
    text-align: center;
    background-color: #04AA6D; /*#bdbbb7*/
    color:#fff;
    font-weight: bold;
    font-size: 25px;
    padding: 5px;
}

.patient_details{
    border:1px solid black;
    padding:5px;
    font-size: 18px;
}

.OT_Expences {
    border:1px solid black;
    padding:5px; 
    font-size: 18px;
}

.ot_incharge{
    border-top: 2px solid #000;
    font-size: 18px;
}

h2{
    font-size: 20px;
}

.patient_id{
    font-weight: bold;
    font-size: 25px;
    padding: 5px;
}

table{
    border-collapse:collapse;
}

.gap{
    padding:1rem;
}

</style>
</head>
<body class="invoice">

    <!--header start-->
    <table class="main" style="width:100%">

        <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব-সাধারণের জন্য উন্মুক্ত</div>

        <tr >
            <td style="line-height:1.5;">

                <p style="font-size:35px; margin:0px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</p>
                <p style="font-size:28px; margin:0px;">MAYNAMATI CANTONMENT GENERAL HOSPITAL</p>
                <p style="font-size:25px; margin:0px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</p>
                <p style="font-size:20px ;background-color:#04AA6D; color:#fff;">মোবাইল-০১৭৩০-০৮৭৯৩৯,মোবাইল-০১৭৩০-০৮৭৯৪৯ ,ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭</p>

            </td>
        </tr>

    </table><!--header end-->



    <!--time_date start-->


    <table style="width:100%;margin-top: 20px;font-size: 20px;">

        <tr>
            <td rowspan="3"style="width:70%"></td>
            <td style="width:30%">Timestamp: {{Session::get('ot_timestamp')}}</td>
        </tr>

        <tr>
            <td>Date: {{Session::get('o_data')}}</td>
        </tr>

    </table><!--time_date end-->



    <!--patient_details start-->

    <h2>Patient Id: {{Session::get('pId')}}</h2>



    <table style="width:100%;margin-top: 20px;">

        <tr>
            <td class= "patient_details" style="width:50%">Name of Patient: {{Session::get('pName')}}</td>
            <td class= "patient_details" style="width:50%" >Bed/cabin No: {{Session::get('bed_no')}}</td>
        </tr>
        <tr>
            <td class= "patient_details">Name of Operation: {{Session::get('o_type')}}</td>
            <td class= "patient_details">Start Time: {{Session::get('o_time')}}</td>
        </tr>
        <tr>
            <td class= "patient_details">Types of Anaesthesia: {{Session::get('a_type')}}</td>
            <td class= "patient_details">Duration Time: {{Session::get('o_duration')}}</td>
        </tr>

    </table><!--patient_details end-->


    <div class="gap"></div>


    <!--OT Expences start-->


    <h2>OT Expences</h2>

    <table  style="width:100%">

            <tr>
                <th class= "OT_Expences" style="width:70%; text-align:left; font-weight:normal;">OT Charge</th>
                <td class= "OT_Expences" style="width:30%; text-align:center;">{{Session::get('o_charge_income')}}</td>
            </tr>
            <tr>
                <th class= "OT_Expences" style="text-align:left; font-weight:normal;">OT Other Charge</th>
                <td class= "OT_Expences" style="text-align:center;">{{Session::get('other_charges')}}</td>
            </tr>

    </table> <!--OT Expences end--> 


    <div class="gap"></div>


    <!--Surgeon Expences start-->

    <h2>Surgeon Expences</h2>

    <table  style="width:100%">

            <tr>
                <th class= "OT_Expences"style="width:5%">S/N</th>
                <th class= "OT_Expences" style="width:65%">Surgeon name</th>
                <th class= "OT_Expences" style="width:30%"> Charges</th>
            </tr>

            @foreach($chosen_surgeons as $list)

            <tr>
                <td class= "OT_Expences" style="text-align:center;">1.</td>
                <td class= "OT_Expences">{{$list->Surgeon_Name}}</td>
                <td class= "OT_Expences" style="text-align:center;">{{$list->Surgeon_Income}}</td>
            </tr>

            @endforeach

    </table><!--Surgeon Expences end-->


    <div class="gap"></div>


    <!--Anesthesiologist Expences start-->

    <h2>Anesthesiologist Expences</h2>

    <table  style="width:100%">

            <tr>
                <th class= "OT_Expences"style="width:5%">S/N</th>
                <th class= "OT_Expences" style="width:65%">Anesthesiologist name</th>
                <th class= "OT_Expences" style="width:30%"> Charges</th>
            </tr>

            @foreach($chosen_anesthesiologist as $list)

            <tr>
                <td class= "OT_Expences" style="text-align:center;">1.</td>
                <td class= "OT_Expences">{{$list->Anesthesiologist_Name}}</td>
                <td class= "OT_Expences" style="text-align:center;">{{$list->Anesthesiologist_Income}}</td>
            </tr>
            
            @endforeach

    </table><!--Anaesthesiologist Expences start-->


    <div class="gap"></div>


    <!--Nurse Expences start-->
    <h2>Nurse Expences</h2>

    <table  style="width:100%">

            <tr>
                <th class= "OT_Expences"style="width:5%">S/N</th>
                <th class= "OT_Expences" style="width:65%">Nurse name</th>
                <th class= "OT_Expences" style="width:30%"> Charges</th>
            </tr>

            @foreach($chosen_nurses as $list)

            <tr>
                <td class= "OT_Expences" style="text-align:center;">1.</td>
                <td class= "OT_Expences">{{$list->Nurse_Name}}</td>
                <td class= "OT_Expences" style="text-align:center;">{{$list->Nurse_Fee}}</td>
            </tr>

            @endforeach

    </table><!--Nurse Expences end-->


    <div class="gap"></div>


    <!--Assistant Expences start-->
    <h2>Assistant Expences</h2>

    <table  style="width:100%">

            <tr>
                <th class= "OT_Expences"style="width:5%">S/N</th>
                <th class= "OT_Expences" style="width:65%">Assistant name</th>
                <th class= "OT_Expences" style="width:30%"> Charges</th>
            </tr>

            @foreach($chosen_assistant as $list)

            <tr>
                <td class= "OT_Expences" style="text-align:center;">1.</td>
                <td class= "OT_Expences">{{$list->Assistant_Name}}</td>
                <td class= "OT_Expences" style="text-align:center;">{{$list->Assistant_Fee}}</td>
            </tr>

            @endforeach

            <tr>
                <td ></td>
                <td ></td>
                <td class= "OT_Expences">Total:</td>
            </tr>

    </table><!--Assistant Expences end-->


    <div class="gap"></div>


    <table style="width:100%;margin-top: 70px;">

        <tr>
            
            <th class= "ot_incharge" width="25%">OT In-Charge</th>
            <th width="12.5%"></th>
            <th class= "ot_incharge" width="25%">Anesthesiologist</th>
            <th width="12.5%"></th>
            <th class= "ot_incharge" width="25%">Surgeon</th>
            
        </tr>

    </table>





    <table class="m_invoic">

        <tr>
            <td>ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল সেবায় অনন্য</td>
        </tr>

    </table>

</body>
</html>