<?php

	// Connect to database
	$con=mysqli_connect("localhost","root","","db_arogya");

	// Check if id is set or not, if true,
	// toggle else simply go back to the page
	if (isset($_GET['doctor_id'])){

		// Store the value from get to
		// a local variable "course_id"
		$course_id=$_GET['doctor_id'];

		// SQL query that sets the status to
		// 0 to indicate deactivation.
		$sql="UPDATE `doctors` SET
			`status`=0 WHERE doctor_id='$course_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to course-page.php
	header('location: setavaildoc.php');
?>
