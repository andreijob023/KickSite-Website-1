<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/sign-up_style.css">

		<title>Registration-Form | KickSite</title>
        <link rel="icon" type="image/x-icon" href=img/icon.png >
	</head>

	<body>

		<div class="wrapper">
			<div class="container"><!--need ng link-->
				<a href="home.html"><img src="img/logo2.png" class="logo" alt="logo"></a>
		<?php 
         include("php/config.php");
         if(isset($_POST['submit'])){
            $email = $_POST['email'];
			$username = $_POST['username'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Email,Username,Password) VALUES('$email','$username','$password')") or die("Error Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='log-in.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>
			
			<h3>Registration Form</h3>
			<form action="" method="post">
				<div class="form-wrapper">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control"  id="email" autocomplete="off" required>
				</div>
				<div class="form-wrapper">
					<label for="username">Username</label>
					<input type="text"name="username" id="username" class="form-control" autocomplete="off" required>
				</div> 


				<div class="form-wrapper">
					<label for="password">Password</label>
					<input type="password" name="password" id ="password" class="form-control" autocomplete="off" required>
				</div>


				<div class="checkbox">
					<label  onload="disableSubmit()">
						<input type="checkbox" id="checkfirst" required> I accept the Terms of Use & Privacy Policy.
						<span class="checkmark"></span>
					</label>
				</div>

				<div class="field">
					<input type="submit" class="btn" name="submit" value="Register" required>
		 		</div>

			</form>
			</div>
		<?php } ?>
		</div>
		
	</body>
</html>