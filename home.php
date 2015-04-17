<?php

session_start();


// Connect to server and select databse.
require "dbconnect.inc.php";
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<div>
	<a href="all_bugs.php">All bugs</a>
	<a href="my_bugs.php">My bugs</a>
</div>
<div>
	<form method="post" action="home.php?search=1">
		<input  type="text" id="search_bug" name="search_bug">
		<input  type="submit" name="submit" value="Search">
	</form>
</div>
<div>
    <?php
    $host="localhost"; // Host name
    $username="root"; // Mysql username
    $password=""; // Mysql password
    $db_name="bcs"; // Database name
    $tbl_name="developer"; // Table name

    $conn= mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
    if($_GET['search']==1) {
       $bugname = $_POST['search_bug'];
       // Table name
       //$search = $_POST['search_bug'];
       $sql3 = "Select bug_id, bug_name, description FROM bugs WHERE bug_name='$bugname'";
       $result3 = mysqli_query($conn,$sql3);
       $rows = mysqli_num_rows($result3);

       if ($rows == 1) {
           while ($row3 = mysqli_fetch_assoc($result3)) {
             echo "<table>";
        echo 	"<tr>";

		echo"<th>Id</th>";
		echo"<th>Bug Name </th>";
		echo"<th>Description </th>";
	echo "</tr>";
               echo "<tr>";
               echo "<td>" . $row3['bug_id'] . "</td>";
               echo "<td>" . $row3['bug_name'] . "</td>";
               echo "<td>" . $row3['description'] . "</td>";
               echo "</tr>";
               echo"</table>";
           }
       }
   }
    // If result matched $myusername and $mypassword, table row must be 1 row
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    //session_register("myusername");
    //session_register("mypassword");
    ?>

    <a href="index.php">Logout</a>
</div>
	
	