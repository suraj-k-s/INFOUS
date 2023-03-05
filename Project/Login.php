<?php
include("Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_login"]))
{
	
	$email = $_POST["txt_email"];
	$pass = $_POST["txt_password"];

	$selU = "select * from  tbl_user where user_email = '".$email."' and user_password	 = '".$pass."'";
	$rowU = $con->query($selU);
	
	$selB = "select * from  tbl_bus_service where bs_email = '".$email."' and bs_password	 = '".$pass."'";
	$rowB = $con->query($selB);

	$selA = "select * from tbl_admin where admin_email = '".$email."' and  admin_password = '".$pass."'";
	$rowA = $con->query($selA);
	
	
	if($dataB=$rowB->fetch_assoc())
	{
		$_SESSION["bid"] = $dataB["bs_id"];
		$_SESSION["bname"] = $dataB["bs_name"];
		header("Location:BusService/HomePage.php");
		
	}
	else if($dataA=$rowA->fetch_assoc())
	{
		$_SESSION["aid"] = $dataA["admin_id"];
		$_SESSION["aname"] = $dataA["admin_name"];
		header("Location:Admin/HomePage.php");
	}
	else if($dataU=$rowU->fetch_assoc())
	{
		$_SESSION["uid"] = $dataU["user_id"];
		$_SESSION["uname"] = $dataU["user_name"];
		header("Location:User/HomePage.php");
	}
	else
	{
		echo "<script>alert('Invalid Credentials')</script>";
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
              <h3>Sign In</h3>

            </div>
            <form method="post">
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="email" class="form-control" required name="txt_email">

              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" required name="txt_password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0">
                </label>
                 <span align="left"><a href="User.php" class="forgot-pass" style="left:-29px">Sign Up</a></span> 
                <span class="ml-auto"><a href="index.php" class="forgot-pass">Back to Home</a></span> 
              </div>

              <input type="submit" value="Log In" name="btn_login" class="btn btn-block btn-primary">

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