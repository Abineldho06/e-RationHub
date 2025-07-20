<?php 
session_start();
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_sub']))
{
	$currentPassword = $_POST['txt_olpass'];
	
	$selPassword = "select * from tbl_user where user_password = '$currentPassword' and user_id =".$_SESSION["uid"];
	$resUser = $Con ->query($selPassword);
	
	if($dataUser = $resUser -> fetch_assoc())
	{
		$newPassword = $_POST['txt_newpass'];
		$confirmPassword = $_POST['txt_repass'];
		if($newPassword==$confirmPassword)
		{
				$upQry = "update tbl_user set user_password='$newPassword' where user_id =".$_SESSION["uid"];
				if($Con -> query($upQry))
				{
						?>
                        			<script>
						alert("Password Updated...");
						window.location="Homepage.php";
				</script>
                
                <?php
				}
		}
		else
		{
			?>
			<script>
						alert("Please check your password");
						
				</script>
                <?php
		}
	}
	else
	{
		?>
		<script>
						alert("Please check old password");
						
				</script>
                <?php
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
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
    
<div class="container mt-5">
 <div class="row justify-content-center">
   <div class="col-md-10">
     <div class="table-wrapper">
        <form id="form1" name="form1" method="post" action="">
        <h3 align="center">Change your Password</h3> 

        <table class="table table-striped">
        
            <tr>
            <td>Old Password</td>
            <td>
                <input type="password" name="txt_olpass" id="txt_olpass"  placeholder="Enter Old Password" required/></td>
            </tr>
            
            <tr>
            <td>New Password</td>
            <td>
                <input type="password" name="txt_newpass" id="txt_newpass"  placeholder="Enter New Password"/></td>
            </tr>
            
            <tr>
            <td>Re-Enter Password</td>
            <td>
                <input type="password" name="txt_repass" id="txt_repass" placeholder="Re-Enter Password" /></td>
            </tr>
            
            <tr>
            <td colspan="2" align="center">
                    <input type="submit" name="btn_sub" value="Change Password"/>
                    <input type="reset" name="btn_cancel" value="Cancel"/>
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
<?php
include("Foot.php");
ob_flush();
?>