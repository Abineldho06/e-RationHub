<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

	$selQry = "select * from tbl_rationshop where rationshop_id=".$_SESSION["sid"];
	$result = $Con ->query($selQry);
	$data = $result ->fetch_assoc();

	
if(isset($_POST['btn_save']))
{
	$name = $_POST['txt_name'];
	$email = $_POST['txt_email'];
	$number = $_POST['txt_num'];
	
   $upQry = "update tbl_rationshop  set rationshop_name='$name',rationshop_email='$email',rationshop_number='$number' where rationshop_id =".$_SESSION["sid"];
  
if($Con -> query($upQry))
	{
		?>
        		<script>
						alert("Profile Updated...");
						window.location="Myprofile.php";
				</script>
  <?Php
	}
	
}

if(isset($_POST['btn_cancel'])){
  ?>
  <script>
						window.location="Myprofile.php";
  </script>
  <?php
}
?>

	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
              <h3 align="center">Edit Profile</h3>

                <table class="table table-hover">
                
                  <tr>
                    <td>Name</td>
                    <td>
                    <input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" value="<?php echo $data["rationshop_name"] ?>" />
                    </td>
                  </tr>
                  
                  <tr>
                    <td>E-mail</td>
                    <td>
                     <input type="email" required name="txt_email" value="<?php echo $data["rationshop_email"] ?>"/>
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Shop Number</td>
                    <td>
                      <input type="text" name="txt_num" value="<?php echo $data["rationshop_number"] ?>" required/>
                    </td>
                  </tr>
                  
                  <tr>
                    <td colspan="2" align="center">
                      <input type="submit" name="btn_save" value="save" />
                      <input type="submit" name="btn_cancel" value="cancel" />
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