<?php 
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_sub']))
{
	$email = $_POST['txt_email'];
	$password = $_POST['txt_password'];
	
	$selAdmin = "select * from tbl_admin where admin_email = '$email' and admin_password = '$password'";
	$resAdmin = $Con->query($selAdmin);
	
	$selShop = "select * from tbl_rationshop where rationshop_email = '$email' and rationshop_password = '$password'";
	$resShop = $Con->query($selShop);
	
	$selUser = "select * from tbl_user where user_email = '$email' and user_password = '$password'";
	$resUser = $Con->query($selUser);
	
	if($dataAdmin = $resAdmin->fetch_assoc())
	{
		$_SESSION["aid"] = $dataAdmin['admin_id'];
		header("location:../Admin/Homepage.php");
	}
	else if($dataShop = $resShop->fetch_assoc())
	{
		$_SESSION["sid"] = $dataShop['rationshop_id'];
		$_SESSION["shopname"] = $dataShop['rationshop_name'];
		header("location:../Shop/Homepage.php");
	}
	else if($dataUser = $resUser->fetch_assoc())
	{
		$_SESSION["uid"] = $dataUser['user_id'];
		$_SESSION["username"] = $dataUser['user_name'];
		header("location:../User/Homepage.php");
	}
	else
	{
		?>
		<script>
		alert('Invalid Credentials');
		window.location="Login.php";
		</script>

		<?php
	}
}

	include("Head.php");
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>e-Ration Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">
  </head>
  <style>
	.container-fluid {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    background: azure;
}
  </style>
  
  <body class="img js-fullheight" style="background-image: url(../Assets/Templates/Login/images/loginbg.png); background-size:cover;" >
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-1 text-center mb-0">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
				
		      	<form action="" method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="email" required name="txt_email" class="form-control" placeholder="Email"/>
		      		</div>

					<div class="form-group">
					<input  id="password-field" type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" class="form-control" placeholder="Password"/>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
				
		            <div class="form-group">
		            	<button type="submit" name="btn_sub" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>

		            <div class="form-group d-md-flex">
		            	<div class="w-50">
			            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>

								<div class="w-50 text-md-right">
									<a href="Question.php" style="color: #fff">Forgot Password</a>
								</div>
		            </div>
		          </form>

		          <p class="w-100 text-center">&mdash; New User? &mdash;</p>
		          <div class="social d-flex text-center">
		          	<a href="Usersignup.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Register</a>
		          </div>
		      	</div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Templates/Login/js/jquery.min.js"></script>
    <script src="../Assets/Templates/Login/js/popper.js"></script>
    <script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
    <script src="../Assets/Templates/Login/js/main.js"></script>
  </body>
</html>
<?php
include("Foot.php");
?>
