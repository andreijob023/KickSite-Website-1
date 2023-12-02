<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/log-in_style.css">
    <title>Log-in | KickSite</title>
    <link rel="icon" type="image/x-icon" href="img/icon.png">

</head>
<body style="background-image: url('img/backgr7.jpg');">
      <div class="container">
        <div class="forms-container" >
            <div class="form-section admin-form">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: index.html");
                }
              }else{

            
            ?>
            <h2>KickSite</h2>
            <span>Enrollee Log-in</span>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="sign-up.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <div class="overlay">

                <div class="overlay-panel adlog">
                    
                    <div class="overlay-panel-active">
                        <h2>Welcome Admin!</h2>

                        <p>If you're an Enrollee Please Log Here</p>
                        <button id="enllog-button">Sign-In as a Enrollee</button>
                    </div>
                </div>

                <div class="overlay-panel enllog">
                    <div class="overlay-panel-active">
                        <h2>Welcome Enrollee!</h2>

                        <p>If you're an Admin Please Log Here</p>
                        <button id="adlog-button">Sign-In as a Admin</button>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
</body>
</html>