<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");
ob_start();

if(isset($_POST['btn_sub']))
{
	$newpassword = $_POST['txt_pass'];
	$repassword = $_POST['txt_repass'];

	if($newpassword==$repassword)
	{
		$upQry="update tbl_user set user_password='$newpassword' where user_id=".$_GET['did'];
		if($Con -> query($upQry))
		{
			?>
            	<script>
				alert("Updated");
				window.location="Login.php";
				</script>
                
             <?php
         }
	}
 else
         {
            ?>
                <script>
				alert(" Check Password you entered");
				window.location="Forgot.php";
				</script>
           <?php
		}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Ration Hub</title>
<style>
      

        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 30px;
            text-align: center;
        }

        .table thead th {
            background-color: #f8f9fa;
            color: #6c757d;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
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

        .table-wrapper .action-btn {
            text-align: center;
        }
    </style>
</head>

<body>

<br />
<br />
<br />
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-wrapper">

            <form id="form1" name="form1" method="post" action="">
            <h3 align="center">Set New password</h3>

            <table class="table table-hover">
                <tr>
                <td>New Password</td>
                <td>
                <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" class="form-control" placeholder="New Password"/>
                </td>
              </tr>
              
              <tr>
                <td>Re-enter Password</td>
                <td>
                <input type="password" name="txt_repass" id="txt_repass" placeholder="Re-Enter Password" required>
                </td>
              </tr>
              
              <tr>
                <td colspan="2" align="center">
                  <input type="submit" name="btn_sub"  />
                </td>
              </tr>
              
            </table>

        </form>
     </div>
    </div>
  </div>
</div>
</body>
</html>

<br />
<br />
<br />

<?php
include("Foot.php");
ob_flush();
?>