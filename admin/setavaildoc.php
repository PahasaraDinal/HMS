<?php

// Connect to database
$con = mysqli_connect("localhost", "root", "", "db_arogya");

$sql = "SELECT * FROM `doctors` ORDER BY doctor_id";
$Sql_query = mysqli_query($con, $sql);
$All_doctors = mysqli_fetch_all($Sql_query, MYSQLI_ASSOC);

$staff_sql = "SELECT * FROM `staff` ORDER BY staff_id";
$staff_query = mysqli_query($con, $staff_sql);
$All_staff = mysqli_fetch_all($staff_query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arogya Health Care</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/2225cf15d5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/staff.css" />

    <!-- Using internal/embedded css -->
    <style>
        .btn {
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .green {
            background-color: #199319;
        }

        .red {
            background-color: red;
        }
    </style>
</head>

<body>
    <!-- header section start -->
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

    <section id="setavailabledoctor">
        <div class="container">
            <h2>Set Doctors</h2>
            <br />
            <div class="table-responsive">
                <table class="table table-light table-bordered table-striped">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Doctor ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Toggle</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        // Use foreach to access all the courses data
                        foreach ($All_doctors as $doctors) { ?>
                            <tr>
                                <td>
                                    <?php echo $doctors['doctor_id']; ?>
                                </td>
                                <td>
                                    <?php echo $doctors['name']; ?>
                                </td>
                                <td>
                                    <?php

                                    if ($doctors['status'] == "1")
                                        echo "Available";
                                    else
                                        echo "Unvailable";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($doctors['status'] == "1")
                                        echo
                                            "<a href=deactivate.php?doctor_id=" . $doctors['doctor_id'] . " class='btn green'>Yes</a>";
                                    else
                                        echo
                                            "<a href=activate.php?doctor_id=" . $doctors['doctor_id'] . " class='btn red'>No</a>";
                                    ?>
                            </tr>
                            <?php
                        }
                        // End the foreach loop
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <section id="setavailabledoctor">
        <div class="container">
            <h2>Set Staff</h2>
            <br />
            <div class="table-responsive">
                <table class="table table-light table-bordered table-striped">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Staff ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Toggle</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        // Use foreach to access all the courses data
                        foreach ($All_staff as $staff) { ?>
                            <tr>
                                <td>
                                    <?php echo $staff['staff_id']; ?>
                                </td>
                                <td>
                                    <?php echo $staff['name']; ?>
                                </td>
                                <td>
                                    <?php echo $staff['role']; ?>
                                </td>
                                <td>
                                    <?php

                                    if ($staff['status'] == "1")
                                        echo "Available";
                                    else
                                        echo "Unvailable";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($staff['status'] == "1")
                                        echo
                                            "<a href=staffdeactivate.php?staff_id=" . $staff['staff_id'] . " class='btn green'>Yes</a>";
                                    else
                                        echo
                                            "<a href=staffactivate.php?staff_id=" . $staff['staff_id'] . " class='btn red'>No</a>";
                                    ?>
                            </tr>
                            <?php
                        }
                        // End the foreach loop
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>


    <footer id="footer">
        <div class="my-4 text-muted text-center">
            <p>2023 All Rights Reserved. Design by Apex Design Works</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>