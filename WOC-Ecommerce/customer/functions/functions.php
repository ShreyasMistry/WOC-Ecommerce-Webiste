<?php
//----Establishing Connection--localhost-username-password-table--//
$db = mysqli_connect("localhost","root","","woc");

global $db;
//Products from database to display---//
function getPro(){
		global $db;

		if(!isset($_GET['cat'])){

				$get_products = "select * from products order by rand() LIMIT 0,6";
				$run_products = mysqli_query($db, $get_products);
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
			}


//Product from Database Ends

}
function getDetails(){
	if(isset($_GET['pro_id']))
				{

					$product_id = $_GET['pro_id'];

					$get_products = "select * from products where product_id='$product_id'";
				
					$run_products = mysqli_query($db, $get_products);
				
					while($row_products=mysqli_fetch_array($run_products))
					{	
						$pro_id = $row_products['product_id'];
						$pro_title = $row_products['product_title'];
						$pro_cat = $row_products['cat_id'];
						$pro_desc = $row_products['product_desc'];
						$pro_price = $row_products['product_price'];
						$pro_image1 = $row_products['product_img1'];
						$pro_image2 = $row_products['product_img2'];
						$pro_image3 = $row_products['product_img3'];

					echo "
					<div id='single_product'>
					<h2>$pro_title</h2>
					<img src='admin_area/product_images/$pro_image1' width='250' height='150'> 
					<img src='admin_area/product_images/$pro_image2' width='250' height='250'>
					<img src='admin_area/product_images/$pro_image3' width='250' height='250'>
					</br>

					<p><b>Price: $ $pro_price </b></p>

					<p>$pro_desc<p>

					<a href='index.php' style='float:left;'>Go back</a>

					<a href='index.php?add_cart=$pro_id'><button style='float:rigth;'>Add to Cart</button></a>

					</div>
					";

				}
			}
}
//Getting Products from Single Categories Only//
function getCatPro(){
		global $db;

		if(isset($_GET['cat'])){

				$cat_id = $_GET['cat'];
				//Command to Get single products//
				
				$get_cat_pro = "select * from products where cat_id=$cat_id";
				
				$run_cat_pro = mysqli_query($db, $get_cat_pro);
				//If no product is found in category//
				$count = mysqli_num_rows($run_cat_pro);

				if($count==0)
				{
					echo"<h2>No Products found in this categories<h2>";
				}
				while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
				{
					$pro_id = $row_cat_pro['product_id'];
					$pro_title = $row_cat_pro['product_title'];
					$pro_cat = $row_cat_pro['cat_id'];
					$pro_desc = $row_cat_pro['product_desc'];
					$pro_price = $row_cat_pro['product_price'];
					$pro_image = $row_cat_pro['product_img1'];

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
			}


//Product from Database Ends

}
//Categories from Database
function getCats()
{
			global $db;
			$get_cats = "select * from categories";
			$run_cats=mysqli_query($db, $get_cats);
			while ($row_cats=mysqli_fetch_array($run_cats))
			{
				$cat_id=$row_cats['cat_id'];
				$cat_title=$row_cats['cat_title'];
				echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
			}
				
			
}
//Categories from Database Ends
//----FUNCTION FOR GETTING USER IP---//
function get_client_ip_env() {
    $ip = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ip = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ip = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ip = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ip = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ip = getenv('REMOTE_ADDR');
    else
        $ip = 'UNKNOWN';
 
    return $ip;
}
//Script for cart
function cart(){
	

	if(isset($_GET['add_cart']))
	{
		
		
		global $db;

		
		$p_id = $_GET['add_cart'];
		//No double selecting the same item
		$ip_add = get_client_ip_env();

		$check_pro = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		
		$run_check = mysqli_query($db,$check_pro);


		if(mysqli_num_rows($run_check)>0)
		{
			echo "";
		}
		
		else{
			
				$q = "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";

				$run_q = mysqli_query($db,$q);

				echo "<script>window.open('index.php','_self')</script>";

				
			}

		}	
	}
//Getting the number of items from the cart
function items(){
	if(isset($_GET['add_cart']))
	{
		global $db;	

		$ip_add = get_client_ip_env();

		$get_items = "select * from cart where ip_add='$ip_add'";

		$run_items = mysqli_query($db, $get_items);

		$count_items = mysqli_num_rows($run_items);


	}
	else{

		$ip_add = get_client_ip_env();

		global $db;

		$get_items = "select * from cart where ip_add='$ip_add'";

		$run_items = mysqli_query($db,$get_items);

		$count_items = mysqli_num_rows($run_items);
	}

	echo $count_items;
}
// Getting the total price of the items from the cart
function total_price()
{

	$ip_add = get_client_ip_env();

	global $db;

	$total = 0;

	$sel_price = "select * from cart where ip_add='$ip_add'";

	$run_price = mysqli_query($db, $sel_price);

	while ($record = mysqli_fetch_array($run_price)){

	$pro_id = $record['p_id'];

	$pro_price = "select * from products where product_id='$pro_id'";

	$run_pro_price = mysqli_query($db, $pro_price);

	while($p_price = mysqli_fetch_array($run_pro_price)){

		$product_price = array($p_price['product_price']);

		$values = array_sum($product_price);

		$total +=$values;
	}

	}
	echo "$".$total;
}
//Getting the defaults for customer

function getDefault(){

	global $db;

	$c = $_SESSION['customer_email'];

	$get_c= "select * from customers where customer_email='$c'";

	$run_c = mysqli_query($db, $get_c);

	$row_c=mysqli_fetch_array($run_c);

		$customer_id = $row_c['customer_id'];

		if(!isset($_GET['my_orders'])){
			if(!isset($_GET['edit_account'])){
				if(!isset($_GET['change_pass'])){
					if(!isset($_GET['delete_account'])){

						$get_orders="select * from customer_orders where customer_id='$customer_id' AND order_status='pending'";
						$run_orders= mysqli_query($db,$get_orders);

						$count_orders = mysqli_num_rows($run_orders);

						if($count_orders>0){
							echo" <div style='width:100% bac'>
							<h2> You have ($count_orders) Pending orders</h2><br>
							<h3>Please see your orders details by clicking this <a href='my_account.php?my_orders'>Link</a><br>Or You can <a href='pay_offline.php'>Pay Offline</a></h3>
							</div>";
						}
						else{
							echo" <div style='width:100%;'>
							<h2> You have no Pending orders</h2><br>
							<h3>You can see your orders history by clicking this <a href='my_account.php?my_orders'>Link</a><br></h3>
							</div>";
						}
				}
			}
		}


	}


}
?>