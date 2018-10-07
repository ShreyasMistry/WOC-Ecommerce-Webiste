<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<style type="text/css">
		th,tr{border: 3px groove #333;}
	</style>
</head>
<body>
		<div class="table-title"> 
		<h3> View All Customers</h3>
	</div>
	<table class="table-fill">
			<tr align="center">
				<th class="text-left">S.N</th>
				<th class="text-left">Name</th>
				<th class="text-left">EMail</th>
				<th class="text-left">Image</th>
				<th class="text-left">Country</th>
				<th class="text-left">Delete</th>
			</tr>
			<?php
			include("includes/db.php");

			$get_c = "select * from customers";
			$run_c = mysqli_query($con, $get_c);

			$i=0;

			while($row_c = mysqli_fetch_array($run_c)){

				$c_id = $row_c['customer_id'];
				$c_name = $row_c['customer_name'];
				$c_email = $row_c['customer_email'];
				$c_image = $row_c['customer_image'];
				$c_country= $row_c['customer_country'];
				$i++;


			?>
			<tr align="center">
				<td><?php echo $i; ?></td>
				<td><?php echo $c_name; ?></td>
				<td><?php echo $c_email; ?></td>
				<td><img src="../customer/customer_photos/<?php echo $c_image; ?>" width="60" heigth="60"/></td>
				<td><?php echo $c_country; ?></td>
				<td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</td>
			</tr>
			<?php
		}
			?>
		</table>
</body>
</html>