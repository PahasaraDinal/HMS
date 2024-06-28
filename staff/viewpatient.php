<!DOCTYPE html>
<html>

<head>
    <title>View Patients</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

    <section id="addpatient">
        <div class="container" style="margin-top: 2rem">
            <h2>View Patient Details</h2>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Patient ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

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

                    // Fetch data from the table
                    $sql = "SELECT * FROM patientdetails";
                    $result = $conn->query($sql);

                    // Check if any records were returned
                    if ($result->num_rows > 0) {
                        // Loop through each row of data
                        while ($row = $result->fetch_assoc()) {
                            // Output the data into table rows
                            echo "<tr>";
                            echo "<td>" . $row["patient_id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["nic"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["dob"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["remarks"] . "</td>";
                    
                            echo "<td> <a href='edit.php?id=" . $row["patient_id"] . "'class='btn btn-primary'>Edit</a> | <a href='delete.php?id=" . $row["patient_id"] . "'class='btn btn-danger'>Discharge</a></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No records found</td></tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>

                </tbody>
            </table>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>