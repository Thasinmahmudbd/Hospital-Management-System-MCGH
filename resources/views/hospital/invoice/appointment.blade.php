
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>invoice</title>
	<style >
	.invoice{
  margin-top: 0px;
  margin-right: 5px;
  margin-left: 5px;
  font-family:arial,sans-serif,helvetica;
  line-height: 1.5;
}

.header{
  background-color:#04AA6D;;
  font-size: 15px;
  text-align: center;
  padding: 3px;
  color: white;
 
}
.main {
  border:px solid black;
  text-align: center;
  margin-top: 10px;
}
.m_invoic{
 
  width:100%;
  margin-top:10px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
  font-size: 13px;
  padding: 3px;
 
}
.Patient_Details_table{
   margin-top: 10px;
   width:100%;
   font-size: 13px;
}
#doctor_table {
  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

#doctor_table td, #doctor_table th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 12px;
  letter-spacing:2px;
  text-align:center;
}

#doctor_table tr:nth-child(even){background-color: #f2f2f2;}

#doctor_table tr:hover {background-color: #ddd;}

#doctor_table th {
  background-color: #04AA6D;
  color: white;
  font-size: 12px;
  letter-spacing:2px;
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

.page_break{
  page-break-after:always;
}

</style>
</head>
<body class="invoice">


<div>

  <!--Header start-->

  <table class="main" style="width:100%">
            <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব সাধরনের জন্য উন্মুক্ত</div>
            <tr>
              <td style="line-height: 1.5;">
                  <div style="font-size:20px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
                  <div style="font-size:15px;">MAYNAMATI CANTONMENT GENERAL HOSPITAL</div>
                  <div style="font-size:15px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
                  <div style="font-size:15px ;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯ ,<br>ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭</div>
              </td> 
            </tr>
  </table><!--Header end-->

  <table class="m_invoic">
    
          <tr>
            <td>MEDICAL INVOICE (Patient Copy)</td>
          </tr>

  </table>

  <!--rc_receptionid_date table start-->

  <table style="width:100%;margin-top: 5px;font-size: 12PX;"> 
    
          <tr>
                    <td style="width:25%">RC: {{Session::get('randomCode')}} </td>
                    <td style="width:50%">Receptionist:  {{Session::get('R_NAME')}} ({{Session::get('rId')}}) </td>
                    <td style="width:25%">Date: {{Session::get('DATE_TODAY')}}</td>
          </tr>

  </table><!--rc_receptionid_date table end-->

  <!--Patient Details-->

  <table class="Patient_Details_table">

        <tr>
            <td style="font-size:15px;" ><b>Patient Details</b></td>
        </tr>
        <tr>
            <td style="width:60%">Patient ID: {{Session::get('pId')}}</td>
            <td style="width:40%" ></td>
        </tr>
        <tr>
            <td >Name: {{Session::get('pName')}}</td>
            <td >NID: {{Session::get('nid')}}</td>
        </tr>
        <tr>
            <td >Gender: {{Session::get('pGender')}}</td>
            <td >NID Type: {{Session::get('nidType')}}</td>
        </tr>
        <tr>
            <td >Age: {{Session::get('pAge')}}</td>
            <td>Appointment Date: {{Session::get('apDate')}}</td>
        </tr>
        <tr>
            <td >Phone:  {{Session::get('cellNum')}}</td>
            <td>Appointment Time: {{Session::get('apTime')}}</td>
        </tr>
    
  </table> <!--Patient Details end-->

  <!--Serial table start-->

  <table style="width:100%;margin-top:5px;font-size:13px;"> 
        <tr> 
          <td> Serial No: {{Session::get('token')}}</td>
        </tr>
  </table><!--Serial table end-->

  <!--doctor_table start-->

  <table id="doctor_table">
          <tr>
                <th>#</th>
                <th >Doctor name</th>
                <th >Fee</th>
                <th >Discount</th>
                <th >Payable amount</th>
          </tr>
          <tr>
                <td>1</td>
                <td>{{Session::get('dName')}}</td>
                <td>{{Session::get('basicFee')}}</td>
                <td>{{Session::get('discount')}}</td>
                <td>{{Session::get('finalFee')}}</td>
          </tr>
          
          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>

          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>

          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>
          
  </table><!--doctor_table end-->

  <!--note_table Start-->

  <table class="note_table" >
          <tr>
              <td rowspan="2"><b>Note:</b></td>
              <td class="note_table_text" style="text-align:center;">Received:</td>
              <td class="note_table_text" style="text-align:center;">{{Session::get('received')}}tk</td>
            
          </tr>
          
          <tr>
              <td class="note_table_text" style="text-align:center;">Change:</td>
              <td class="note_table_text" style="text-align:center;">{{Session::get('changes')}}tk</td>
          </tr>

  </table> <!--note_table end-->

  <!--thank_yu section start-->


  <table class="m_invoic"style="margin-top: 30px;">
    
          <tr>
              <td>THANK YOU</td>
          </tr>

  </table><!--thank_yu section end-->

</div>




<div class="page_break"></div>




<div>

  <!--Header start-->

  <table class="main" style="width:100%">
            <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব সাধরনের জন্য উন্মুক্ত</div>
            <tr>
              <td style="line-height: 1.5;">
                  <div style="font-size:20px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
                  <div style="font-size:15px;">MAYNAMATI CANTOMENT GENERAL HOSPITAL</div>
                  <div style="font-size:15px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
                  <div style="font-size:15px ;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯ ,<br>ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭</div>
              </td> 
            </tr>
  </table><!--Header end-->

  <table class="m_invoic">
    
          <tr>
            <td>MEDICAL INVOICE (Doctor Copy)</td>
          </tr>

  </table>

  <!--rc_receptionid_date table start-->

  <table style="width:100%;margin-top: 5px;font-size: 12PX;"> 
    
          <tr>
                    <td style="width:25%">RC: {{Session::get('randomCode')}} </td>
                    <td style="width:50%">Receptionist:  {{Session::get('R_NAME')}} ({{Session::get('rId')}}) </td>
                    <td style="width:25%">Date: {{Session::get('DATE_TODAY')}}</td>
          </tr>

  </table><!--rc_receptionid_date table end-->

  <!--Patient Details-->

  <table class="Patient_Details_table">

        <tr>
            <td style="font-size:15px;" ><b>Patient Details</b></td>
        </tr>
        <tr>
            <td style="width:60%">Patient ID: {{Session::get('pId')}}</td>
            <td style="width:40%" ></td>
        </tr>
        <tr>
            <td >Name: {{Session::get('pName')}}</td>
            <td >NID: {{Session::get('nid')}}</td>
        </tr>
        <tr>
            <td >Gender: {{Session::get('pGender')}}</td>
            <td >NID Type: {{Session::get('nidType')}}</td>
        </tr>
        <tr>
            <td >Age: {{Session::get('pAge')}}</td>
            <td>Appointment Date: {{Session::get('apDate')}}</td>
        </tr>
        <tr>
            <td >Phone:  {{Session::get('cellNum')}}</td>
            <td>Appointment Time: {{Session::get('apTime')}}</td>
        </tr>
    
  </table> <!--Patient Details end-->

  <!--Serial table start-->

  <table style="width:100%;margin-top:5px;font-size:13px;"> 
        <tr> 
          <td> Serial No: {{Session::get('token')}}</td>
        </tr>
  </table><!--Serial table end-->

  <!--doctor_table start-->

  <table id="doctor_table">
          <tr>
                <th>#</th>
                <th >Doctor name</th>
                <th >Fee</th>
                <th >Discount</th>
                <th >Payable amount</th>
          </tr>
          <tr>
                <td>1</td>
                <td>{{Session::get('dName')}}</td>
                <td>{{Session::get('basicFee')}}</td>
                <td>{{Session::get('discount')}}</td>
                <td>{{Session::get('finalFee')}}</td>
          </tr>
          
          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>

          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>

          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>
          
  </table><!--doctor_table end-->

  <!--note_table Start-->

  <table class="note_table" >
          <tr>
              <td rowspan="2"><b>Note:</b></td>
              <td class="note_table_text" style="text-align:center;">Received:</td>
              <td class="note_table_text" style="text-align:center;">{{Session::get('received')}}tk</td>
            
          </tr>
          
          <tr>
              <td class="note_table_text" style="text-align:center;">Change:</td>
              <td class="note_table_text" style="text-align:center;">{{Session::get('changes')}}tk</td>
          </tr>

  </table> <!--note_table end-->

  <!--thank_yu section start-->


  <table class="m_invoic"style="margin-top: 30px;">
    
          <tr>
              <td>THANK YOU</td>
          </tr>

  </table><!--thank_yu section end-->

</div>




<div class="page_break"></div>




<div>

  <!--Header start-->

  <table class="main" style="width:100%">
            <div class="header">সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব সাধরনের জন্য উন্মুক্ত</div>
            <tr>
              <td style="line-height: 1.5;">
                  <div style="font-size:20px;">ময়নামতি ক্যান্টনম্যান্ট জেনারেল হসপিটাল</div>
                  <div style="font-size:15px;">MAYNAMATI CANTOMENT GENERAL HOSPITAL</div>
                  <div style="font-size:15px;">টিপরা বাজার,কুমিল্লা সেনানিবাস</div>
                  <div style="font-size:15px ;">মোবাইল-০১৭৩০-০৮৭৯৪৯,মোবাইল-০১৭৩০-০৮৭৯৩৯ ,<br>ফোন ০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭</div>
              </td> 
            </tr>
  </table><!--Header end-->

  <table class="m_invoic">
    
          <tr>
            <td>MEDICAL INVOICE (Office Copy)</td>
          </tr>

  </table>

  <!--rc_receptionid_date table start-->

  <table style="width:100%;margin-top: 5px;font-size: 12PX;"> 
    
          <tr>
                    <td style="width:25%">RC: {{Session::get('randomCode')}} </td>
                    <td style="width:50%">Receptionist:  {{Session::get('R_NAME')}} ({{Session::get('rId')}}) </td>
                    <td style="width:25%">Date: {{Session::get('DATE_TODAY')}}</td>
          </tr>

  </table><!--rc_receptionid_date table end-->

  <!--Patient Details-->

  <table class="Patient_Details_table">

        <tr>
            <td style="font-size:15px;" ><b>Patient Details</b></td>
        </tr>
        <tr>
            <td style="width:60%">Patient ID: {{Session::get('pId')}}</td>
            <td style="width:40%" ></td>
        </tr>
        <tr>
            <td >Name: {{Session::get('pName')}}</td>
            <td >NID: {{Session::get('nid')}}</td>
        </tr>
        <tr>
            <td >Gender: {{Session::get('pGender')}}</td>
            <td >NID Type: {{Session::get('nidType')}}</td>
        </tr>
        <tr>
            <td >Age: {{Session::get('pAge')}}</td>
            <td>Appointment Date: {{Session::get('apDate')}}</td>
        </tr>
        <tr>
            <td >Phone:  {{Session::get('cellNum')}}</td>
            <td>Appointment Time: {{Session::get('apTime')}}</td>
        </tr>
    
  </table> <!--Patient Details end-->

  <!--Serial table start-->

  <table style="width:100%;margin-top:5px;font-size:13px;"> 
        <tr> 
          <td> Serial No: {{Session::get('token')}}</td>
        </tr>
  </table><!--Serial table end-->

  <!--doctor_table start-->

  <table id="doctor_table">
          <tr>
                <th>#</th>
                <th >Doctor name</th>
                <th >Fee</th>
                <th >Discount</th>
                <th >Payable amount</th>
          </tr>
          <tr>
                <td>1</td>
                <td>{{Session::get('dName')}}</td>
                <td>{{Session::get('basicFee')}}</td>
                <td>{{Session::get('discount')}}</td>
                <td>{{Session::get('finalFee')}}</td>
          </tr>
          
          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>

          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>

          <tr>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
                <td><p></p></td>
          </tr>
          
  </table><!--doctor_table end-->

  <!--note_table Start-->

  <table class="note_table" >
          <tr>
              <td rowspan="2"><b>Note:</b></td>
              <td class="note_table_text" style="text-align:center;">Received:</td>
              <td class="note_table_text" style="text-align:center;">{{Session::get('received')}}tk</td>
            
          </tr>
          
          <tr>
              <td class="note_table_text" style="text-align:center;">Change:</td>
              <td class="note_table_text" style="text-align:center;">{{Session::get('changes')}}tk</td>
          </tr>

  </table> <!--note_table end-->

  <!--thank_yu section start-->


  <table class="m_invoic"style="margin-top: 30px;">
    
          <tr>
              <td>THANK YOU</td>
          </tr>

  </table><!--thank_yu section end-->

</div>

</body>
</html>