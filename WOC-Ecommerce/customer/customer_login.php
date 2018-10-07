<?php
@session_start();
include("includes/db.php");

?>
<style >
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}

}
</style>

<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="email address"/>
      <a href="customer_register.php">New? Register Here<button>create</button></a>
    </form>
    <form class="login-form" action="checkout.php" method="post">
      <input type="text" placeholder="username" name="c_email"/>
      <input type="password" placeholder="password" name="c_pass"/>
      <button name="c_login" value="Login">login</button>
      <p class="message">Not registered? <a href="customer_register.php">Create an account</a></p>
    </form>
  </div>
</div>
<?php
if(isset($_GET['forgot_pass'])){

	echo " 
	<div align='center'>

		<b>Enter your email below, we wll send your passwrod to email </b><br>

		<form action='' method='post'>
		<input type ='text' name='c_email' placeholder='Enter your email' required/>
		<br>

		<input type='submit' name='forgot_pass' value='Send me Password' />
		</form>
	</div>
	";

	if(isset($_POST['forgot_pass'])){

		$c_email = $_POST['c_email'];

		$sel_c = "select * from customers where customer_email='$c_email' ";
		$run_c = mysqli_query($con,$sel_c);

		$check_c = mysqli_num_rows($run_c);

		$row_c = mysqli_fetch_array($run_c);

		$c_name = $row_c['customer_name'];

		$c_pass = $row_c['customer_pass'];

		if($check_c==0){

			echo "<script>alert('This email does not exist in our database,Sorry!')</script>";
			exit();
		}
		else
		{
			$headers ='From:admin@mysite.com';

			$subject = 'Your password';

			$message= "
			<html>

						<h3>Dear $c_name</h3>
						<p>You requested for you password at www.mysite.com</p>
						<b>Your Password is </b><span style='color:red'>$c_pass</span>

						<h3>Thank you using our website</h3>


			</html>
			";

			mail($c_email,$subject,$message,$headers);

			echo "<script>alert('Password was sent to your email, Please check your inbox!')<script>";

			echo "<script>window.open('checkout.php','_self')</script>";
		}

	}	
}
?>
	<h2 style="float: right;padding:10px;">
		
	</h2>
</div>
<?php

if(isset($_POST['c_login'])){

	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];

	$sel_customer = "select * from customers where customer_email='$customer_email' and customer_pass='$customer_pass'";
	$run_customer= mysqli_query($con, $sel_customer);

	$check_customer = mysqli_num_rows($run_customer);

	$get_ip = get_client_ip_env();
		
	$sel_cart = "select * from cart where ip_add='$get_ip'";

	$run_cart = mysqli_query($con, $sel_cart);

	$check_cart = mysqli_num_rows($run_cart);

	if($check_customer==0)
	{
		echo "<script>alert('Password or Email adress is not correct try again')</script>";
		exit();
	}
	if($check_customer==1 AND $check_cart==0){

		$_SESSION['customer_email'] = $customer_email;
		echo "<script>window.open('customer/customer/my_account.php','_self')</script>";

	}
	else{
		$_SESSION['customer_email'] = $customer_email;

		echo "<script>alert('You successfully logged in, you can order now!')</script>";
		include("payment_options.php");
	}

}

?>