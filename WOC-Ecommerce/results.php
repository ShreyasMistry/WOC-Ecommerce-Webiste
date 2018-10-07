<?php
session_start();
include("includes/db.php"); 
include("functions/functions.php");
?>
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
                    	<a href="index.php?cat=7">Cards</a>

					</div>

				</div>
				<li>
					
					<a id="linkref" href="customer/my_account.php">My Account</a>

				</li>

				</ul>
				
			
			</nav>
	</header>
	<!--Navigation Bar Ends-->
	<!--Side Bar Start-->
<body>
	<div class="content_wrapper">
		
		

			<div id="right_content">

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
				<div class="product_box">
				<!--Search Item Code-->

				<?php 
				

				
				if(isset($_GET['search']))
				{

					$user_keyword = $_GET['user_query'];

				$get_products = "select * from products where product_keywords like '%$user_keyword%'";
				$run_products = mysqli_query($con, $get_products);
				while ($row_products=mysqli_fetch_array($run_products))
				{
					$pro_id = $row_products['product_id'];
					$pro_title = $row_products['product_title'];
					$pro_cat = $row_products['cat_id'];
					$pro_desc = $row_products['product_desc'];
					$pro_price = $row_products['product_price'];
					$pro_image = $row_products['product_img1'];

					echo "
					<a href='details.php?pro_id=$pro_id'>
					<div class='single_product'>
					<img src='admin_area/product_images/$pro_image' width='180' height='180'> </br>
					<div class='container'>
					<h3 >$pro_title</h3></a>
					<p><b>Price:र $pro_price </b></p>

					
					<a href='index.php?add_cart=$pro_id'><button class='addtocart';>Add to Cart</button></a>

					</div>
					</div>
					";

				}	
				}
?>
			</div>
		<!-- Display Area Ends -->
	</div>
	</div>
	</div>
</body>

	<!-- Footer Area -->
<div class="footer">
		<ul>
				<li> <a href="index.php">Home</a></li>
				|
				<li><a href="about.php">About</a></li>
				|
				<li><a href="#">FAQ</a></li>
				|
				<li><a href="contact.php">Contact</a></li>

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
<!-- Footer Ends -->
</body>
</html>