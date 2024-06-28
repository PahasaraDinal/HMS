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
        $doctor_id = $_POST["doctor_id"];
        $name = $_POST["name"];
        $speciality = $_POST["speciality"];

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
        $sql = "INSERT INTO doctors (doctor_id, name, speciality)
          VALUES ('$doctor_id', '$name', '$speciality')";

        if ($conn->query($sql) === true) {
            // Redirect to a success page
            header("Location: home.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>


    <section id="adminheader">
        <div class="container">
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg fixed-top p-0" style="background-color: #ddf4fc" id="navigationbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home.html"> Arogya </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-underline ms-auto p-0" id="pillNav2">
                            <li class="nav-item">
                                <a class="nav-link" href="home.html">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section id="adddoctor">

        <h2 style="text-align:center;">Doctor</h2>
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

                            <label for="inputDocID">Doctor ID</label>
                            <input type="text" class="form-control" id="inputDocID" name="doctor_id"
                                placeholder="Enter doctors ID" required />
                        </div>
                        <!-- End doc id -->
                        <br>
                        <!-- Start Input Name -->
                        <div class="form-group">

                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                                placeholder="Enter doctors name" required />
                        </div>
                        <!-- End Input Name -->
                        <br>
                        <!-- Start speciality -->
                        <div class="form-group">

                            <label for="inputSpeciality">Speciality</label>
                            <input type="text" class="form-control" id="inputSpeciality" name="speciality"
                                placeholder="Enter doctors speciality" required />
                        </div>
                        <!-- End speciality -->


                        <br />

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
            <footer id="footer">
                <div class="my-4 text-muted text-center">
                    <p>2023 All Rights Reserved. Design by Apex Design Works</p>
                </div>
            </footer>

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
                    alert("Doctor add successful");
                }
            </script>



        </div>
    </section>
</body>

</html>