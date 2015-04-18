<?php
	session_start();
	require "dbconnect.inc.php";
	if(isset($_SESSION['msg']) == true) {
		echo "Msg is: " . $_SESSION['msg'];
	}
	
	
	$sql = "SELECT * FROM bugs";
	
	$result = $mysqli->query($sql);

?>
<html>
<body>

</style>
	<h2>List All Bugs </h2>	
	<table>
	<tr>
		
		<th>Id</th>
		<th>Bug Name </th>
		<th>Description </th>
	</tr>
	<?php
		while ($row = $result->fetch_assoc()) {
			echo "<tr>"; 
			//echo "<td>". $row['id']. "</td>";
			echo "<td>". $row['bug_name']. "</td>";
			echo "<td>". $row['description']. "</td>";
			//echo "<td><a href='edit.php?id=". $row['bug_id']. "'>Edit</a></td>";
			//echo "<td><a href='delete.php?id=". $row['bug_id']. "'>x</a></td><tr>";
			echo "</tr>";
		}
	?>
	</table>
</body>

</html>
