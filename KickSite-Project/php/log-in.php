<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KickSiteLogIn</title>
    <link rel="stylesheet" href="../css/log-in_style.css">
    <!---favicon need-->
</head>

<body>
    <div class="container">

        <div class="forms-container">

            <div class="form-section admin-form">
                <form action="" method="post">
                <?php
session_start();
include("../php/config.php");

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Hash the password before comparing it with the database
    $hashedPassword = md5($password); // You should use a stronger hashing algorithm in a production environment

    $result = mysqli_query($con, "SELECT * FROM admin_table WHERE Email='$email' AND Password='$password'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['password'] = $row['Password'];
        $_SESSION['id'] = $row['Id'];
        header("Location: ../html/admin.html"); // Change this to the admin dashboard page
        exit();
    } else {
        echo "<div class='message'>
            <p>Wrong Username or Password</p>
            </div> <br>";
    }
}
?>

                    <h2>KickSite</h2>
                    <span>Admin Log In</span>
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required/>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required />
                    <button type="submit" class="btn" name="submit"> Log-in</button>
                </form>
            </div>

            <div class="form-section enrollee-form">
                <form action="" method="post">
                    <?php
                    session_start(); // Start the session
                    include("../php/config.php");

                    if (isset($_POST['submit'])) {
                        $email = mysqli_real_escape_string($con, $_POST['email']);
                        $password = mysqli_real_escape_string($con, $_POST['password']);

                        $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                        $row = mysqli_fetch_assoc($result);

                        if (is_array($row) && !empty($row)) {
                            $_SESSION['valid'] = $row['Email'];
                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['id'] = $row['Id'];
                            header("Location: ../html/index.html");
                            exit(); // Add exit to stop further execution
                        } else {
                            echo "<div class='message'>
                                <p>Wrong Username or Password</p>
                                </div> <br>";
                        }
                    }
                    ?>

                    <h2>KickSite</h2>
                    <span>Enrollee Log-In</span>
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required />
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required />

                    <div class="field">
                        <button type="submit" class="btn" name="submit"> Log-in</button>
                    </div>
                </form>
                <a href="php/sign-up.php" target="_blank">Sign-Up Here!</a>
            </div>
        </div>

        <div class="overlay">

            <div class="overlay-panel adlog">

                <div class="overlay-panel-active">
                    <h2>Welcome Admin!</h2>

                    <p>If you're an Enrollee Please Log Here</p>
                    <button id="enllog-button">Sign-In as an Enrollee</button>
                </div>
            </div>

            <div class="overlay-panel enllog">
                <div class="overlay-panel-active">
                    <h2>Welcome Enrollee!</h2>

                    <p>If you're an Admin Please Log Here</p>
                    <button id="adlog-button">Sign-In as an Admin</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../jscript/script.js"></script>
</body>
</html>
