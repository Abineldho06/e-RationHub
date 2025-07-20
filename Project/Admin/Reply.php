<?php
session_start();
include("../Assets/Connection/Connection.php");

include("Head.php");
if(isset($_POST["btn_sub"]))
{
	$reply=$_POST["txt_reply"];
	$update="update tbl_complaint set complaint_reply='$reply' where complaint_id=".$_GET["did"];
	$Con->query($update);
			        ?>
						<script>
                        window.location='ViewComplaint.php';
                        </script>
                    <?php
			
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reply</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .reply-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }
        h1 {
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
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
    <div class="reply-container">
        <h1>Reply</h1>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txt_reply">Reply</label>
                <textarea class="form-control" name="txt_reply" id="txt_reply" cols="45" rows="5" required></textarea>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="btn_sub" id="btn_sub" class="btn btn-custom" value="Submit" />
                <input type="reset" name="btn_can" id="btn_can" class="btn btn-secondary" value="Cancel" />
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include("Foot.php");
?>