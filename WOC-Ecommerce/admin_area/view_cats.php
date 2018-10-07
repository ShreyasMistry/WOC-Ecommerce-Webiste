<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
tr,th {border:3px groove #000;}
</style>
</head>
<body>
<div class="table-title"> 
		<h3> View All Categories</h3>
	</div>
<table class="table-fill">
	<tr>
		<th class="text-left">Category ID</th>
		<th class="text-left">Category Title</th>
		<th class="text-left">Edit</th>
		<th class="text-left">Delete</th>
	</tr>
	<?php

	include("includes/db.php");

	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];

		$cat_title = $row_cats['cat_title'];

	
	?>
	<tr>
		<td class="text-left"><?php echo $cat_id; ?></td>
		<td class="text-left"><?php echo $cat_title; ?></td>
		<td class="text-left"><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
		<td class="text-left"><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>