<?php
session_start();
include("includes/db.php"); 
include("functions/functions.php");
?>


<html>
<head>
	<title>World of Collectors</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
	<link rel="stylesheet" type="text/css" href="styles/style.css" media='all'>
	<link rel="stylesheet"  href="font/css/font-awesome.min.css">
</head>
<!--Header Start-->
	
	<!--Header Ends-->
	<!--Navigation Bar Start-->
		<header>
	<!--Navigation Bar Start-->
		<!--LOGO HEADER -->
			<a href="../index.php" style="font-family: 'Roboto Slab', serif;"><h1>World<span>Of</span><span style="color:#39ca74">Collectors</span></h1></a>
		<!--LOGO ENDS-->
				<nav>
					<ul id="menu">
					<li class="extra"><div id="search">
								<form  method="get" action="results.php" enctype="multipart/form-data" style="display:inline;">
									<input type="text" name="user_query" placeholder="Search Product" id="search-box">
									<input type="submit" name="search" value="Go" id="search-btn">
								</form>	
					</li>
						<li><a id="linkref" href="../index.php">Home</a></li>
						
						<div class="dropdown">
					<span><li><a id="linkref" href="categories.php">Categories</a></li></span>
					<div class="dropdown-content">
					<a href="index.php?cat=1">Cars</a>
                    <a href="index.php?cat=2">Currency</a>
                    <a href="index.php?cat=3">Comics</a>
                    <a href="index.php?cat=4">Stamps</a>
                    <a href="index.php?cat=5">Toys</a>
                    <a href="index.php?cat=6">Books</a>
					</div>
					</div>
					<li><a id="linkref" href="my_account.php">My Account</a></li>

					</ul>
				
			
				</nav>
		</header>
			
	</div>
	<body>
	<!--Navigation Bar Ends-->
	<!--Side Bar Start-->
	<div class="content_wrapper">
	<div class="headline">
						<div class="headline_content">
							<?php 
								if(isset($_SESSION['customer_email'])){
									echo "<b>Welcome:". "</b>"."<b style='color:yellow;'>".$_SESSION['customer_email']."</b>";
									}
									?>
									<?php 
										if(!isset($_SESSION['customer_email'])){
											echo "<a href='checkout.php' style='color: #F93;'>Login</a>";
											}
										else{
												echo "<a href='logout.php' style='color: #F93;'>Logout</a>";
											}
									?>
						
						</div>
					</div>
			<div class="manage">
				<div class="sidebar_title">
						<i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>
					Manage Account 
				</div>
				<ul id="cats">
					<?php
					if(isset($_SESSION['customer_email'])){
						$customer_session = $_SESSION['customer_email'];


					$get_customer_pic = "select * from customers where customer_email='$customer_session'";


					$run_customer = mysqli_query($con,$get_customer_pic);


					$row_customer = mysqli_fetch_array($run_customer);

					$customer_pic = $row_customer['customer_image'];

					echo "<img src='customer_photos/$customer_pic' width='100%' height='150'>";
			
					}
					else
					{

						}

						?>
				<!--Categories from categories database-->
						<li>
							<a href="my_account.php?my_orders"><span class="fa fa-shopping-cart fa-lg" ></span>
							 My Orders</a>
						</li>
						<li>
							<a href="my_account.php?edit_account"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Account</a>
						</li>
						<li>
							<a href="my_account.php?change_pass"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
						</li>
						<li>
							<a href="my_account.php?delete_account"> 
							<i class="fa fa-trash-o" aria-hidden="true"></i> Delete Account</a>
						</li>
						<li>
							<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
						</li>

						</ul>
			</div>
		<!--SideBar Ends-->
		<!-- Display Area -->
			<div class="right_content">
				<?php cart();
					?><!--Calling Cart Function-->
					
				
				<div class="account">

					<h2 style="background: #000; color:#FC9; padding: 10px; text-align: center; border-top: 2px solid #FFF;">
						Manage Your Account Here
					</h2>
						<?php
							getDefault();
						?>
							<?php
								if(isset($_GET['my_orders']))
								{
									include("my_orders.php");
								}
								if(isset($_GET['edit_account']))
								{
									include("edit_account.php");
								}
								if(isset($_GET['change_pass']))
								{
									include("change_pass.php");
								}
								if(isset($_GET['delete_account']))
								{
									include("delete_account.php");
								}
							?>
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
<!-- Footer Ends -->

</html>