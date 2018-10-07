<?php
session_start();
include("includes/db.php"); 
include("functions/functions.php");
?>
<style>
	input[type="number"] {
   padding: 10px 10px; line-height: 28px;
   border-top: 1px solid #2C3E50;
   border-bottom: 1px solid #2C3E50;
   border-right: 1px solid #2C3E50;
   border-left: 1px solid #2C3E50;
}
input[type="checkbox"] {
	padding: 10px 10px;

	}
	input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
   } 
    .checkout{
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
</style>

<html>
	<head>
		<meta charset="utf-8">
		<title>World of Collectors</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css" media='all'>
		<link rel="stylesheet"  href="font/css/font-awesome.min.css">
		
	</head>



		<header>
	<!--Navigation Bar Start-->
		<!--LOGO HEADER -->
			<a href="index.php"><h1>World<span>Of</span><span style="color:#39ca74">Collectors</span></h1></a>
		<!--LOGO ENDS-->
				<nav>
					<ul id="menu">
					<li><div id="search">
								<form  method="get" action="results.php" enctype="multipart/form-data" style="display:inline;">
									<input type="text" name="user_query" placeholder="Search Product" id="search-box">
									<input type="submit" name="search" value="Go" id="search-btn">
								</form>	
					</li>
						<li><a id="linkref" href="index.php">Home</a></li>
						
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
					<li><a id="linkref" href="customer/my_account.php">My Account</a></li>

					</ul>
				
			
				</nav>
		</header>
<body>
	<!--Navigation Bar Ends-->
	<!--Side Bar Start-->
		<div class="content_wrapper">
				<div id="right_content">
			<?php cart();
			?><!--Calling Cart Function-->
			
			 	<div class="headline">
			 		<div class="headline_content">
					<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome Guest!</b> <b style='color:yellow'>Shopping Cart </b>";
						}
						else{
							echo "<b>Welcome:"."<span style='color:skyblue'>".$_SESSION['customer_email']."</b>"."<b style='color:yellow'> Your Shopping Cart</b>";
						}
								?>
						
							<span>- Total Items: <?php items(); ?>-Total Price:<?php total_price(); ?>
							<a href="cart.php" style="color:#FF0">Go to cart</a> - <?php 
							if(!isset($_SESSION['customer_email'])){

						
						echo "<a href='checkout.php' style='color: #F93;'>Login</a>";
							}
						else{
						echo "<a href='logout.php' style='color: #F93;'>Logout</a>";
					}

						?></span>
					</div>
				</div>
				
				<div class="wrapper">
				<form action="cart.php" method="post" enctype="multipart/form-data">
				

				<div class="table-title">
				<h3 style="color: #22313F;">Cart</h3>
				</div>
				<table class="table-fill" >

					<tr>
						<th class="text-left"><b>Remove</th>
						<th class="text-left"><b>Product(s)</th>
						<th class="text-left"><b>Quantity </th>
						<th class="text-left"><b>Price</th>
					</tr>
<?php

	$ip_add = get_client_ip_env();


	$total = 0;

	$sel_price = "select * from cart where ip_add='$ip_add'";

	$run_price = mysqli_query($con,$sel_price);

	while ($record = mysqli_fetch_array($run_price)){

	$pro_id = $record['p_id'];

	$pro_price = "select * from products where product_id='$pro_id'";

	$run_pro_price = mysqli_query($con,$pro_price);

	while($p_price = mysqli_fetch_array($run_pro_price)){

		$product_price = array($p_price['product_price']);

		$product_title = $p_price['product_title'];
		
		$product_image = $p_price['product_img1'];

		$only_price = $p_price['product_price'];

		$values = array_sum($product_price);

		$total +=$values;

	

?>
					<tr>
						<td class="text-center"><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
						<td class="text-center"><?php echo $product_title ?><br><img src="admin_area/product_images/<?php echo $product_image; ?>" height="80" width="80" ></td>
						<td class="text-center"><input type="number" name="qty" min="1" max="4"></td>
<?php
							
							if(isset($_POST['update']))
							{
								$qty = $_POST['qty'];

								$insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";


								$run_qty = mysqli_query($con,$insert_qty);
								


								$total = $total*$qty;
												}
			?>
			<td class="text-center"><?php echo "Rs".$only_price; ?></td>
</tr>
				<?php } } ?>

				<tr>
					<th class="text-center">Sub Total:</th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<td class="text-center"><?php echo "Rs". $total; ?>

				<tr >
					<th class="text-center" ><input type="submit" name="update" value="Update Cart"></th>
					<th class="text-center"><input type="submit" name="continue" value="Continue Shopping"></th>
					<th class="text-center"><a href="checkout.php"><button class="checkout" ><a href="checkout.php"  style="text-decoration: none; color
					:#000;" >Checkout</a></button></th>
					<th class="text-center"></th>

				</tr>	
				</table>

				</form>
				<?php 
				function updatecart()
				{

					global $con;

				if(isset($_POST['update']))
				{
					foreach($_POST['remove'] as $remove_id)
					{
						$delete_products = "delete from cart where p_id='$remove_id'";
						$run_delete = mysqli_query($con,$delete_products);
						if($run_delete)
						{
							echo "<script>window.open('cart.php','_self')</script>";
						}
					}

					}
					if(isset($_POST['continue'])){

						echo "<script>window.open('index.php','_self')</script>";
				}
			}
			echo @$up_cart = updatecart();
?>
				
			</div>
		<!-- Display Area Ends -->
	</div>
</div>	
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