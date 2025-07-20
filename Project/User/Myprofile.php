<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

	$selQry = "select * from tbl_user u inner join tbl_card c on u.card_id=c.card_id where user_id =".$_SESSION["uid"];
	$result = $Con ->query($selQry);
	$data = $result ->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My profile</title>
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
            <h3 align="center">My Profile</h3>
                
            <table class="table table-striped">
                <tr>
                  <td >Name</td>
                  <td>
                    <?php echo $data["user_name"] ?>
                  </td>
                </tr>
                    
                <tr>
                  <td>Email</td>
                  <td>
                    <?php echo $data["user_email"] ?>
                  </td>
                </tr>
                    
                <tr>
                  <td>Card Number</td>
                  <td>
                    <?php echo $data["user_cardnumber"] ?>
                  </td>
                </tr>
                    
                <tr>
                  <td>Card Type</td>
                  <td>
                    <?php echo $data["card_name"] ?>
                  </td>
                </tr>

                <tr >
                  <td colspan="2" align="center">
                    <a href="Editprofile.php" class="btn btn-primary">Editprofile</a>
                    <a href="ChangePassword.php" class="btn btn-primary">ChangePassword</a>
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
?>