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
  <!-- header section start -->
  <section id="adminheader">
    <div class="container">
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top p-0" style="background-color: #ddf4fc" id="navigationbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> Arogya </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-underline ms-auto p-0" id="pillNav2">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="patient.html">Patient</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="room.html">Room</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </section>


  <!-- doctors -->
  <section id="viewdoctors">


    <div class="container">
      <h2>Available Doctors & Staff Today</h2>
      <br />
      <div class="table-responsive">
        <table class="table table-light table-bordered table-striped">
          <caption> Doctors today</caption>

          <thead>
            <tr class="table-primary">
              <th scope="col">DoctorID</th>
              <th scope="col">Name</th>
              <th scope="col">Speciality</th>
              <!-- <th scope="col">Availability</th> -->
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
            $sql = "SELECT * FROM doctors WHERE status = 1 ORDER BY doctor_id";
            $result = $conn->query($sql);

            // Check if any records were returned
            if ($result->num_rows > 0) {
              // Loop through each row of data
              while ($row = $result->fetch_assoc()) {
                // Output the data into table rows
                echo "<tr>";
                echo "<td>" . $row["doctor_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["speciality"] . "</td>";
                //echo "<td>" . $row["availability"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='3'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>

          </tbody>
        </table>
      </div>

      <br>
      <br>
      <div class="table-responsive">
        <table class="table table-light table-bordered table-striped">
        <caption>Availble staff today</caption>
          <thead>
            <tr class="table-primary">
              <th scope="col">Staff ID</th>
              <th scope="col">Name</th>
              <th scope="col">Role</th>
              <th scope="col">Phone NO</th>
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
            $staff_sql = "SELECT * FROM staff WHERE status = 1 ORDER BY role";
            $staff = $conn->query($staff_sql);

            // Check if any records were returned
            if ($staff->num_rows > 0) {
              // Loop through each row of data
              while ($row = $staff->fetch_assoc()) {
                // Output the data into table rows
                echo "<tr>";
                echo "<td>" . $row["staff_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td>" . $row["phone_no"] . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>

          </tbody>
        </table>
      </div>

      

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

  <footer id="footer">
    <div class="my-4 text-muted text-center">
      <p>2023 All Rights Reserved. Design by Apex Design Works</p>
    </div>
  </footer>
</body>

</html>