<html>
<head>
	<title></title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">

</head>
<body>
<?php
if(isset($_GET['view_products'])){

?>	
	<div class="table-title"> 
		<h3> View All Products</h3>
	</div>
	<table class="table-fill">
		<tr>
			<th class="text-left">Product No</th>
			<th class="text-left">Title</th>
			<th class="text-left">Image</th>
			<th class="text-left">Price</th>
			<th class="text-left">Total Sold</th>
			<th class="text-left">Status</th>
			<th class="text-left">Edit</th>
			<th class="text-left">Delete</th>
		</tr>
		<?php
			
			include("includes/db.php");

			$i=0;



			$get_pro = "select * from products";

			$run_pro = mysqli_query($con, $get_pro);

			while($row_pro = mysqli_fetch_array($run_pro)){

				$p_id = $row_pro['product_id'];
				$p_title = $row_pro['product_title'];
				$p_img = $row_pro['product_img1'];
				$p_price = $row_pro['product_price'];
				$status = $row_pro['status'];

				$i++;
		
		?>
		<tr >
			<td class="text-left"><?php echo $i; ?></td>
			<td class="text-left"><?php echo $p_title; ?></td>
			<td class="text-left"><img src="product_images/<?php echo $p_img; ?>" width="50" height="50"></td>
			<td class="text-left"><?php echo $p_price; ?></td>
			<td class="text-left"><?php $get_sold = "select * from pending_orders where product_id='$p_id'";
				$run_sold = mysqli_query($con, $get_sold);

				$count = mysqli_num_rows($run_sold);

				echo $count;
				?></td>
			<td class="text-left"><?php echo $status ?></td>
			<td class="text-center"><a href="index.php?edit_pro=<?php echo $p_id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
			<td class="text-center"><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
		</tr>
		<?php } 
		?>
		</table>
		<?php 
			} 
			?>
</body>
</html>