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

    <section id="staffheader">
        <div class="container">
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg fixed-top p-0" style="background-color: #ddf4fc" id="navigationbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="room.html"> Arogya </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-underline ms-auto p-0" id="pillNav2">
                            <li class="nav-item">
                                <a class="nav-link" href="room.html">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section id="staffmanagement">
        <div class="container">
            <h2>Reservation Details</h2>
            <br />
            <div class="table-responsive">
                <table class="table table-light table-bordered table-striped">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Reserve Date</th>
                            <th scope="col">Patient ID</th>
                            <th scope="col">Doctor ID</th>
                            <th scope="col">Reservation Type</th>
                            <th scope="col">Reservation ID</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "db_arogya";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Fetch data from the table
                        $sql = "SELECT * FROM reservation ORDER BY reservation_id";
                        $result = $conn->query($sql);

                        // Check if any records were returned
                        if ($result->num_rows > 0) {
                            // Loop through each row of data
                            while ($row = $result->fetch_assoc()) {
                                // Output the data into table rows
                                echo "<tr>";
                                echo "<td>" . $row["reserve_date"] . "</td>";
                                echo "<td>" . $row["patient_id"] . "</td>";
                                echo "<td>" . $row["doctor_id"] . "</td>";
                                echo "<td>" . $row["reservation_type"] . "</td>";
                                echo "<td>" . $row["reservation_id"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>

</body>

</html>