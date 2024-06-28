<?php

	// Connect to database
	$con=mysqli_connect("localhost","root","","db_arogya");

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['staff_id'])){

		// Store the value from get to a
		// local variable "course_id"
		$course_id=$_GET['staff_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `staff` SET
			`status`=1 WHERE staff_id='$course_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to course-page.php
	header('location: setavaildoc.php');
?>
