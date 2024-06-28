<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $patientID = $_POST['patientID'];
    $name = $_POST['name'];
    $pay = $_POST['pay'];
    $invoiceID = $_POST['invoiceID'];
    $invoiceDate = $_POST['invoiceDate'];
    $amount = $_POST['FNet'];


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

    // Store the data in the MySQL table
    $query = "INSERT INTO invoice (patientID, name, pay, invoiceID, invoiceDate, amount) VALUES ('$patientID', '$name', '$pay', '$invoiceID', '$invoiceDate', '$amount')";

    if (mysqli_query($conn, $query)) {
        header("Location: invoice.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patient Invoice</title>
    <!-- For Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- CSS For Print Format -->
    <link rel="stylesheet" media="print" href="../css/invoiceprint.css" />

    <!-- CSS For Invoice -->
    <link rel="stylesheet" href="../css/invoice.css" />

    <link rel="stylesheet" href="../css/staff.css" />

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.2.slim.js"
        integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>

    <!-- For Invoice  -->
    <script src="../js/invoice.js"></script>
</head>

<body>
    <section id="staffheader">
        <div class="container">
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg fixed-top p-0" style="background-color: #ddf4fc" id="navigationbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="patient.html"> Arogya </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-underline ms-auto p-0" id="pillNav2">
                            <li class="nav-item">
                                <a class="nav-link" href="patient.html">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section>
        <div class="container" style="margin-top: 5rem">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Arogya Health Care Patient Invoice</h4>
                </div>
                <div class="card-body">
                    <form action="invoice.php" method="post">
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">PatientID</span>
                                    <input type="text" class="form-control" name="patientID" placeholder="PatientID" />
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Name</span>
                                    <input type="text" class="form-control" name="name" placeholder="Name" />
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Pay</span>
                                    <input type="text" class="form-control" name="pay" placeholder="Cash or Card" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Inv. ID</span>
                                    <input type="text" class="form-control" name="invoiceID" placeholder="Inv. No" />
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Inv. Date</span>
                                    <input type="date" class="form-control" name="invoiceDate"
                                        placeholder="Inv. Date" />
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Medication</th>
                                    <th scope="col" class="text-end">Qty</th>
                                    <th scope="col" class="text-end">Rate</th>
                                    <th scope="col" class="text-end">Amount</th>
                                    <th scope="col" class="NoPrint">
                                        <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">
                                            +
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="TBody">
                                <tr id="TRow" class="d-none">
                                    <th scope="row">1</th>
                                    <td><input type="text" class="form-control" /></td>
                                    <td>
                                        <input type="number" class="form-control text-end" name="qty"
                                            onchange="Calc(this);" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control text-end" name="rate"
                                            onchange="Calc(this);" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control text-end" name="amt" value="0"
                                            disabled="" />
                                    </td>
                                    <td class="NoPrint">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">
                                            X
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary" onclick="GetPrint()">
                                    Print
                                </button>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Total</span>
                                    <input type="number" class="form-control text-end" id="FTotal" name="FTotal"
                                        disabled="" />
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Other</span>
                                    <input type="number" class="form-control text-end" id="FGST" name="FGST"
                                        onchange="GetTotal()" />
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Net Amt</span>
                                    <input type="number" class="form-control text-end" id="FNet" name="FNet"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>