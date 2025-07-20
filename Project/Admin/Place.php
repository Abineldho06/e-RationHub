<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_POST['btnsub']))
{
	
	$place = $_POST['txtplace'];
	$district = $_POST['seldis'];
	
	
		$insQry = "insert into tbl_place(district_id,place_name)values('$district','$place')";
		if($Con -> query($insQry))
		{
			echo "inserted";
		}
}


if(isset($_GET['did']))
{
		$delQry="delete from tbl_place where place_id=".$_GET['did'];
		if($Con -> query($delQry))
		{
		 	echo "deleted";
		}
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
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
    input[type="text"], select {
        background-color: #fff;
        color: #333;
        padding: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        width: 100%;
        font-size: 1rem;
        outline: none;
    }

    /* Custom dropdown arrow for select with white color */
    select {
    appearance: none;
    background-position: right 10px center;
    background-repeat: no-repeat;
    background-image: url(data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24'%3E%3Cpath fill='%236c757d' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E);
    background-color: #fff;
    color: #333;
}

    /* Optional: Style focus effect */
    select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="table-wrapper">
                <h3>Place</h3>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>District</td>
                            <td>
                                <label for="seldis"></label>
                                <select name="seldis" id="seldis" class="form-control" required>
                                    <option value="sel">---Select District---</option>
                                    <?php 
                                        $selQry = "select *from tbl_district";
                                        $result = $Con ->query($selQry);
                                        while($data = $result ->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Place</td>
                            <td>
                                <label for="txtplace"></label>
                                <input type="text" name="txtplace" id="txtplace" class="form-control" required/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center">
                                <input type="submit" name="btnsub" id="btnsub" value="Submit" class="btn btn-custom" />
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
                            <th>District</th>
                            <th>Place</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $selQry = "select *from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
                            $result = $Con->query($selQry);
                            $i = 0;
                            while ($data = $result->fetch_assoc()) {
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['district_name'] ?></td>
                            <td><?php echo $data['place_name'] ?></td>
                            <td><a href="place.php?did=<?php echo $data['place_id'] ?>" class="btn btn-danger">Delete</a></td>
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



