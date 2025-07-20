<?php

include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

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
            background: linear-gradient(to right, #d9a7c7, #fffcdc);
            font-family: 'Arial', sans-serif;
        }

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
            background-color: #f1d2de;
            color: #000000;
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
                <h3>My Bookings</h3>

                <table class="table table-hover">
                <thead class="thead-light">
                            <tr>
                                <th>SlNo</th>
                                <th>Booking Id</th>
                                <th>Booking date</th>
                                <th>Amount</th>
                                <th>Token No</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $selQry = "SELECT * FROM tbl_booking where user_id=".$_SESSION['uid'];
                                $result = $Con->query($selQry);
                                $i = 0; 
                                while($data = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['booking_id']; ?></td>
                                <td><?php echo $data['booking_date']; ?></td>
                                <td><?php echo $data['booking_amount']; ?></td>
                                <td><?php echo $data['booking_token']; ?></td>
                                <td>      <a class="btn btn-primary" href="BookedItems.php?cid=<?php echo $data['ration_id']; ?>">View Booking Items</a>
                                </td>
                            </tr>
                            <tbody>

                            <?php }
                            ?>
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



