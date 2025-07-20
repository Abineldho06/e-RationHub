<?php

include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_GET['acid']))
{
	$upQry = "update tbl_user set user_status='1' where user_id=".$_GET['acid']; 
	if($Con ->query($upQry))
	{
		echo "Accepted";
	}
}

if(isset($_GET['rejid']))
{
	$upQry = "update tbl_user set user_status='2' where user_id=".$_GET['rejid'];
	if($Con ->query($upQry))
	{
		echo "Rejected";
	}
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User List</title>
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
    </style>
</head>

<body>
<form method="post" action="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-wrapper">
                    <h3>New List</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SlNo</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Card Number</th>
                                <th>Card Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $selQry = "SELECT * FROM tbl_user u INNER JOIN tbl_card c ON u.card_id = c.card_id WHERE u.user_status='0'";
                                $result = $Con->query($selQry);
                                $i = 0; 
                                while($data = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['user_name']; ?></td>
                                <td><?php echo $data['user_email']; ?></td>
                                <td><?php echo $data['user_cardnumber']; ?></td>
                                <td><?php echo $data['card_name']; ?></td>
                                <td>
                                    <a href="UserList.php?acid=<?php echo $data['user_id']; ?>" class="btn btn-custom">Accept</a>
                                    <a href="UserList.php?rejid=<?php echo $data['user_id']; ?>" class="btn btn-danger">Reject</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-wrapper">
                    <h3>Accepted List</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SlNo</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Card Number</th>
                                <th>Card Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $selQry = "SELECT * FROM tbl_user u INNER JOIN tbl_card c ON u.card_id = c.card_id WHERE u.user_status='1'";
                                $result = $Con->query($selQry);
                                $i = 0; 
                                while($data = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['user_name']; ?></td>
                                <td><?php echo $data['user_email']; ?></td>
                                <td><?php echo $data['user_cardnumber']; ?></td>
                                <td><?php echo $data['card_name']; ?></td>
                                <td>
                                    <a href="UserList.php?rejid=<?php echo $data['user_id']; ?>" class="btn btn-danger">Reject</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-wrapper">
                    <h3>Rejected List</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SlNo</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Card Number</th>
                                <th>Card Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $selQry = "SELECT * FROM tbl_user u INNER JOIN tbl_card c ON u.card_id = c.card_id WHERE u.user_status='2'";
                                $result = $Con->query($selQry);
                                $i = 0; 
                                while($data = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['user_name']; ?></td>
                                <td><?php echo $data['user_email']; ?></td>
                                <td><?php echo $data['user_cardnumber']; ?></td>
                                <td><?php echo $data['card_name']; ?></td>
                                <td>
                                    <a href="UserList.php?acid=<?php echo $data['user_id']; ?>" class="btn btn-custom">Accept</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
<?php
include("Foot.php");
?>



