<?php
	session_start();

	require "dbconnect.inc.php";








	if(isset($_SESSION["username"])) {
        $host="localhost"; // Host name
        $username="root"; // Mysql username
        $password=""; // Mysql password
        $db_name="bcs"; // Database name
        $tbl_name="developer"; // Table name

// Connect to server and select databse.
        $conn= mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");


if(isset($_POST)) {



    $assignto = $_POST["assignto"];
    $status = $_POST["status"];
    $bugid = $_POST["ids"];




    $sql = "UPDATE `bugs` SET `status`='$status',`assign_to`='$assignto' WHERE  `bug_id`='$bugid'";

    $result = mysqli_query($conn, $sql);
    echo "<p style='color:green'>Successfully changed status of bug!</p>";

}

        $sql2 = "SELECT * FROM bugs where dev_id=".$_SESSION["dev_id"];
	
	$result2 = $mysqli->query($sql2);
	}else{
		echo "did not get the session in mybug!";
	}
?>
	
	<html>
<body>

	<h2> My Bugs </h2>	
	<table>
	<tr>
		
		<th>Id</th>
		<th>Bug Name </th>
		<th>Description </th>
        <th>Assign to</th>
        <th>Status</th>
	</tr>
	<?php
		while ($row2 = $result2->fetch_assoc()) {
			echo "<tr>"; 
			echo "<td>". $row2['bug_id']. "</td>";
			echo "<td>". $row2['bug_name']. "</td>";
			echo "<td>". $row2['description']. "</td>";
            echo "<td>". $row2['assign_to']. "</td>";
            echo "<td>";
            if($row2['status']==0) {
                echo "Report";
            }elseif($row2['status']==1){
                echo "Rejected";
            }elseif($row2['status']==2){
                echo "Resolved";
            }

            echo "</td>";
			echo "<td><a href='edit_bug.php?status=".$row2['status']."&id=".$row2['bug_id']. "&assign=".$row2['assign_to']."'>Edit</a></td>";
			//echo "<td><a href='delete.php?id=". $row['bug_id']. "'>x</a></td><tr>";
			echo "</tr>";
		}
	?>
	</table>
</body>
</html>
