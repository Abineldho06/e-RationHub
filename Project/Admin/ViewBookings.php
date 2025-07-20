<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Ration Hub</title>
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
    /* Styling for input, select fields with white background and padding */
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
    select {
        appearance: none; /* Remove default dropdown arrow */
        background-position: right 10px center;
        background-repeat: no-repeat;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 24 24'%3E%3Cpath fill='%236c757d' d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
        background-color: #fff;
        color: #333;
    }
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
        <div class="col-md-12">
            <div class="table-wrapper">
      <h3 align="center">Bookings</h3>
      <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                            <tr> 
                                <th>SlNo</th>
                                <th>Booking Id</th>
                                <th>User Name</th>
                                <th>Booking date</th>
                                <th>Amount</th>
                                <th>token</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $selQry = "SELECT * FROM tbl_booking b inner join tbl_user u on b.user_id=u.user_id";
                                $result = $Con->query($selQry);
                                $i = 0; 
                                while($data = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['booking_id']; ?></td>
                                <td><?php echo $data['user_name']; ?></td>
                                <td><?php echo $data['booking_date']; ?></td>
                                <td><?php echo $data['booking_amount']; ?></td>
                                <td><?php echo $data['booking_token']; ?></td>
                                <td>      
                                    <a class="btn btn-primary" href="ViewItems.php?cid=<?php echo $data['ration_id']; ?>">View Booking Items</a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                                }
                            ?>
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