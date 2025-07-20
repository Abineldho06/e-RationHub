<?php
include("../Assets/Connection/Connection.php");
include("Head.php");


if(isset($_POST['btnsub']))
{
	$name = $_POST['txtname'];
	$email = $_POST['txtmail'];
	$password = $_POST['txt_password'];
	
	$insQry = "insert into tbl_admin(admin_name,admin_email,admin_password)values('$name','$email','$password')";
	if($Con -> query($insQry))
	{
		echo "inserted";
	}
	
}

if(isset($_GET['did']))
{
	$delQry="delete from tbl_admin where admin_id=".$_GET['did'];
	if($Con -> query($delQry))
	{
		echo "Deleted";
	}
}
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminRegistration</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #495057 !important;
            font-family: 'Arial', sans-serif;
        }
        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        h1 {
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 30px;
            text-align: center;
        }
        input[type="text"], input[type="password"], select {
            background-color: #fff;
            color: #333;
        }
        .btn-custom {
            background-color: #6f42c1;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #563d7c;
            color: white;
        }
        .btn-custom:focus {
            outline: none;
            box-shadow: none;
        }
    </style>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="table-wrapper">
                    <h1>Admin Register</h1>
                    <table class="table table-bordered">
  
    <tr>
      <td>Name</td>
      <td><label for="txtname"></label>
        <input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" />
      </td>
    </tr>
    
    <tr>
      <td>email</td>
      <td><label for="txtmail"></label>
        <input type="email" required name="txt_email" />
      </td>
    </tr>
    
    <tr>
      <td>Password</td>
      <td><label for="pass"></label>
      <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_password" />
    </td>
    </tr>
    
    <tr>
      <td colspan="2" align="center">
          <input type="submit" name="btnsub" id="btnsub" value="submit" class="btn btn-custom" />
          <input type="submit" name="btncancel" id="btncancel" value="cancel" class="btn btn-danger"/>
      </td>
    </tr>
        
  </table>
</form>
</body>
<?php
include("Foot.php");
?>
</html> 


