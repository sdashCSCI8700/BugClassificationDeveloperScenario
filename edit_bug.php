<?php

require "dbconnect.inc.php";
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="bcs"; // Database name
$tbl_name="developer"; // Table name

// Connect to server and select databse.
$conn= mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");

if($_GET["id"]) {

    $id = $_GET['id'];
    $status = $_GET['status'];
    $assign = $_GET['assign'];



}






/*if($rows==1)
{
    while($rows=mysqli_fetch_assoc($result)){
        $status=$rows['status'];

    }
}*/
?>

<html>

<body>





    <form action="my_bugs.php" method="post">
        <p><label>Assign to:</label></p>
        <p><input type="text" name="assignto" value="<?php echo $_GET['assign'];?>"></p>
        <label for="status">Status:</label>
        <select  name="status">
            <option value=0<?php echo urldecode($_GET['status'])==0 ? 'selected="selected"': ''?>>Reported</option>
            <option value=1<?php echo urldecode($_GET['status'])==1 ? 'selected="selected"': ''?>>Rejected</option>
            <option value=2<?php echo urldecode($_GET['status'])==2 ? 'selected="selected"': ''?>>Resolved</option>
        </select>
        <input type="hidden" name="ids" value="<?php echo $_GET['id'];?>">
        <input type="submit"  name="submit1" value="submit"/>
    </form>
</body>
</html>


