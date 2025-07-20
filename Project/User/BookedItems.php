<?php
include("../Assets/Connection/connection.php");
session_start();

include("Head.php");


$ration_id = $_GET['cid'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Ration Hub</title>
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
        <div class="col-md-13">
            <div class="table-wrapper">
                <form id="form1" name="form1" method="post" action="">
                    <h3 align="center">Booked Products</h3>

                    <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                        <th>SlNo</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                                    $check = 0;
                                    $selQry = "select *from tbl_rationlist r inner join  tbl_product p  on p.product_id = r.product_id where  r.ration_id = ".$_GET['cid'];
                                    $result = $Con->query($selQry);
                                    $i = 0;
                                    $total = 0;
                                    while ($data = $result->fetch_assoc())
                                    {
                                        $i++;
                                        $total+=(int)$data['product_price'];
                        ?>
          
	
                                    <tr>
                                    <td><?php echo $i ?></td>
                                        <td><?php echo $data['product_name'] ?></td>
                                        <td><?php echo $data['product_qty'] ?></td>
                                        <td><?php echo $data['product_price'] ?></td>
                                        
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