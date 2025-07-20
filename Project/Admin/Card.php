<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST['btn_sub']))
{
	$cardname = $_POST['txt_name'];
	
	$insQry = "insert into tbl_card(card_name)values('$cardname')";
	if($Con -> query($insQry));
	{
?>
		<script>
				alert("Inserted");
		</script>
   <?php
	}
}

if(isset($_GET['did']))
{
	$delQry = "delete from tbl_card where card_id=".$_GET['did'];
	if($Con -> query($delQry))
	{
?>
		<script>
				alert("Deleted");
				window.location="Card.php";
		</script>
   <?php
	}
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Card Submit</title>
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
    h3, h1 {
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
                <h1>Card Type</h1>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Card Type</td>
                            <td><label for="txt_name"></label>
                            <input type="text" name="txt_name" id="txt_name" class="form-control" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="submit" name="btn_sub" id="btn_sub" value="Submit" class="btn btn-custom"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-wrapper">
                <h3>Inserted List</h3>
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>SlNo</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $selQry = "select * from tbl_card";
                        $result = $Con->query($selQry);
                        $i = 0;
                        while ($data = $result->fetch_assoc()) {
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data['card_name'] ?></td>
                            <td>
                                <a href="Card.php?did=<?php echo $data['card_id'] ?>" class="btn btn-danger">Delete</a>
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
include('Foot.php');
?>