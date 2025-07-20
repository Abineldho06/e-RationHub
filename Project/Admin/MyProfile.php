<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

	$selQry = "select * from tbl_admin where admin_id =".$_SESSION["aid"];
	$result = $Con ->query($selQry);
	$data = $result ->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .content-wrapper {
        background: #162029;
        padding: 1.875rem 1.75rem;
        width: 100%;
        -webkit-flex-grow: 1;
        flex-grow: 1;
    }
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
        background-color: #fff;
        color: #333;
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
    /* White background for input and select fields */
    input[type="text"], select {
        background-color: #fff;
        color: #333;
    }
</style>


</head>
<body>

<form id="form1" name="form1" method="post" action="">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="table-wrapper">
                <h3>Profile</h3>
                <table class="table table-bordered">
                
                <tbody>
                <tr>
                  <td >Name</td>
                  <td>
                    <?php echo $data["admin_name"] ?>
                  </td>
                </tr>
                    
                <tr>
                  <td>Email</td>
                  <td>
                    <?php echo $data["admin_email"] ?>
                  </td>
                  <tr >
                  <td colspan="2" align="center">
                    <a href="Logout.php" class="btn btn-primary">Log Out</a>
                  </td>
                </tr>
            </tbody>
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