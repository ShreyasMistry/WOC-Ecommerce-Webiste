<?php

session_start();
if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}
	else{

?>
<html>
<head>
	<title></title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
	<link rel="stylesheet" href="styles/style.css" media="all" />
	<link rel="stylesheet"  href="font/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
		<img src="images/admin.png" width="45" height="45">
			<div class="logo">
				<a href="index.php">Admin<span>Panel</span></a>
			</div>
			<div class="logout"> 
					<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
			</div>
	</div>
<div class="container">
	
	
	<div class="sidebar">
	<ul id="nav">
		<li><a class="selected" href="index.php?insert_product"><i class="fa fa-plus" aria-hidden="true"></i>  Insert New Product</a></li>
		<li><a href="index.php?view_products"><i class="fa fa-globe" aria-hidden="true"></i> View all Products</a></li>
		<li><a href="index.php?insert_cat"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Insert Categories</a></li>
		<li><a href="index.php?view_cats"><i class="fa fa-eye" aria-hidden="true"></i> View all Categories</a></li>
		<li><a href="index.php?view_customers"><i class="fa fa-users" aria-hidden="true"></i> View Customers</a></li>
		<li><a href="index.php?view_orders"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> View Orders</a></li>
		<li><a href="index.php?view_payments"><i class="fa fa-money" aria-hidden="true"></i> View Payments</a></li>
	</div>
	<div class="content">
	<h2 style="color:red; text-align: center;"><?php echo @$_GET['logged_in']; ?></h2>
	<?php
		include("includes/db.php");

		if(isset($_GET['insert_product'])){
			include("insert_product.php");
		}

		if(isset($_GET['view_products'])){
			include("view_products.php");
		}
		if(isset($_GET['edit_pro'])){
			include("edit_pro.php");
		}
		if(isset($_GET['view_cats'])){
			include("view_cats.php");
		}
		if(isset($_GET['edit_cat'])){
			include("edit_cat.php");
		}
		if(isset($_GET['insert_cat'])){
			include("insert_cat.php");
		}
		if(isset($_GET['view_customers'])){
			include("view_customers.php");
		}
		
		if(isset($_GET['view_payments'])){
			include("view_payments.php");
		}
		if(isset($_GET['view_orders'])){
			include("view_orders.php");
		}
	?>
	</div>
</div>

</body>
</html>
<?php }  ?>