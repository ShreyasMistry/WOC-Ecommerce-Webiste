<?php
session_start();
include("includes/db.php"); 
include("functions/functions.php");
?>
<style >
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.register {
	font-family: "Roboto", sans-serif;
  width: 100%;
  padding: 3% 0 0;
  margin: auto;
  background-color: #4CAF50;
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
.form select{
	font-family: "Roboto", sans-serif;
	padding-bottom: 15px;
	padding-left:10px;
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

<html>
	
	<head>
		
		<meta charset="utf-8">
			
			<title>
				World of Collectors
			</title>
			<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">

			<link rel="stylesheet" type="text/css" href="styles/style.css" media='all'>
			<link rel="stylesheet"  href="font/css/font-awesome.min.css">
		
	</head>



	<header>
	<!--Navigation Bar Start-->
		<!--LOGO HEADER -->
			<a href="index.php">

				<h1>World<span>Of</span><span style="color:#39ca74">Collectors</span></h1>

			</a>
		<!--LOGO ENDS-->
				<nav>
					<ul id="menu">

					<li class="extra">
						<div id="search">
								<form  method="get" action="results.php" enctype="multipart/form-data" style="display:inline;">
									<input type="text" name="user_query" placeholder="Search Product" id="search-box">
									<input type="submit" name="search" value="Go" id="search-btn">
								</form>	
						</div>
					</li>
						<li>
							<a id="linkref" href="index.php">Home</a>
					</li>
						
					<div class="dropdown">

					<span>
						<li>
							<a id="linkref" href="categories.php">Categories<i class="fa fa-angle-double-down" aria-hidden="true"></i>
</a>
						</li>
					</span>
					
					<div class="dropdown-content">

						<a href="index.php?cat=1">Cars</a>
                    	<a href="index.php?cat=2">Currency</a>
                    	<a href="index.php?cat=3">Comics</a>
                    	<a href="index.php?cat=4">Stamps</a>
                    	<a href="index.php?cat=5">Toys</a>
                    	<a href="index.php?cat=6">Books</a>

					</div>

				</div>
				<li>
					
					<a id="linkref" href="customer/my_account.php">My Account</a>

				</li>

				</ul>
				
			
			</nav>
	</header>
	<!--Navigation Bar Ends-->
<body>
	
	<!--Email Login -->
		<div class="content_wrapper">

				<div id="right_content" style="background-color: #4CAF50">

					<?php 
						
						cart();

					?><!--Calling Cart Function-->
			
			 		<div class="headline">
			 			<div class="headline_content">
							<?php
								if(!isset($_SESSION['customer_email']))
									{
										echo "<b>Welcome Guest!</b> <b style='color:yellow'>Shopping Cart </b>";
									}
									else
										{
												echo "<b>Welcome:"."<span style='color:skyblue'>".$_SESSION['customer_email']."</b>"."<b style='color:yellow'> Your Shopping Cart</b>";
										}
							?>
						
							<span>- Total Items: 
									<?php items(); ?>-Total Price:<?php total_price(); ?>

										<a href="cart.php" style="color:#FF0">Go to cart</a> - 
										<?php 
											
											if(!isset($_SESSION['customer_email']))
												{
													echo "<a href='checkout.php' style='color: #F93;'>Login</a>";
												}
											else
												{
														echo "<a href='logout.php' style='color: #F93;'>Logout</a>";
												}

									?>
							</span>
						</div>
					</div>
					<div class="register">
					<div class="form">
			<form action="customer_register.php" method="post" enctype="multipart/form-data"/>
						<h2>Create an Account</h2>

						<input type="text" name="c_name" placeholder="Customer Name" required/>
						<input type="text" name="c_email" placeholder="Customer Email" required/>
						<input type="Password" name="c_pass" placeholder="Customer Password" required/>
					Customer Country
							<select name="c_country">
								<option>Select Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Iran</option>
								<option>UAE</option>
								<option>United Kingdom</option>
								<option>Japan</option>
								<option>United States</option>
							</select>
							<br>
						<input type="text" name="c_city" placeholder="City" required/>
						<input type="text" name="c_contact" placeholder="Mobile"  pattern=".{3,}"  required title="3 characters minimum" required/>
						<input type="text" name="c_address" placeholder="Address" required/>
						Customer Image
						<input type="file" name="c_image" required/>
							<button type="submit" name="register" value="Submit">Register</button>
					


				

				
				
			</div></form>
			</div>
		<!-- Display Area Ends -->

	</div>
	</div>
	</body>
	<!-- Footer Area -->
<div class="footer">
		<ul>
				<li> <a href="#">Home</a></li>
				|
				<li><a href="#">Blog</a></li>
				|
				<li><a href="#">Pricing</a></li>
				|
				<li><a href="#">About</a></li>
				|
				<li><a href="#">Faq</a></li>
				|
				<li><a href="#">Contact</a></li>

		<li>
			
			<a href="#">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span class="site">E-Mail</span>

			</a>

		</li>
		<li>
			<a href="http://facebook.com" title="My Facebook Page">
				<i class="fa fa-facebook-official" aria-hidden="true"></i>
				<span class="site">Facebook</span>
			</a>
		</li>
		<li>
			<a href="http://twitter.com" title="My Twitter Page">
				<i class="fa fa-twitter-square" aria-hidden="true"></i>
				<span class="site">Twitter</span>
			</a>
		</li>
	</ul>
</div>
</html>

<?php
	if(isset($_POST['register'])){
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];

		$c_ip = get_client_ip_env();

		$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

		$run_customer = mysqli_query ($con, $insert_customer);

		move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");

		$sel_cart = "select * from cart where ip_add='$c_ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart>0){

			$_SESSION['customer_email']=$c_email;

			echo "<script>alert('Account Created Successfull,Thank You!')</script>";

			echo "<script>window.open('checkout.php','_self')</script>";

		}
		else{
			
			$_SESSION['customer_email']=$c_email;

			echo "<script>alert('Account Created Successfull,Thank You!')</script>";
			echo "<script>window.open('index.php','_self')</script>";

		}



	}

?>