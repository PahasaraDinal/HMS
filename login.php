<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/login.css">
    <title>Arogya Health Care LOGIN</title>
</head>

<body>
    <?php
    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Establish database connection
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "db_arogya";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query
        $sql = "SELECT id, role FROM userlogin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login success
            $row = $result->fetch_assoc();
            $role = $row["role"];
            $_SESSION["user_id"] = $row["id"];
            if ($role == "admin") {
                header("Location: ./admin/home.html");
            } else {
                header("Location: ./staff/home.php");
            }
            exit();
        } else {
            // Invalid username or password
            echo "Invalid username or password. Please try again.";
        }

        $conn->close();
    }
    ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="login.php" method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="person-circle-outline"></ion-icon>
                        <input type="text" id="username" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <button>Log in</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>