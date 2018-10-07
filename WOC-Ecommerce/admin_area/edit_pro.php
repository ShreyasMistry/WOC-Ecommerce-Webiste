<?php

include("includes/db.php");
// gettting the specific product from table
if(isset($_GET['edit_pro'])){

	 $edit_id = $_GET['edit_pro'];

	 $get_edit = "select * from products where product_id ='$edit_id'";

	 $run_edit = mysqli_query($con, $get_edit);

	 $row_edit = mysqli_fetch_array($run_edit);

	 $update_id = $row_edit['product_id'];

	 $p_title = $row_edit['product_title'];

	 $cat_id = $row_edit['cat_id'];

	 

	 $p_image1 = $row_edit['product_img1'];
	 $p_image2 = $row_edit['product_img2'];
	 $p_image3 = $row_edit['product_img3'];

	 $p_price = $row_edit['product_price'];

	 $p_desc = $row_edit['product_desc'];

	 $p_keywords = $row_edit['product_keywords'];




	}
	// getting the product relevant category

	$get_cat = "select * from categories where cat_id = '$cat_id'";

	$run_cat = mysqli_query($con, $get_cat);

	$cat_row = mysqli_fetch_array($run_cat);

	$cat_edit_title = $cat_row['cat_title'];

 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#3498db">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="800" align="center" border='1' bgcolor="#ecf0f1">
			<tr>
				<td colspan="2" align="center">
					<h1>Update Or Edit Product:<h1>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Title</b></td>
				<td>	
				<input type="text" name="product_title" size="50" value="<?php echo $p_title; ?>" />
				</td>
			</tr>
			<
			<tr>
			<td align="right"><b>Product Category</b></td>
				<td>	
				<select name="product_cat">
				<option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>
				<?php

			$get_cats = "select * from categories";
			$run_cats=mysqli_query($con, $get_cats);
			while ($row_cats=mysqli_fetch_array($run_cats))
			{
				$cat_id=$row_cats['cat_id'];
				$cat_title=$row_cats['cat_title'];
				echo "<option value='$cat_id'>$cat_title >/option>";
			}
				
			?>
			</select>
				</td>
			</tr>
			<tr>
			<td align="right"><b>Product Image1</b></td>
				<td>	
				<input type="file" name="product_img1"/><br><img src="product_images/<?php echo $p_image1; ?>" width="80" height="80">
				</td>
			</tr>
			<tr>
			<td align="right"><b>Product Image2</b></td>
				<td>	
				<input type="file" name="product_img2"/>
				<br>
				<img src="product_images/<?php echo $p_image2; ?>" width="80" height="80">
				</td>
			</tr>
			<tr>
			<td align="right"><b>Product Image3</b></td>
				<td>	

				<input type="file" name="product_img3"/>
				<br>
				<img src="product_images/<?php echo $p_image3; ?>" width="80" height="80">
				</td>
			</tr>
			<tr>
			<td align="right"><b>Product Price</b></td>
				<td>	
				<input type="text" name="product_price" value="<?php echo $p_price; ?>">
				</td>
			</tr>
			<tr>
			<td align="right"><b>Product Description</b></td>
				<td>	
				<textarea name="product_desc" cols="35" row="10"><?php echo $p_desc; ?></textarea>
				</td>
			</tr>
			<tr><td align="right"><b>Product Keywords:</b></td>
				<td>	
				<input type="text" name="product_keywords" size="50" value="<?php echo $p_keywords; ?>">
				</td>
			</tr>
			<tr align="center">
				<td colspan="2">	
				<input type="submit" name="udpate_product" value="Update Product">
				</td>
			</tr>
		</table>
</form>
</body>
</html>
<?php


if(isset($_POST['udpate_product'])){
			//TEXT VARIABLES DATA
			$product_title = $_POST['product_title'];
			$product_cat=$_POST['product_cat'];
			$product_price= $_POST['product_price'];
			$product_desc= $_POST['product_desc'];
			$status = 'on';
			$product_keywords = $_POST['product_keywords'];
			
			//IMAGE NAMES
			$product_img1 = $_FILES['product_img1']['name'];
			$product_img2 = $_FILES['product_img2']['name'] ;
			$product_img3 = $_FILES['product_img3']['name'];

			//Image temp names
			$temp_name1 = $_FILES['product_img1']['tmp_name'];
			$temp_name2 = $_FILES['product_img2']['tmp_name'];
			$temp_name3= $_FILES['product_img3']['tmp_name'];
			
//uploading images to its folders
		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");


			$update_product = "update products set cat_id='$product_cat',date=NOW(),product_title='$product_title', product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price', product_desc='$product_desc',product_keywords='$product_keywords' where product_id ='$update_id'";

			$run_update= mysqli_query($con, $update_product);
			
			if($run_update){
				echo "<script>alert('Product updated succesfully')</script>";

				echo "<script>window.open('index.php?view_products','_self')</script>";
			}
}



?>
