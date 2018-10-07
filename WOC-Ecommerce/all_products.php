<?php

include("includes/db.php"); 
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>World of Collectors</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media='all'>
</head>
<body>
<div class="main_wrapper">
<!--Header Start-->
	<div class="header_wrapper">
	
	</div>
	<!--Header Ends-->
	<!--Navigation Bar Start-->
	<div id="navbar">
		<!--LOGO HEADER -->
		<a href="index.php"><img  src="images/logo.png" style="float:left;" width="50" height="50"></a>
		<!--LOGO ENDS-->
			<ul id="menu">

					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">All Products</a></li>
					<li><a href="my_account.php">My Account</a></li>
					<li><a href="categories.php">Categories</a></li>
					<li><a href="buysell.php">Buy/Sell</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact Us</a></li>

			</ul>
	<div id="form">
			<form method="get" action="result" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search Product">
				<input type="submit" name="search" value="Search">
	</div>
	</div>
	<!--Navigation Bar Ends-->
	<!--Side Bar Start-->
	<div class="content_wrapper">
			<div id="left_sidebar">
			<div id="sidebar_title">Categories</div>
			<ul id="cats">
			<!--Categories from categories database-->
			<?php
			getCats();
			?>

			</ul>
			<div id="sidebar_title">Follow Us On</div>
			<ul id="cats">
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Twitter</a></li>
				<li><a href="#">Google</a></li>
			</ul>
			</div>
		<!--SideBar Ends-->
		<!-- Display Area -->
			<div id="right_content">
				<div id="headline">
					<div id="headline_content">
						<b>Welcome Guest</b>
						<b style="color:yellow;">Shopping Cart</b>
						<span>- Items: - Price:</span>
					</div>
				</div>
				<div id="product_box">
				<?php 
				$get_products = "select * from products ";
				$run_products = mysqli_query($con, $get_products);
				while($row_products=mysqli_fetch_array($run_products))
				{
					$pro_id = $row_products['product_id'];
					$pro_title = $row_products['product_title'];
					$pro_cat = $row_products['cat_id'];
					$pro_desc = $row_products['product_desc'];
					$pro_price = $row_products['product_price'];
					$pro_image = $row_products['product_img1'];

					echo "
					<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'> </br>
					<p><b>Price: $ $pro_price </b></p>

					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>

					<a href='index.php?add_cart=$pro_id'><button style='float:rigth;'>Add to Cart</button></a>

					</div>
					";

				}
				?>
			</div>
		<!-- Display Area Ends -->
	</div>
	<!-- Footer Area -->
<div class="footer">
	<h1 style="color:#000; padding-top:30px;text-align: center">&copy; 2017- By AIIT <h1>
</div>
</div>
<!-- Footer Ends -->
</body>
</html>