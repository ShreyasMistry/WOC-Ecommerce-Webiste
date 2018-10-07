<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "woc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['firstname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['lastname']);
$contry = mysqli_real_escape_string($link, $_REQUEST['country']);
$sub = mysqli_real_escape_string($link, $_REQUEST['subject']);
 
// attempt insert query execution
$sql = "INSERT INTO contact (firstname, lastname, country, subject) VALUES ('$first_name', '$last_name','$contry','$sub')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.;
    <a href='index.php' style='float:left; color:red;'>Go back</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>