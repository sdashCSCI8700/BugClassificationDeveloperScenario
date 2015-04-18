<?php
session_start();
echo $_SESSION["username"];

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="bcs"; // Database name 
$tbl_name="developer"; // Table name 

// Connect to server and select databse.
$conn= mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect"); 
// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$myusername = mysqlI_real_escape_string($myusername);
//$mypassword = mysqlI_real_escape_string($mypassword);

$sql="SELECT name,password,dev_id FROM $tbl_name WHERE name='$myusername' and password='$mypassword'";
$result=$conn->query($sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

	while($row=mysqli_fetch_assoc($result)){
	$dev_id=$row['dev_id'];
	$name=$row['name'];
	$_SESSION["username"]=$name;
	$_SESSION["dev_id"]=$dev_id;
	
	}
// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("myusername");
//session_register("mypassword"); 
header("location:home.php");
}
else {
echo "Wrong Username or Password";
}
?>