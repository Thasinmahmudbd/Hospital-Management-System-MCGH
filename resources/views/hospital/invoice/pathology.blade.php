<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>invoice</title>

    <style>

        .invoice{
            height: 100%;
            width: 90%;
            margin: auto;
            margin-top: 0px;
            font-family: arial,sans-serif,helvetica;
        }

        .header{
            background-color: #f2f2f2;
            font-size: 12px;
            text-align: center;
            padding: 3px;
            color: black;
            font-weight: bold;
        }

        .main {
            text-align: center;
            margin-top: 10px;
        }

        .m_invoic{
            width: 100%;
            margin-top: 5px;
            text-align: center;
            background-color: #f2f2f2;
            color: black;
            font-size: 13px;
            padding: 3px;
            font-weight: bold;
        }

        .Patient_Details_table{
            margin-top: 10px;
            width: 100%;
            font-size: 13px;
        }

        .test_table{
            border: 1px solid black;
            padding: 2px; 
            font-size: 11px;
            text-align: center;
        }

        table{
            border-collapse: collapse;
        }

        .tr{
            line-height:1.8;
        }

        .total_les_due1 {
            padding: 3px; 
            font-size: 12px;
            text-align: right;
        }

        .total_les_due2 {
            border: 1px solid black;
            padding: 3px; 
            font-size: 12px;
            text-align: right;
        }

        .test_table_border_less{
            padding: 2px; 
            font-size: 11px;
            text-align: right;
            font-weight:bold;
        }

        .test_table_border{
            border: 1px solid black;
            padding: 2px; 
            font-size: 11px;
            text-align: right;
        }

    </style>

</head>

<body class="invoice">

    <!--Header start-->
    <table class="main" style="width:100%">

        <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত, সর্ব সাধারনের জন্য উন্মুক্ত</div>

        <tr>
            <td style="line-height: 130%;">
                <div style="font-size:15px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
                <div style="font-size:13px;">MAINAMATI CANTONMENT GENERAL HOSPITAL</div>
                <div style="font-size:11px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
                <div style="font-size:10px;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯ </div>
            </td> 
        </tr>

    </table><!--Header end-->


    <table class="m_invoic">

        <tr>
            <td>INVOICE</td>
        </tr>

    </table>


    <!--Patient_Details_table_start-->
    <table class="Patient_Details_table" >

        <tr class="tr"> 
            <td colspan="2"><b>Receptionist:</b> {{Session::get('R_NAME')}} ({{Session::get('rId')}})</td>
            <td style="width: 40%;" ><b>Registration Date:</b> {{Session::get('reg_date')}}</td>
        </tr>

        <tr class="tr"> 
            <td colspan="2"><b>Patient ID:</b> {{Session::get('pId')}}</td>
            <td style="width: 40%;" ><b>Delivery Date:</b> {{Session::get('del_date')}}</td>
        </tr>

        <tr class="tr">
            <td colspan="3"><b>Patient Name:</b> {{Session::get('pName')}}</td>
        </tr>

        <tr class="tr"> 
            <td style="width: 30%;"><b>Gender:</b> {{Session::get('pGender')}}</td>
            <td style="width: 30%;"> <b>Age:</b> {{Session::get('pAge')}}</td>
            <td style="width: 40%;"><b>Phone:</b> {{Session::get('cellNum')}}</td>
        </tr>

        <tr class="tr">
            <td colspan="3"><b>Refer:</b> {{Session::get('dName')}}</td>
        </tr>

    </table><!--Patient_Details_table_end-->


    <!--test_details table start-->
    <table style="width:100%;margin-top: 10PX;">

        <tr>
            <th class= "test_table"style="width:8%;">S/N</th>
            <th class= "test_table" style="width:20%">Group</th>
            <th class= "test_table" style="width:40%">Test Name</th>
            <th  class= "test_table"style="width:14%">Room No</th>
            <th  class= "test_table"style="width:18%">Amount</th>
        </tr>

        <?php $serial = 1; ?>
        @foreach($result as $list)
        <tr>
            <td class= "test_table"><?php echo $serial; $serial++; ?></td>
            <td class= "test_table">{{$list->Groups}}</td>
            <td class= "test_table">{{$list->Test_Name}}</td>
            <td class= "test_table">{{$list->Room_No}}</td>
            <td class= "test_table"style="text-align: right;">{{$list->Fee}}</td>
        </tr>
        @endforeach

    </table><!--test_details table end-->


    <!--total_less-due start-->
    <table style="width:100%">

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%">Total:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('total_amount')}}</td>
        </tr>

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%">Discount:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('discount')}}%</td>
        </tr>

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%" >Payable:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('payable_amount')}}</td>
        </tr>

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%">Received:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('received')}}</td>
        </tr>

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%">Change:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('changes')}}</td>
        </tr>

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%">Paid:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('paid_amount')}}</td>
        </tr>

        <tr>
            <td class= "test_table_border_less" style="width:8%"></td>
            <td class= "test_table_border_less" style="width:20%"></td>
            <td class= "test_table_border_less" style="width:40%"></td>
            <td class= "test_table_border_less" style="width:14%">Due:</td>
            <td class= "test_table_border" style="width:18%" >{{Session::get('due')}}</td>
        </tr>

    </table><!--total_less-due end-->


    <table class="m_invoic" style="margin-top: 10px;">

        <tr>
            <td>ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল সেবায় অনন্য</td>
        </tr>

    </table>

</body>
</html>