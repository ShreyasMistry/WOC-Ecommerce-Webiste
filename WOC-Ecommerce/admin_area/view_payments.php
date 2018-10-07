<?php 
if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}
?>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
		<div class="table-title"> 
			<h3> View Payments</h3>
		</div>
		<table class="table-fill">
			<tr >
				<th>Payment No</th>
				<th>Ionvoice N</th>
				<th>Amount Paid</th>
				<th>Payment Method</th>
				<th>Ref No</th>
				<th>Code</th>
				<th>Payment Date</th>
			</tr>
			<?php
			include("includes/db.php");

			$get_payments = "select * from payments";
			
			$run_payments = mysqli_query($con, $get_payments);

			$i=0;

			while($row_payments = mysqli_fetch_array($run_payments)){

				$payment_id = $row_payments['payment_id'];
				$invoice = $row_payments['invoice_no'];
				$amount = $row_payments['amount'];
				$payment_m = $row_payments['payment_mode'];
				$ref_no= $row_payments['ref_no'];
				$code = $row_payments['code'];
				$date = $row_payments['payment_date'];

				$i++;


			?>
			<tr >
				<td><?php echo $i; ?></td>
				
				<td class="text-left"><?php echo $invoice; ?></td>
				<td class="text-left"><?php echo $amount; ?></td>
				<td class="text-left"><?php echo $payment_m; ?></td>
				<td class="text-left"><?php echo $ref_no; ?></td>
				<td class="text-left"><?php echo $code; ?></td>
				<td class="text-left"><?php echo $date; ?></td>
				<td><?php 
						
				 ?></td>
				
			</tr>
			<?php
		}
			?>
		</table>
</body>
</html>
