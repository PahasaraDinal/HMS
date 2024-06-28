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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve form data
        $reserve_date = $_POST['reserve_date'];
        $patient_id = $_POST["patient_id"];
        $doctor_id = $_POST["doctor_id"];
        $reservation_type = $_POST["reservation_type"]; //Added reservation type variable
        $reservation_id = $_POST["reservation_id"]; //Added reservation ID variable
    
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

        // Prepare and execute the SQL statement to insert the form data into the database
        $sql = "INSERT INTO reservation (reserve_date, patient_id, doctor_id, reservation_type, reservation_id)
          VALUES ('$reserve_date', '$patient_id', '$doctor_id', '$reservation_type', '$reservation_id')";

        //update querries
        if ($doctor_id > 0) {
            $updateDoctor = "UPDATE doctors SET doctor_availability = 'unavailable' WHERE doctor_id='$doctor_id'";
            $conn->query($updateDoctor);
        }

        if ($reservation_type == 'room') {
            $updateRoom = "UPDATE room SET room_availability = 'unavailable' WHERE room_id='$reservation_id'";
            $conn->query($updateRoom);

        } else if (($reservation_type == 'room')) {
            $updateWard = "UPDATE ward SET ward_availability = 'unavailable' WHERE ward_id='$ward_id'";
            $conn->query($updateWard);

        } else {
            $updateTheatre = "UPDATE theatre SET theatre_availability = 'unavailable' WHERE theatre_id='$theatre_id'";
            $conn->query($updateTheatre);

        }


        if ($conn->query($sql) === true) {
            // Redirect to a success page
            header("Location: room.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

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


    <section id="patientmanagement">
        <h2>Available</h2>
        <br /><br />

        <div class="container align-content-center">
            <div class="row">


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


                $queryDoctor = "SELECT * FROM doctors WHERE doctor_availability = 'available' AND status = 1";
                $resultDoctor = $conn->query($queryDoctor);

                $queryRoom = "SELECT * FROM room WHERE room_availability = 'available'";
                $resultRoom = $conn->query($queryRoom);

                $queryWard = "SELECT * FROM ward WHERE ward_availability = 'available'";
                $resultWard = $conn->query($queryWard);

                $queryTheatre = "SELECT * FROM theatre WHERE theatre_availability = 'available'";
                $resultTheatre = $conn->query($queryTheatre);
                // Close the database connection
                $conn->close();
                ?>

                <div class="patient-coloumn col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Doctors</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($resultDoctor->num_rows > 0) {
                                while ($row = $resultDoctor->fetch_assoc()) {
                                    echo "<p>" . $row["doctor_id"] . "</p>";
                                }
                            } else {
                                echo "<p>No records found</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="patient-coloumn col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Rooms</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($resultRoom->num_rows > 0) {
                                while ($row = $resultRoom->fetch_assoc()) {
                                    echo "<p>" . $row["room_id"] . "</p>";
                                }
                            } else {
                                echo "<p>No records found</p>";
                            } ?>
                        </div>
                    </div>
                </div>

                <div class="patient-coloumn col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Wards</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($resultWard->num_rows > 0) {
                                while ($row = $resultWard->fetch_assoc()) {
                                    echo "<p>" . $row["ward_id"] . "</p>";
                                }
                            } else {
                                echo "<p>No records found</p>";
                            } ?>
                        </div>
                    </div>
                </div>

                <div class="patient-coloumn col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Theatres</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($resultTheatre->num_rows > 0) {
                                while ($row = $resultTheatre->fetch_assoc()) {
                                    echo "<p>" . $row["theatre_id"] . "</p>";
                                }
                            } else {
                                echo "<p>No records found</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section id="addstaff">

        <h2 style="text-align:center;">Assigns</h2>
        <br /><br />

        <div class="container">
            <!-- Start Card -->
            <div class="card">
                <!-- Start Card Body -->
                <div class="card-body">
                    <!-- Start Form -->
                    <form id="adddoctorform" action="#" method="post" novalidate autocomplete="off">

                        <!-- Start doc id -->
                        <div class="form-group">

                            <label for="inputDate">Date</label>
                            <input type="date" class="form-control" id="inputDate" name="reserve_date" required />
                        </div>
                        <!-- End doc id -->
                        <br>

                        <!-- Start doc id -->
                        <div class="form-group">

                            <label for="inputPatID">Patient ID</label>
                            <input type="text" class="form-control" id="inputPatID" name="patient_id"
                                placeholder="Enter patient ID" required />
                        </div>
                        <!-- End doc id -->
                        <br>

                        <!-- Start doc id -->
                        <div class="form-group">

                            <label for="inputDocID">Doctor ID</label>
                            <input type="text" class="form-control" id="inputDocID" name="doctor_id"
                                placeholder="Enter doctor ID" required />
                        </div>
                        <!-- End doc id -->
                        <br>

                        <!-- Start reservation type -->
                        <div class="form-group">
                            <legend class="col-form-label pt-0">Reservation Type</legend>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="inlineRadioType1"
                                    name="reservation_type" value="room" required />
                                <label class="form-check-label" for="inlineRadioType1">Room</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="inlineRadioType2"
                                    name="reservation_type" value="ward" required />
                                <label class="form-check-label" for="inlineRadioType2">Ward</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="inlineRadioType3"
                                    name="reservation_type" value="theatre" required />
                                <label class="form-check-label" for="inlineRadioType3">Theatre</label>
                            </div>
                            <br><br>
                            <p>Pricing </p>
                            <ul>
                                <li>Room    : Rs. 15000/= per day    (Facilities= TV,AC,Food,comfortableBedroom)</li>
                                <li>Ward    : Rs. 12000/= per day    (Facilities= Fansonly,Food,NormalBeds)</li>
                                <li>Theatre : Rs. 28000/= per day    (Facilities= AC,Food,Comfortablebedroom)</li>
                            </ul>

                        </div>
                        <!-- End reservation type -->
                        <br>
                        <!-- Start reservation id -->
                        <div class="form-group">
                            <label for="reservation_id">Reservation ID</label>
                            <input type="text" class="form-control" id="reservation_id" name="reservation_id"
                                placeholder="Room/ Ward/ Theatre ID" required />
                        </div>
                        <!-- End reservation id -->
                        <br>

                        <hr />

                        <!-- Start Reset Button -->
                        <button class="btn btn-danger btn-block col-lg-2" type="reset">
                            Clear
                        </button>
                        <!-- End Reset Button -->

                        <!-- Start Submit Button -->
                        <button class="btn btn-success btn-block col-lg-2" type="submit" onclick="displayAlertBox()">
                            Submit
                        </button>
                        <!-- End Submit Button -->
                    </form>
                    <!-- End Form -->
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Card -->

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>
            <script>
                // Function to display the alert box
                function displayAlertBox() {
                    alert("Assign add successful");
                }
            </script>


        </div>
    </section>
    <footer id="footer">
        <div class="my-4 text-muted text-center">
            <p>2023 All Rights Reserved. Design by Apex Design Works</p>
        </div>
    </footer>


</body>

</html>