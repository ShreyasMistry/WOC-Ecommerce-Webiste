<?php
@session_start();
include("includes/db.php"); 

if(isset($_GET['edit_account'])){


//Getting the customer ID
$customer_email = $_SESSION['customer_email'];

	$get_customer= "select * from customers where customer_email='$customer_email'";

	$run_customer = mysqli_query($db, $get_customer);

	$row=mysqli_fetch_array($run_customer);

	$id = $row['customer_id'];
	$name = $row['customer_name'];
	$email = $row['customer_email'];
	$pass = $row['customer_pass'];
	$country = $row['customer_country'];
	$city = $row['customer_city'];
	$contact = $row['customer_contact'];
	$address = $row['customer_address'];
	$image = $row['customer_image'];
}

?>
<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="600">
<tr>
	<td colspan="8" align="center"><h2>Update your account:</h2></td>
</tr>
<tr>
	<td align="right">Customer Name:</td>
	<td><input type="text" name="c_name" class="textbox" value="<?php echo $name; ?>"></td>
</tr>
<tr>
	<td align="right">Customer Email:</td>
	<td><input type="text" name="c_email"  class="textbox" value="<?php echo $email; ?>"></td>
</tr>
<tr>
	<td align="right">Customer Password:</td>
	<td><input type="Password" name="c_pass" class="textbox" value="<?php echo $pass; ?>"></td>
</tr>
<tr>
	<td align="right">Customer Country:</td>
	<td><select name="c_country" disabled> <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
	<option>Afghanistan</option>
	<option>Pakistan</option>
	<option>India</option>
	<option>USA</option>
	<option>China</option>
	</select>
</td>
</tr>
<tr>
	<td align="right">Customer City:</td>
	<td><input type="text" name="c_city" class="textbox" value="<?php echo $city; ?>"></td>
</tr>
<tr>
	<td align="right">Customer Phone no:</td>
	<td><input type="text" name="c_contact" class="textbox" value="<?php echo $contact; ?>"></td>
</tr>
<tr>
	<td align="right">Customer Address:</td>
	<td><input type="text" name="c_address" size="35" class="textbox" value="<?php echo $address; ?>"></td>
</tr>
<tr>
	<td align="right">Customer Image:</td>
	<td><input type="file" name="c_image" ><img src="customer_photos/<?php echo $image; ?>" width="60" height="60"></td>
</tr>
<tr>
	<td align="center" colspan="8"><input type="submit" name="update_account" value="Update Now"></td>
</tr>
</table>
</form>

<?php
	
	if(isset($_POST['update_account'])){

		$update_id = $id;

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];

		move_uploaded_file($c_image_tmp, "customer_photos/$c_image");

		$update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city', customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";

		$run_c = mysqli_query($con, $update_c);

		if($run_c)
		{
			echo "<script>alert('Your account has been updated!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";

		}
	}
?>