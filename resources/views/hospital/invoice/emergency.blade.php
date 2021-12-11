<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>invoice</title>
    <style >

    .invoice{
        height:595px;
        width: 90%;
        margin-top: 0px;
        margin: auto;
        font-family:arial,sans-serif,helvetica;
    }
    .header{
        background-color:#f2f2f2;
        font-size: 12px;
        text-align: center;
        padding: 3px;
        color: black;
        font-weight: bold;
    }
    .main{
        border:px solid black;
        text-align: center;
        margin-top: 10px;
    }
    .m_invoice{
        width:100%;
        margin-top:10px;
        text-align: center;
        background-color: #f2f2f2;
        color: black;
        font-size: 13px;
        padding: 3px;
        font-weight: bold;
    }
    .Patient_Details_table{
        margin-top: 10px;
        width:100%;
        font-size: 13px;
    }
    #doctor_table{
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
        text-align: center;
    }
    #doctor_table td, #doctor_table th{
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 12px;
    }
    #doctor_table tr:nth-child(even){
        background-color: WHITE;
    }
    #doctor_table tr:hover{
        background-color: #ddd;
    }
    #doctor_table th {
        background-color: #f2f2f2;
        color: black;
        font-size: 12px;
    }
    .note_table{
        border: 1px solid black;
        width:100%;
    }
    .note_table_text{
        border: 1px solid black; 
        width: 15%;
        font-size: 12px;
    }

</style>
</head>
<body class="invoice">




<!--Header start-->

<table class="main" style="width:100%">

    <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব সাধারনের জন্য উন্মুক্ত</div>
    <tr >
        <td style="line-height: 130%;">
            <div style="font-size:15px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
            <div style="font-size:13px;">MAINAMATI CANTONMENT GENERAL HOSPITAL</div>
            <div style="font-size:11px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
            <div style="font-size:10px ;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯ <br>ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭ </div>
        </td> 
    </tr>

</table><!--Header end-->


<table class="m_invoice">

        <tr>
            <td>EMERGENCY INVOICE</td>
        </tr>

</table>


<!--rc_reception id_date table start-->

<table style="width:100%;margin-top: 5px;font-size: 13PX;"> 

    <tr>
        <td style="width:60%">Reception: {{Session::get('R_NAME')}} ({{Session::get('rId')}})</td>
        <td style="width:40%">Date: {{Session::get('reg_date')}}</td>
    </tr>
    <tr> 
        <td colspan="2" >Patient Name: {{Session::get('er_pName')}}</td>
    </tr>

</table><!--rc_reception id_date table end-->



<!--Patient Details-->

<table class="Patient_Details_table">

    <tr>
        <td colspan="2" >Ref. Name: {{Session::get('er_refName')}}</td>
        <td ></td>
    </tr>
    <tr>
        <td >Ref. Cell number: {{Session::get('er_refCell')}}</td>
        <td ></td>
    </tr>

</table> <!--Patient Details end-->



<!--doctor_table start-->

<table id="doctor_table">

    <tr>
        <th style="width: 10%;">#</th>
        <th style="width: 59.8%;">Doctor name</th>
        <th style="width: 30.3%;">Fee</th>
    </tr>
    <tr>
        <td>1</td>
        <td>{{Session::get('dName')}}</td>
        <td>{{Session::get('fee')}}</td>
    </tr>

</table><!--doctor_table end-->



<!--note_table Start-->

<table class="note_table">

    <tr>
        <td rowspan="2"><b>Note:</b></td>
        <td class="note_table_text">Received:</td>
        <td class="note_table_text">{{Session::get('received')}}</td>
    </tr>
        
    <tr>
        <td class="note_table_text">Change:</td>
        <td class="note_table_text">{{Session::get('changes')}}</td>
    </tr>

</table> <!--note_table end-->



<!--thank_yu section start-->

<table class="m_invoice"style="margin-top: 30px;">

    <tr>
        <td>THANK YOU</td>
    </tr>

</table><!--thank_yu section end-->

</body>
</html>