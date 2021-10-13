<!--<!DOCTYPE html>

<html>

  <head>

    <title> invoice</title>

  <!-- CSS 

    <style>

      body{
        display:flex;
      }

      .invoice{
        font-family: arial,helvetica,sans-serif;
      }
      .page_header{
        font-size:25px;
        color:  #04AA6D;
        padding-bottom:20px;
      }

      .logo{
        margin-top: 20px;
      }

      .m_invoice{
        width:50%;
        margin-top: 25px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
        font-size: 25px;
        padding: 10px;
      }

      .Patient_Details_table{
        margin-top: 50px;
        width:50%;
        font-size: 20px;
      }

      #doctor_table{
        border-collapse: collapse;
        width: 50%;
        margin-top: 100px;
      }

      #doctor_table td, #doctor_table th{
        border: 1px solid #ddd;
        padding: 15px;
        height:10px;
      }

      #doctor_table tr:nth-child(even){
        background-color: #f2f2f2;
      }

      #doctor_table tr:hover{
        background-color: #ddd;
      }

      #doctor_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }

      .note_table{
        border: 1px solid black;
        width:50%;
        padding-left:20px;
      }

      .note_table_text{
        border: 1px solid black;
        text-align:center; 
        width: 10%;
      }

      .thank{
        width:50%;
        margin-top: 25px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
        font-size: 25px;
        padding: 10px;
      }

      .footer{
        width:50%;
        margin-top: 25px;
        font-size: 20px;
      }

      .page_break{
        page-break-after:always;
      }

      

    </style>

  </head>

  <body>

  <!-- Patient invoice 

    <div class="invoice left">

      <table style="width:100%">

        <tr>
          <td style="width:100%" class="page_header"><b>Mainamati Cantonment General Hospital</b> </td>  
        </tr>

      </table>

      <table style="width:50%">

        <tr>
          <td style="font-size:20px">Near Cumilla Cantonment, Cumilla - Sylhet Road,</td>
          <td style="font-size:20px" > RC: {{Session::get('randomCode')}}</td>
        </tr>

        <tr>
          <td style="font-size:20px">Tiprabazar, Mainamati, Cumilla 3500</td>
          <td style="font-size:20px" > Receptionist ID: {{Session::get('rId')}}</td>
        </tr>

        <tr>
          <td style="font-size:20px">Bangladesh</td>
          <td style="font-size:20px">Date: {{Session::get('DATE_TODAY')}}</td>
        </tr>

      </table>

      <table class="m_invoice">

        <tr>
          <td>MEDICAL INVOICE (Patient Copy)</td>
        </tr>

      </table>

      <table class="Patient_Details_table">

        <tr>
          <td ><b style="font-size:30px" >Patient Details</b></td>
          <td></td>
        </tr>

        <tr>
          <td style="width:50%">Patient ID: {{Session::get('pId')}}</td>
          <td style="width:50%" >NID: {{Session::get('nid')}}</td>
        </tr>

        <tr>
          <td >Name: {{Session::get('pName')}}</td>
          <td >NID Type: {{Session::get('nidType')}}</td>
        </tr>

        <tr>
          <td >Gender: {{Session::get('pGender')}}</td>
          <td >Appointment date: {{Session::get('apDate')}}</td>
        </tr>

        <tr>
          <td >Phone: {{Session::get('cellNum')}}</td>
          <td>Appointment time: {{Session::get('apTime')}}</td>
        </tr>

      </table>

      <table id="doctor_table">

        <tr>
          <th>#</th>
          <th style="font-size:20px">Doctor</th>
          <th style="font-size:20px">Fee</th>
          <th style="font-size:20px">Discount</th>
          <th style="font-size:20px">Payable Amount</th>
        </tr>

        <tr>
          <td>1</td>
          <td>{{Session::get('dName')}}</td>
          <td>{{Session::get('basicFee')}}</td>
          <td>{{Session::get('discount')}}</td>
          <td>{{Session::get('finalFee')}}</td>
        </tr>

      </table>

      <table class="note_table" >

        <tr>
          <td rowspan="2"><h2> Note:</h2></td>
        </tr>

      </table>

      <table class="thank">

        <tr>
          <td >THANK YOU</td>
        </tr>

      </table>

      <table class="footer">

        <tr>
          <td >Phone:</td>
          <td >Email:</td>
        </tr>

        <tr>
          <td style="background-color: #04AA6D;height: 4px;"></td>
          <td style="background-color: #04AA6D;height: 4px;"></td>
        </tr>

      </table>

    </div>



  



    <!-- Patient invoice 

    <div class="invoice right">

      <table style="width:100%">

        <tr>
          <td style="width:100%" class="page_header"><b>Mainamati Cantonment General Hospital</b> </td>  
        </tr>

      </table>

      <table style="width:50%">

        <tr>
          <td style="font-size:20px">Near Cumilla Cantonment, Cumilla - Sylhet Road,</td>
          <td style="font-size:20px" > RC: {{Session::get('randomCode')}}</td>
        </tr>

        <tr>
          <td style="font-size:20px">Tiprabazar, Mainamati, Cumilla 3500</td>
          <td style="font-size:20px" > Receptionist ID: {{Session::get('rId')}}</td>
        </tr>

        <tr>
          <td style="font-size:20px">Bangladesh</td>
          <td style="font-size:20px">Date: {{Session::get('DATE_TODAY')}}</td>
        </tr>

      </table>

      <table class="m_invoice">

        <tr>
          <td>MEDICAL INVOICE (Office Copy)</td>
        </tr>

      </table>

      <table class="Patient_Details_table">

        <tr>
          <td ><b style="font-size:30px" >Patient Details</b></td>
          <td></td>
        </tr>

        <tr>
          <td style="width:50%">Patient ID: {{Session::get('pId')}}</td>
          <td style="width:50%" >NID: {{Session::get('nid')}}</td>
        </tr>

        <tr>
          <td >Name: {{Session::get('pName')}}</td>
          <td >NID Type: {{Session::get('nidType')}}</td>
        </tr>

        <tr>
          <td >Gender: {{Session::get('pGender')}}</td>
          <td >Appointment date: {{Session::get('apDate')}}</td>
        </tr>

        <tr>
          <td >Phone: {{Session::get('cellNum')}}</td>
          <td>Appointment time: {{Session::get('apTime')}}</td>
        </tr>

      </table>

      <table id="doctor_table">

        <tr>
          <th>#</th>
          <th style="font-size:20px">Doctor</th>
          <th style="font-size:20px">Fee</th>
          <th style="font-size:20px">Discount</th>
          <th style="font-size:20px">Payable Amount</th>
        </tr>

        <tr>
          <td>1</td>
          <td>{{Session::get('dName')}}</td>
          <td>{{Session::get('basicFee')}}</td>
          <td>{{Session::get('discount')}}</td>
          <td>{{Session::get('finalFee')}}</td>
        </tr>

      </table>

      <table class="note_table" >

        <tr>
          <td rowspan="2"><h2> Note:</h2></td>
        </tr>

      </table>

      <table class="thank">

        <tr>
          <td >THANK YOU</td>
        </tr>

      </table>

      <table class="footer">

        <tr>
          <td >Phone:</td>
          <td >Email:</td>
        </tr>

        <tr>
          <td style="background-color: #04AA6D;height: 4px;"></td>
          <td style="background-color: #04AA6D;height: 4px;"></td>
        </tr>

      </table>

    </div>

  </div>




<!-- Page break 

<div class="page_break"></div>



<!-- Patient invoice 

  <div class="invoice left">

    <table style="width:100%">

      <tr>
        <td style="width:100%" class="page_header"><b>Mainamati Cantonment General Hospital</b> </td>  
      </tr>

    </table>

    <table style="width:50%">

      <tr>
        <td style="font-size:20px">Near Cumilla Cantonment, Cumilla - Sylhet Road,</td>
        <td style="font-size:20px" > RC: {{Session::get('randomCode')}}</td>
      </tr>

      <tr>
        <td style="font-size:20px">Tiprabazar, Mainamati, Cumilla 3500</td>
        <td style="font-size:20px" > Receptionist ID: {{Session::get('rId')}}</td>
      </tr>

      <tr>
        <td style="font-size:20px">Bangladesh</td>
        <td style="font-size:20px">Date: {{Session::get('DATE_TODAY')}}</td>
      </tr>

    </table>

    <table class="m_invoice">

      <tr>
        <td>MEDICAL INVOICE (Doctor Copy)</td>
      </tr>

    </table>

    <table class="Patient_Details_table">

      <tr>
        <td ><b style="font-size:30px" >Patient Details</b></td>
        <td></td>
      </tr>

      <tr>
        <td style="width:50%">Patient ID: {{Session::get('pId')}}</td>
        <td style="width:50%" >NID: {{Session::get('nid')}}</td>
      </tr>

      <tr>
        <td >Name: {{Session::get('pName')}}</td>
        <td >NID Type: {{Session::get('nidType')}}</td>
      </tr>

      <tr>
        <td >Gender: {{Session::get('pGender')}}</td>
        <td >Appointment date: {{Session::get('apDate')}}</td>
      </tr>

      <tr>
        <td >Phone: {{Session::get('cellNum')}}</td>
        <td>Appointment time: {{Session::get('apTime')}}</td>
      </tr>

    </table>

    <table id="doctor_table">

      <tr>
        <th>#</th>
        <th style="font-size:20px">Doctor</th>
        <th style="font-size:20px">Fee</th>
        <th style="font-size:20px">Discount</th>
        <th style="font-size:20px">Payable Amount</th>
      </tr>

      <tr>
        <td>1</td>
        <td>{{Session::get('dName')}}</td>
        <td>{{Session::get('basicFee')}}</td>
        <td>{{Session::get('discount')}}</td>
        <td>{{Session::get('finalFee')}}</td>
      </tr>

    </table>

    <table class="note_table" >

      <tr>
        <td rowspan="2"><h2> Note:</h2></td>
      </tr>

    </table>

    <table class="thank">

      <tr>
        <td >THANK YOU</td>
      </tr>

    </table>

    <table class="footer">

      <tr>
        <td >Phone:</td>
        <td >Email:</td>
      </tr>

      <tr>
        <td style="background-color: #04AA6D;height: 4px;"></td>
        <td style="background-color: #04AA6D;height: 4px;"></td>
      </tr>

    </table>

  </div>

</body>

</html>-->

<!DOCTYPE html>
<html>
<style>

.invoice{
  height:1240px;
  width: 1754px;
  font-family:arial,helvetica,sans-serif;
}

.Hospital_name{
  font-size: 30px;
  color:#04AA6D ;
}

.m_invoice{
  width:100%;
  margin-top: 20px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
  font-size: 20px;
  padding: 5px;
}

.Patient_Details_table{
  margin-top: 30px;
  width:100%;
  font-size: 15px;
}

#doctor_table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 30px;
  margin-bottom: 25px;
}

#doctor_table td{
  border: 1px solid #ddd;
  padding: 12px;
}

#doctor_table tr:nth-child(even){background-color: #f2f2f2;}

#doctor_table tr:hover {background-color: #ddd;}

#doctor_table th {
  padding: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
  border: 1px solid #ddd;
}

.note_table{
  border: 1px solid black;
  width:100%;
}

.note_table_text{ 
  border: 1px solid black;
  width: 10%;
}

.invisible{
  opacity: 0;
}

.page_break{
  page-break-after:always;
}

.note{
  margin-left:15px;
}

.th{
  text-align:center;
}

.footer{
  width:100%;
  margin-top: 25px;
  font-size: 20px;
}

</style>





<body class="invoice">

  <!--1st page-->
  <table style="width:100%">    <!--main table start-->

    <tr> <!--main tr start-->

      <!--1st invoice start--> 

      <!--hospital address start-->

      <td style="width:50%;padding-right: 20px;">  <br>  <!--1st invoice main td start--> 

          <h2 class="Hospital_name">MAYNAMATI CANTONMENT GENERAL HOSPITAL (MCGH)</h2>

          <table >
              <tr >
                  <td style="width:25%; ">Near Comilla Cantonment Comilla - Sylhet Road,</td>
                  <td style="width:25%; " > RC: {{Session::get('randomCode')}}</td>
              </tr>
              <tr>
                  <td style="width:25%; ">Tiprabazar, Maynamati, Comilla 3500</td>
                  <td style="width:25%; " > Receptionist: {{Session::get('R_NAME')}} ({{Session::get('rId')}})</td>
              </tr>
              <tr>
                  <td >Bangladesh</td>
                  <td >Date:  {{Session::get('DATE_TODAY')}}</td>
              </tr>
          </table>

        <!--hospital address end-->
          <table class="m_invoice">
              <tr>
                  <td>MEDICAL INVOICE (Patient Copy)</td>
              </tr>
          </table>



          <!--Patient Details-->
          <table class="Patient_Details_table">
              <tr>
                  <td ><b style="font-size:18px" >Patient Details</b></td>
              </tr>
              <tr>
                  <td style="width:50%">Patient ID: {{Session::get('pId')}}</td>
                  <td style="width:50%" > NID: {{Session::get('nid')}}</td>
              </tr>
              <tr>
                  <td >Name: {{Session::get('pName')}}</td>
                  <td >NID Type: {{Session::get('nidType')}}</td>
              </tr>
              <tr>
                  <td >Gender: {{Session::get('pGender')}}</td>
                  <td >Appointment date: {{Session::get('apDate')}}</td>
              </tr>
              <tr>
                  <td >Phone: {{Session::get('cellNum')}}</td>
                  <td>Appointment time: {{Session::get('apTime')}}</td>
              </tr>
              <tr>
                  <td><p></p></td>
                  <td><p></p></td>
              </tr>
              <tr>
                  <td >Serial No: {{Session::get('token')}}</td>
              </tr>
          </table> <!--Patient Details end-->


          <!--doctor_table start-->
          <table id="doctor_table">
              <tr >
                  <th class="th">#</th>
                  <th class="th">Doctor name</th>
                  <th class="th">Fee</th>
                  <th class="th">Discount</th>
                  <th class="th">Payable amount</th>
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
              <tr>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
              </tr>
          </table><!--doctor_table end-->



          <!--note_table start-->
          <table class="note_table" >
              <tr>
                  <td rowspan="2"><b style="font-size:18px" class="note"> Note :</b></td>
                  <td class="note_table_text">Received</td>
                  <td class="note_table_text">$100</td>
              </tr>
              <tr>
                  <td class="note_table_text">Change</td>
                  <td class="note_table_text">$80</td>
              </tr>
          </table> <!--note_table end-->

          <table class="footer">
              <tr>
                  <td style="font-size:15px;">Phone:</td>
                  <td style="font-size:15px;">Email:</td>
              </tr>
          </table>
          
          <table class="m_invoice">
              <tr>
                  <td>THANK YOU</td>
              </tr>
          </table>


      </td> <!--1st invoice main td end--> 



      <!--1st invoice end-->








      <!--2nd invoice start-->
      <td style="width:50%;padding-left: 20px";> <br>  <!--2nd invoice main td start-->

          <!--hospital address start-->

          <h2 class="Hospital_name">MAYNAMATI CANTONMENT GENERAL HOSPITAL (MCGH)</h2>

          <table>
              <tr>
                  <td style="width:25%; ">Near Comilla Cantonment Comilla - Sylhet Road,</td>
                  <td style="width:25%;" > RC: {{Session::get('randomCode')}}</td>
              </tr>
              <tr>
                  <td >Tiprabazar, Maynamati, Comilla 3500</td>
                  <td style="width:25%; " > Receptionist: {{Session::get('R_NAME')}} ({{Session::get('rId')}})</td>
              </tr>
              <tr>
                  <td >Bangladesh</td>
                  <td >Date:  {{Session::get('DATE_TODAY')}}</td>
              </tr>
          </table><!--hospital address end-->




          <table class="m_invoice">
              <tr>
                  <td>MEDICAL INVOICE (Doctor Copy)</td>
              </tr>
          </table>



          <!--patient table start-->
          <table class="Patient_Details_table">
              <tr>
                  <td ><b style="font-size:18px" >Patient Details</b></td>
              </tr>
              <tr>
                  <td style="width:50%">Patient ID: {{Session::get('pId')}}</td>
                  <td style="width:50%" > NID: {{Session::get('nid')}}</td>
              </tr>
              <tr>
                  <td >Name: {{Session::get('pName')}}</td>
                  <td >NID Type: {{Session::get('nidType')}}</td>
              </tr>
              <tr>
                  <td >Gender: {{Session::get('pGender')}}</td>
                  <td >Appointment date: {{Session::get('apDate')}}</td>
              </tr>
              <tr>
                  <td >Phone: {{Session::get('cellNum')}}</td>
                  <td>Appointment time: {{Session::get('apTime')}}</td>
              </tr>
              <tr>
                  <td><p></p></td>
                  <td><p></p></td>
              </tr>
              <tr>
                  <td >Serial No: {{Session::get('token')}}</td>
              </tr>
          </table><!--patient table end-->





          <!--doctor table start-->
          <table id="doctor_table">
              <tr>
                  <th class="th">#</th>
                  <th class="th">Doctor name</th>
                  <th class="th">Fee</th>
                  <th class="th">Discount</th>
                  <th class="th">Payable amount</th>
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
              <tr>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
              </tr>
          </table> <!--doctor table end-->



          <!--note table start-->
          <table class="note_table" >
              <tr>
                  <td rowspan="2"><b style="font-size:18px" class="note"> Note :</b></td>
                  <td class="note_table_text">Received</td>
                  <td class="note_table_text">$100</td>
              </tr>
              <tr>
                  <td class="note_table_text">Change</td>
                  <td class="note_table_text">$80</td>
              </tr>
          </table><!--note table end-->

          <table class="footer">
              <tr>
                  <td style="font-size:15px;">Phone:</td>
                  <td style="font-size:15px;">Email:</td>
              </tr>
          </table>

          <table class="m_invoice">
              <tr>
                  <td>THANK YOU</td>
              </tr>
          </table>

      </td><!--2nd invoice main td end-->

    </tr> <!--main tr start-->

  </table> <!--main table end-->
















  <span class="page_break"></span>















  <!--2nd page-->
  <table style="width:100%">    <!--main table start-->

    <tr> <!--main tr start-->

      <!--3rd invoice start--> 

      <!--hospital address start-->

      <td style="width:50%;padding-right: 20px;">  <br>  <!--3rd invoice main td start--> 

          <h2 class="Hospital_name">MAYNAMATI CANTONMENT GENERAL HOSPITAL (MCGH)</h2>

          <table >
              <tr >
                  <td style="width:25%; ">Near Comilla Cantonment Comilla - Sylhet Road,</td>
                  <td style="width:25%; " >RC: {{Session::get('randomCode')}}</td>
              </tr>
              <tr>
                  <td >Tiprabazar, Maynamati, Comilla 3500</td>
                  <td style="width:25%; " > Receptionist: {{Session::get('R_NAME')}} ({{Session::get('rId')}})</td>
              </tr>
              <tr>
                  <td >Bangladesh</td>
                  <td >Date:  {{Session::get('DATE_TODAY')}}</td>
              </tr>
          </table>

        <!--hospital address end-->
          <table class="m_invoice">
              <tr>
                  <td>MEDICAL INVOICE (Office Copy)</td>
              </tr>
          </table>



          <!--Patient Details-->
          <table class="Patient_Details_table">
              <tr>
                  <td ><b style="font-size:18px" >Patient Details</b></td>
              </tr>
              <tr>
                  <td style="width:50%">Patient ID: {{Session::get('pId')}}</td>
                  <td style="width:50%" > NID: {{Session::get('nid')}}</td>
              </tr>
              <tr>
                  <td >Name: {{Session::get('pName')}}</td>
                  <td >NID Type: {{Session::get('nidType')}}</td>
              </tr>
              <tr>
                  <td >Gender: {{Session::get('pGender')}}</td>
                  <td >Appointment date: {{Session::get('apDate')}}</td>
              </tr>
              <tr>
                  <td >Phone: {{Session::get('cellNum')}}</td>
                  <td>Appointment time: {{Session::get('apTime')}}</td>
              </tr>
              <tr>
                  <td><p></p></td>
                  <td><p></p></td>
              </tr>
              <tr>
                  <td >Serial No: {{Session::get('token')}}</td>
              </tr>
          </table> <!--Patient Details end-->


          <!--doctor_table start-->
          <table id="doctor_table">
              <tr >
                  <th class="th">#</th>
                  <th class="th">Doctor name</th>
                  <th class="th">Fee</th>
                  <th class="th">Discount</th>
                  <th class="th">Payable amount</th>
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
              <tr>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
                  <td><p></p></td>
              </tr>
          </table><!--doctor_table end-->



          <!--note_table start-->
          <table class="note_table" >
              <tr>
                  <td rowspan="2"><b style="font-size:18px" class="note"> Note :</b></td>
                  <td class="note_table_text">Received</td>
                  <td class="note_table_text">$100</td>
              </tr>
              <tr>
                  <td class="note_table_text">Change</td>
                  <td class="note_table_text">$80</td>
              </tr>
          </table> <!--note_table end-->

          <table class="footer">
              <tr>
                  <td style="font-size:15px;">Phone:</td>
                  <td style="font-size:15px;">Email:</td>
              </tr>
          </table>

          <table class="m_invoice">
              <tr>
                  <td>THANK YOU</td>
              </tr>
          </table>

      </td> <!--3rd invoice main td end--> 



        <!--3rd invoice end-->








      <!--invisible invoice start-->
      <td style="width:50%"; class="invisible"> <br>  <!--invisible invoice main td start-->

          <!--hospital address start-->

          <h2 class="Hospital_name">MAYNAMATI CANTOMENT GENERAL HOSPITAL</h2>

          <table>
              <tr>
                  <td style="width:25%; ">Near Comilla Cantonment Comilla - Sylhet Road,</td>
                  <td style="width:25%;" > RC:</td>
              </tr>
              <tr>
                  <td >Tiprabazar, Maynamati, Comilla 3500</td>
              </tr>
              <tr>
                  <td >Bangladesh</td>
                  <td >Date:</td>
              </tr>
          </table><!--hospital address end-->




          <table class="m_invoice">
              <tr>
                  <td>MEDICAL INVOICE</td>
              </tr>
          </table>



          <!--patient table start-->
          <table class="Patient_Details_table">
              <tr>
                  <td ><b style="font-size:25px" >Patient Details</b></td>
              </tr>
              <tr>
                  <td style="width:50%">Patient ID:</td>
                  <td style="width:50%" > NID:</td>
              </tr>
              <tr>
                  <td >Name:</td>
                  <td >NID Type:</td>
              </tr>
              <tr>
                  <td >Gender:</td>
                  <td >Appointment date:</td>
              </tr>
              <tr>
                  <td >Phone :</td>
                  <td>Appointment time:</td>
              </tr>
          </table><!--patient table end-->





          <!--doctor table start-->
          <table id="doctor_table">
              <tr>
                  <th>#</th>
                  <th>Doctor name</th>
                  <th>Fee</th>
                  <th>Discount</th>
                  <th>Payable amount</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
          </table> <!--doctor table end-->



          <!--note table start-->
          <table class="note_table" >
              <tr>
                  <td rowspan="2"><h2> Note :</h2></td>
                  <td class="note_table_text">Tax:</td>
                  <td class="note_table_text">$100</td>
              </tr>
              <tr>
                  <td class="note_table_text">Total</td>
                  <td class="note_table_text">$80</td>
              </tr>
          </table><!--note table end-->


          <table class="m_invoice">
              <tr>
                  <td>THANK YOU</td>
              </tr>
          </table>

      </td><!--invisible invoice main td end-->

    </tr> <!--main tr start-->

  </table> <!--main table end-->






</body>
</html>