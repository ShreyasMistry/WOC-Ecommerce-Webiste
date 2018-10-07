<?php
session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body class="align">

  <div class="grid">

    <form  method="post" class="form login">

      <header class="login__header">
        <h3 class="login__title">Login</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="email" placeholder="Email" name="admin_email" required>
        </div>

        <div class="form__field">
          <input type="password" placeholder="Password" name="admin_pass" required>
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" value="Login" name="login">

        <p><span class="icon icon--info">?</span><a href="#">Forgot Password</a></p>
      </footer>

    </form>

  </div>
  <h2 style="color: black; text-align: center; padding: 20px"><?php echo @$_GET['logout']; ?></h2>

</body>
  
  
</body>
</html>
<?php

if(isset($_POST['login'])){

  $user_email = $_POST['admin_email'];
  $user_pass = $_POST['admin_pass'];

  $sel_admin = "select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";

  $run_admin = mysqli_query($con, $sel_admin);

  $check_admin = mysqli_num_rows($run_admin);

  if ($check_admin==1) {
    $_SESSION['admin_email']=$user_email;

    echo "<script>window.open('index.php?logged_in=You Successfully Logged In','_self')</script>";
  }
  else {
    echo "<script>alert('Admin Email or Password is incorrect,try again')</script>";
  }
}
?>