<?php
 include("includes/db.php");

 if(isset($_GET['edit_cat'])){

 	$cat_id = $_GET['edit_cat'];

 	$edit_cat = "select * from categories where cat_id='$cat_id'";

 	$run_edit = mysqli_query($con,$edit_cat);

 	$row_edit = mysqli_fetch_array($run_edit);
 	
 	$cat_edit_id = $row_edit['cat_id'];

 	$cat_title = $row_edit['cat_title'];

 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		form{margin:15%;}
 	</style>
 </head>
 <body>

		<form action="" method="post">
            	<b>Edit Category</b>
            	<input type="text" name="cat_title1" value="<?php echo $cat_title; ?>" />
            	<input type="submit" name="update_cat" value="Update Category" />
         </form>

 
 </body>
 </html>
 <?php
 		if(isset($_POST['update_cat'])){

 			$cat_title123 = $_POST['cat_title1'];

 			$update_cat = "update categories set cat_title='$cat_title123' where cat_id='$cat_edit_id'";

 			$run_update = mysqli_query($con, $update_cat);

 			if($update_cat){

 				echo "<script>alert('Category has been Updated')</script>";
 				echo "<script>window.open('index.php?view_cats','_self')</script>";
 			}

 		}
 	?>