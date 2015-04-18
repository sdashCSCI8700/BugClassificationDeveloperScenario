<?php

    $mysqli = mysqli_connect('localhost', 'root', "", 'bcs');
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    if(mysqli_connect_error()){
        die('Connect Error(' . $mysqli->connect_errno . ')' . $mysqli -> connect_error);
    }

    if(mysqli_connect_error()){
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
	
	 /*$query="SELECT name,password FROM developer where name='dev1' and password='dev01'";
     $result=$mysqli->query($query);
	 if ($result->num_rows > 0) {
    // output data of each row
		header("location:home.php");
} else {
		echo "0 results";
		}

				
	
	 //echo result;
	 */

?>