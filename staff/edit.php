<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arogya Health Care</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/2225cf15d5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/staff.css" />
</head>

<body>
    <section id="adminheader">
        <div class="container">
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg fixed-top p-0" style="background-color: #ddf4fc" id="navigationbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="patient.html"> Arogya </a>
                </div>
            </nav>
        </div>
    </section>

    <section id="editpatient">
        <?php
        // Check if the ID parameter is present in the URL
        if (isset($_GET['id'])) {
            $patient_id = $_GET['id'];

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

            // Fetch the patient record from the database based on the patient ID
            $sql = "SELECT * FROM patientdetails WHERE patient_id = '$patient_id'";
            $result = $conn->query($sql);

            // Check if the record was found
            if ($result->num_rows == 1) {
                // Fetch the data from the record
                $row = $result->fetch_assoc();

                // Display a form to edit the data
                echo "<div class='container' style='margin-top: 5rem'>";
                echo "<h2>Edit Patient Details</h2>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<form action='update.php' method='POST'>";
                echo "<input type='hidden' name='patient_id' value='" . $row['patient_id'] . "'>";
        
                // Using Bootstrap for form styling
        
                echo "<div class='row'>";
                echo "<div class='col'>";
                echo "<label for='first_name'>First Name:</label>";
                echo "<input type='text' class='form-control' name='first_name' value='" . $row['first_name'] . "'>";
                echo "</div>";

                echo "<div class='col'>";
                echo "<label for='last_name'>Last Name:</label>";
                echo "<input type='text' class='form-control' name='last_name' value='" . $row['last_name'] . "'>";
                echo "</div>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='nic'>NIC:</label>";
                echo "<input type='text' class='form-control' name='nic' value='" . $row['nic'] . "'>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='email'>Email:</label>";
                echo "<input type='email' class='form-control' name='email' value='" . $row['email'] . "'>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='phone'>Phone:</label>";
                echo "<input type='text' class='form-control' name='phone' value='" . $row['phone'] . "'>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='dob'>Date of Birth:</label>";
                echo "<input type='date' class='form-control' name='dob' value='" . $row['dob'] . "'>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='address'>Address:</label>";
                echo "<textarea class='form-control' name='address'>" . $row['address'] . "</textarea>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='gender'>Gender:</label>";
                echo "<select class='form-control' name='gender'>";
                echo "<option value='Male'" . ($row['gender'] == 'Male' ? " selected" : "") . ">Male</option>";
                echo "<option value='Female'" . ($row['gender'] == 'Female' ? " selected" : "") . ">Female</option>";
                echo "</select>";
                echo "</div>";

                echo "<br />";

                echo "<div class='form-group'>";
                echo "<label for='remarks'>Remarks:</label>";
                echo "<textarea class='form-control' name='remarks'>" . $row['remarks'] . "</textarea>";
                echo "</div>";

                echo "<br />";

                echo "<button type='submit' class='btn btn-primary'>Update</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "<br />";

            } else {
                echo "Record not found.";
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "Missing ID parameter in the URL.";
        }
        ?>
    </section>

    <footer id="footer">
        <div class="my-4 text-muted text-center">
            <p>2023 All Rights Reserved. Design by Apex Design Works</p>
        </div>
    </footer>
</body>

</html>