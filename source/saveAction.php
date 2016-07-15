<?php

	// Create connection
	$conn = mysqli_connect("localhost", "root", "spkt","dbDen") or die("can't connect database");
	

	$id = $_POST['id'];
	$status = $_POST['status'];

	
	$sql = " UPDATE tbDen SET status = '$status' WHERE ID = $id ";

	if ($conn->query($sql)) {

	    echo "Record updated successfully";

	} else {

	    echo "Error updating record: " . $conn->error;
	    
	}

?>