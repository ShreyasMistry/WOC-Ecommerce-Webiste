<!DOCTYPE html>
<html>
<head>
	<title>Payment Options</title>
</head>
<body>
<?php
include("includes/db.php"); 

?>

<div align="center" style="padding: 20px;">

<h2> Payment Options for you</h2>
<?php
$ip = get_client_ip_env();

$get_customer = "select * from customers where customer_ip='$ip'";

$run_customer = mysqli_query($con, $get_customer);

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id'];


?>

<b>Pay with</b>&nbsp;<a href="https://www.paypal.com/in/home"><img src="images/paypal.jpg" height="80" width="200"></a><b>Or<a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></b><br><br>
<br>

<b>If you selected "Pay Offline " option then please check your email or account for invoice number of your order</b>
</div>
</body>
</html>