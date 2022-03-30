<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Release Slip Admission</title>
		<style>
			.invoice {
				height: 1754px;
				width: 1240px;
				margin-top: 0px;

				font-family: arial, sans-serif, helvetica;
			}

			.main {
				text-align: center;
				margin-top: 10px;
			}

			.header {
				background-color: #04aa6d;
				/*#bdbbb7*/
				font-size: 25px;
				text-align: center;
				padding: 5px;
				color: #fff;
			}

			.m_invoic {
				width: 100%;
				margin-top: 20px;
				text-align: center;
				background-color: #04aa6d;
				/*#bdbbb7*/
				color: #fff;
				font-weight: bold;
				font-size: 25px;
				padding: 5px;
			}

			.patient_details {
				border: 1px solid black;
				padding: 5px;
				font-size: 18px;
			}

			.OT_Expences {
				border: 1px solid black;
				padding: 5px;
				font-size: 18px;
			}

			.ot_incharge {
				border-top: 2px solid #000;
				font-size: 18px;
			}

			h2 {
				font-size: 20px;
			}

			.patient_id {
				font-weight: bold;
				font-size: 25px;
				padding: 5px;
			}

			table {
				border-collapse: collapse;
			}

			.gap {
				padding: 1rem;
			}
		</style>
	</head>

	<body class="invoice">
		<!--header start-->
		<table class="main" style="width: 100%">
			<div class="header">
				সেনাবাহিনীর তত্ত্বাবধানে পরিচালিত ,সর্ব-সাধারণের জন্য উন্মুক্ত
			</div>

			<tr>
				<td style="line-height: 1.5">
					<p style="font-size: 35px; margin: 0px">
						ময়নামতি ক্যান্টনমেন্ট জেনারেল হাসপাতাল
					</p>
					<p style="font-size: 28px; margin: 0px">
						MAYNAMATI CANTONMENT GENERAL HOSPITAL
					</p>
					<p style="font-size: 25px; margin: 0px">
						টিপরা বাজার,কুমিল্লা সেনানিবাস
					</p>
					<p
						style="
							font-size: 20px;
							background-color: #04aa6d;
							color: #fff;
						"
					>
						মোবাইল-০১৭৩০-০৮৭৯৩৯,মোবাইল-০১৭৩০-০৮৭৯৪৯ ,ফোন
						০৮১-৬০-৭,বর্ধিত-সামরিক ৩৫৩৬,বেসামরিক ৭২৭০৭
					</p>
				</td>
			</tr>
		</table>
		<!--header end-->

		<!--time_date start-->

		<table style="width: 100%; margin-top: 20px; font-size: 20px">
			<tr>
				<td rowspan="3" style="width: 70%"></td>
				<td style="width: 30%"></td>
			</tr>

			<tr>
				<td></td>
			</tr>
		</table>
		<!--time_date end-->

		<!--patient_details start-->

		<h2></h2>

		<table style="width: 100%; margin-top: 20px">
			<tr>
				<td class="" style="width: 50%; font-size:18px;">
                    <b> Admission Release Slip</b>
				</td>
				<td class="patient_details" style="width: 50%">
					Bed/cabin No: {{Session::get('bed_no')}}
				</td>
			</tr>
			<tr>
				<td class="patient_details">Name of Patient: {{Session::get('pName')}}</td>
				<td class="patient_details">Date of admission with time: {{Session::get('Admission_Date')}}</td>
			</tr>
			<tr>
				<td class="patient_details">Doctor's Name: {{Session::get('drName')}}</td>
				<td class="patient_details">Date of discharge with time: {{Session::get('Discharge_Date')}}</td>
			</tr>
		</table>
		<!--patient_details end-->

		<div class="gap"></div>

		<!--bed bill-->

		<h2>Bed Bill</h2>

		<table style="width: 100%">
			<tr>
				<th
					class="OT_Expences"
					style="width: 70%; text-align: left; font-weight: normal"
				>
					Ward Bill
				</th>
				<td
					class="OT_Expences"
					style="width: 30%; text-align: right"
				>{{Session::get('Ward_Bill')}}</td>
			</tr>
			<tr>
				<th
					class="OT_Expences"
					style="text-align: left; font-weight: normal"
				>
					Cabin Bill
				</th>
				<td class="OT_Expences" style="text-align: right">{{Session::get('Cabin_Bill')}}</td>
			</tr>
		</table>
		<!--bed bill end-->

		<div class="gap"></div>

		<!--maternity services start-->

		<h2>Maternity services</h2>

		<table style="width: 100%">
			<tr>
				<th
					class="OT_Expences"
					style="width: 70%; text-align: left; font-weight: normal"
				>
					Ligation
				</th>
				<td
					class="OT_Expences"
					style="width: 30%; text-align: right"
				>{{Session::get('Ligation_Bill')}}</td>
			</tr>
			<tr>
				<th
					class="OT_Expences"
					style="text-align: left; font-weight: normal"
				>
					3rd Seizure
				</th>
				<td class="OT_Expences" style="text-align: right">{{Session::get('Third_Seizure_Bill')}}</td>
			</tr>
		</table>
		<!--maternity services end-->

		<div class="gap"></div>

		<!--invigilator start-->

		<h2>Invigilator Charge</h2>

		<table style="width: 100%">
			<tr>
				<th class="OT_Expences" style="width: 5%">S/N</th>
				<th class="OT_Expences" style="width: 65%">Invigilator name</th>
				<th class="OT_Expences" style="width: 30%">Charges</th>
			</tr>

			<?php $serial = 1; ?>
            @foreach($invigilator as $list)
            <tr>
				<td class="OT_Expences" style="text-align: center"><?php echo $serial; $serial++; ?></td>
				<td class="OT_Expences">{{$list->Dr_Name}}</td>
				<td class="OT_Expences" style="text-align: right">{{$list->Visit_Charge}}</td>
			</tr>
            @endforeach

            <tr>
                <td ></td>
                <td style="text-align:right; font-weight:bold; padding-right:10px; font-size:18px;">Total</td>
                <td class= "OT_Expences" style="text-align:right;">{{Session::get('Visiting_Bill')}}</td>
            </tr>
		</table>

		<!--invigilator end-->

		<div class="gap"></div>

		<!--other service start-->

		<h2>Other Service</h2>

		<table style="width: 100%">
			<tr>
				<th class="OT_Expences" style="width: 5%">S/N</th>
				<th class="OT_Expences" style="width: 35%">Service</th>
				<th class="OT_Expences" style="width: 30%">Quantity</th>
				<th class="OT_Expences" style="width: 30%">Charges</th>
			</tr>

            <?php $serial = 1; ?>
            @foreach($others as $list)
			<tr>
				<td class="OT_Expences" style="text-align: center"><?php echo $serial; $serial++; ?></td>
				<td class="OT_Expences">{{$list->Others}}</td>
				<td class="OT_Expences" style="text-align: center">{{$list->Others_Use_Count}}</td>
				<td class="OT_Expences" style="text-align: right">{{$list->Others_Fee}}</td>
			</tr>
            @endforeach

			<tr>
				<td></td>
				<td></td>
				<td style="text-align:right; font-weight:bold; padding-right:10px; font-size:18px;">Total</td>
				<td class="OT_Expences" style="text-align:right;">{{Session::get('Other_Bill')}}</td>
			</tr>
		</table>

		<!--other service end-->

		<div class="gap"></div>

		<!--total bill Start-->

		<h2>Billing</h2>

		<table style="width: 100%">
            <tr>
				<th
					class="OT_Expences"
					style="width: 70%; text-align: left; font-weight: normal"
				>
					Total Bill
				</th>
				<td
					class="OT_Expences"
					style="width: 30%; text-align: right"
				>{{Session::get('Total_Bill')}}</td>
			</tr>
			<tr>
				<th
					class="OT_Expences"
					style="text-align: left; font-weight: normal"
				>
					Discount
				</th>
				<td class="OT_Expences" style="text-align: right">{{Session::get('Discount')}}</td>
			</tr>
            <tr>
				<th
					class="OT_Expences"
					style="width: 70%; text-align: left; font-weight: normal"
				>
					After Discount
				</th>
				<td
					class="OT_Expences"
					style="width: 30%; text-align: right"
				>{{Session::get('Estimate')}}</td>
			</tr>
			<tr>
				<th
					class="OT_Expences"
					style="text-align: left; font-weight: normal"
				>
					Received
				</th>
				<td class="OT_Expences" style="text-align: right">{{Session::get('Received')}}</td>
			</tr>
			<tr>
				<th
					class="OT_Expences"
					style="text-align: left; font-weight: normal"
				>
					Changes
				</th>
				<td class="OT_Expences" style="text-align: right">{{Session::get('Changes')}}</td>
			</tr>
		</table>
		<!--total bill end-->

		<div class="gap"></div>

		<table class="m_invoic">
			<tr>
				<td>ময়নামতি ক্যান্টনমেন্ট জেনারেল হাসপাতাল সেবায় অনন্য</td>
			</tr>
		</table>
	</body>
</html>
