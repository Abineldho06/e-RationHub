<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Complaint</title>
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
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-wrapper">
                    <h3>Complaint's</h3>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>SlNo</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Reply</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $selQry = "select * from tbl_complaint";
                                $result = $Con->query($selQry);
                                $i = 0;
                                while($data = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data['complaint_title']; ?></td>
                                <td><?php echo $data['complaint_content']; ?></td>
                                <td><a href="Reply.php?did=<?php echo $data['complaint_id']; ?>" class="btn btn-custom">Reply</a></td>
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