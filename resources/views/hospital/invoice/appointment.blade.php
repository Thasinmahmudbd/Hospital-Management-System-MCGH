<!DOCTYPE html>

<html>

  <head>

    <title> invoice</title>

  <!-- CSS -->

    <style>

      .invoice{
        height: 1754px;
        width: 1240px;
        font-family: Times New Roman;
      }
      .page_header{
        font-size:65px;
        color:  #04AA6D;
        padding-bottom:20px;
      }

      .logo{
        margin-top: 20px;
      }

      .m_invoice{
        width:100%;
        margin-top: 25px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
        font-size: 25px;
        padding: 10px;
      }

      .Patient_Details_table{
        margin-top: 50px;
        width:100%;
        font-size: 20px;
      }

      #doctor_table{
        border-collapse: collapse;
        width: 100%;
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
        width:100%;
        padding-left:20px;
      }

      .note_table_text{
        border: 1px solid black;
        text-align:center; 
        width: 10%;
      }

      .thank{
        width:100%;
        margin-top: 25px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
        font-size: 25px;
        padding: 10px;
      }

      .footer{
        width:100%;
        margin-top: 25px;
        font-size: 20px;
      }

      .page_break{
        page-break-after:always;
      }

    </style>

  </head>

  <body>

  <!-- Patient invoice -->

    <div class="invoice">

      <table style="width:100%">

        <tr>
          <td style="width:100%" class="page_header"><b>Mainamati Cantonment General Hospital</b> </td>  
        </tr>

      </table>

      <table style="width:70%">

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



  <!-- Page break -->

    <div class="page_break"></div>



  <!-- Patient invoice -->

    <div class="invoice">

      <table style="width:100%">

        <tr>
          <td style="width:100%" class="page_header"><b>Mainamati Cantonment General Hospital</b> </td>  
        </tr>

      </table>

      <table style="width:70%">

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

  </body>

</html>