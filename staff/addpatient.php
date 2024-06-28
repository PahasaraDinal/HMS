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
    $patient_id = $_POST['patient_id'];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $nic = $_POST["nic"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $gender = $_POST["roomType"];
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

    // Prepare and execute the SQL statement to insert the form data into the database
    $sql = "INSERT INTO patientdetails (patient_id, first_name, last_name, nic, email, phone, dob, address, gender, remarks)
          VALUES ('$patient_id', '$firstName', '$lastName', '$nic', '$email', '$phone', '$dob', '$address', '$gender', '$remarks')";

    if ($conn->query($sql) === true) {
      // Redirect to a success page
      header("Location: patient.html");
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
          <a class="navbar-brand" href="patient.html"> Arogya </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-underline ms-auto p-0" id="pillNav2">
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </section>

  <section id="addpatient">

    <h2 style="text-align:center;">Patient Admition Form</h2>
    <br /><br />

    <div class="container">
      <!-- Start Card -->
      <div class="card">
        <!-- Start Card Body -->
        <div class="card-body">
          <!-- Start Form -->
          <form id="addpatientform" action="#" method="post" class="needs-validation" novalidate autocomplete="off">

            <!-- Start Input patient_id -->
            <div class="form-group">
              <label for="inputpid">Patient ID</label>
              <input type="text" class="form-control" id="inputpid" name="patient_id"
                placeholder="Enter Patient ID - P0001" required />
            </div>
            <!-- End Input Nic -->

            <br />

            <!--Date -->
            <div class="form-group">
              <label for="inputDate">Admition Date</label>
              <input type="date" class="form-control" id="inputDate" name="admitdate" required />
            </div>
            <!-- Date -->

            <br />
            <!-- Start Input Name -->
            <div class="row">
              <div class="col">
                <label for="inputFirstName">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="firstName"
                  placeholder="Enter first name" required />
              </div>
              <div class="col">
                <label for="inputLastName">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Enter last name"
                  required />
              </div>
            </div>
            <!-- End Input Name -->

            <br />

            <!-- Start Input NIC -->
            <div class="form-group">
              <label for="inputnic">NIC</label>
              <input type="text" class="form-control" id="inputnic" name="nic" placeholder="Enter NIC" required />
            </div>
            <!-- End Input Nic -->

            <br />

            <!-- Start Input Email -->
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
            </div>
            <!-- End Input Email -->

            <br />

            <!-- Start Input Telephone -->
            <div class="form-group">
              <label for="inputPhone">Phone</label>
              <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="07xxxxxxxx" required />
            </div>
            <!-- End Input Telephone -->

            <br />

            <!-- Start Input Date -->
            <div class="form-group">
              <label for="inputDate">Date of Birth</label>
              <input type="date" class="form-control" id="inputdob" name="dob" required />
            </div>
            <!-- End Input Date -->

            <br />

            <!-- Start Input address -->
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <textarea class='form-control' id="address" name='address'></textarea>
            </div>
            <!-- End Input Address -->

            <br />

            <!-- Start gender Type -->
            <div class="form-group">
              <legend class="col-form-label pt-0">Gender</legend>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="inlineRadioType1" name="roomType" value="Male"
                  required />
                <label class="form-check-label" for="inlineRadioType1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="inlineRadioType2" name="roomType" value="Female"
                  required />
                <label class="form-check-label" for="inlineRadioType2">Female</label>
              </div>
            </div>
            <!-- End gender Type -->
            <br />
            <!-- Start Input address -->
            <div class="form-group">
              <label for="inputRemarks">Special Notes</label>
              <textarea class="form-control" id="remarks" name="remarks"></textarea>
            </div>
            <!-- End Input Address -->
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

      <!-- Start Scritp for Form -->
      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          "use strict";
          window.addEventListener(
            "load",
            function () {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName("needs-validation");
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                  form.addEventListener(
                    "submit",
                    function (event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add("was-validated");
                    },
                    false
                  );
                }
              );
            },
            false
          );
        })();
      </script>
      <script>
        // Function to display the alert box
        function displayAlertBox() {
          alert("Patient add successful");
        }
      </script>
      <!-- End Scritp for Form -->
    </div>
  </section>
  <footer id="footer">
    <div class="my-4 text-muted text-center">
      <p>2023 All Rights Reserved. Design by Apex Design Works</p>
    </div>
  </footer>
</body>

</html>