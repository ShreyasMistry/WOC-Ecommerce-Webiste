<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">

		<div class="table-title"> 
			<h3> Insert Category</h3>
		</div>
		<div class="Insert">
			<input type="text" name="cat_title" size="40" class="textboxid">
			<button type="submit" name="insert_cat" class="button">
			<i class="fa fa-plus-circle" aria-hidden="true"></i> Insert </button>
		</div>

	</form>
	<?php

	include("includes/db.php");

	if(isset($_POST['insert_cat'])){

		$cat_title = $_POST['cat_title'];

		$insert_cat = "insert into categories (cat_title) values ('$cat_title')";

		$run_cat = mysqli_query($con, $insert_cat);

		if($run_cat){

			echo "<script>alert('New Category has been inserted')</script>";

			echo "<script>window.open('index.php?view_cats','_self')</script>";
			
		}
	}
	?>
</body>
</html>