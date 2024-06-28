<?php
// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_arogya";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the id value from the URL
    $patient_id = $_GET['id'];

    // Delete the record with the given id from the table
    $sql = "DELETE FROM patientdetails WHERE patient_id = '$patient_id'";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result === TRUE) {
        // echo "Record deleted successfully.";
        header("Location: viewpatient.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Please provide a valid id.";
}

// Close the database connection
$conn->close();
?>