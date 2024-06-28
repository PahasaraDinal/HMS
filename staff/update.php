<?php
// Check if the form data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the patient ID and updated data from the form
  $patient_id = $_POST["patient_id"];
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $nic = $_POST["nic"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $dob = $_POST["dob"];
  $address = $_POST["address"];
  $gender = $_POST["gender"];
  $remarks = $_POST["remarks"];

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

  // Update the patient record in the database
  $sql = "UPDATE patientdetails SET first_name = '$first_name', last_name = '$last_name', nic = '$nic', email = '$email', phone = '$phone', dob = '$dob', address = '$address', gender = '$gender', remarks = '$remarks' WHERE patient_id = '$patient_id'";

  if ($conn->query($sql) === TRUE) {
    echo "Patient record updated successfully.";
    header("Location: patient.html");
    exit();
  } else {
    echo "Error updating patient record: " . $conn->error;
  }

  // Close the database connection
  $conn->close();
} else {
  echo "Invalid request";
}
?>