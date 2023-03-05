<?php
include("Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	
	$photo = $_FILES['file_photo']['name'];
    $file = $_FILES['file_photo']['tmp_name'];
    move_uploaded_file($file,"Assets/Files/UserPhoto/".$photo);
	
	$email = $_POST["txt_email"];
	$pass = $_POST["txt_password"];

	
	$insQry = "insert into tbl_user(user_name,user_contact,user_photo,user_email,user_password)values('".$name."','".$contact."','".$photo."','".$email."','".$pass."')";
	if($con->query($insQry))
	{
		?>
        	<script>
				alert('Signup Successfuly Completed Sign in Now');
			window.location="Login.php";
            </script>
        <?php
		
	}
	else
	{
		echo "<script>alert('Registration Failed')</script>";
	}
	
}


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Assets/Template/Login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="Assets/Template/Login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Assets/Template/Login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="Assets/Template/Login/css/style.css">

    <title>Login #6</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('Assets/Template/Login/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Sign Up</h3>

            </div>
            <form method="post" enctype="multipart/form-data">
             <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" class="form-control" required name="txt_name">

              </div>
              <div class="form-group">
                <label for="txt_contact">Contact</label>
                <input type="text" class="form-control" required name="txt_contact">
              </div>
               <div class="form-group">
                <label for="file_photo" style="right:60px;border:none">Photo</label>
                <input type="file" class="form-control-sm" required name="file_photo">

              </div>
              <div class="form-group">
                <label for="txt_email">Email</label>
                <input type="email" class="form-control" required name="txt_email">

              </div>
              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" required name="txt_password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0">
                </label>
                 <span align="left"><a href="Login.php" class="forgot-pass" style="left:-29px">Sign In</a></span> 
                <span class="ml-auto"><a href="index.php" class="forgot-pass">Back to Home</a></span> 
              </div>

              <input type="submit" value="Log In" name="btn_submit" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    <script src="Assets/Template/Login/js/jquery-3.3.1.min.js"></script>
    <script src="Assets/Template/Login/js/popper.min.js"></script>
    <script src="Assets/Template/Login/js/bootstrap.min.js"></script>
    <script src="Assets/Template/Login/js/main.js"></script>
  </body>
</html>