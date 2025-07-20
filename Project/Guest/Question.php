<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
ob_start();

if(isset($_POST['btn_sub']))
{
	$email = $_POST['txt_email'];
	$question = $_POST['sel_question'];
	$answer = $_POST['txt_answer'];
	
	$selUser = "select *from tbl_user where user_email = '$email' and user_question = '$question'and user_answer= '$answer'";
	$resUser = $Con->query($selUser);
	
	if($dataUser = $resUser -> fetch_assoc())
	{
	   ?>
       		
        	<script>
			window.location="Forgot.php?did=<?php echo $dataUser['user_id'] ?>";
			</script>
            
            <?php
	     }	
	else
	{
		?>
        	<script>
			alert("Answer doesn't matching");
			window.location="Question.php";
			</script>
        <?php
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Question Verify</title>
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
<br />
<br />
<br />

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="table-wrapper">

                <form id="form1" name="form1" method="post" action="">
                <h3 align="center">Verify that it's You</h3> 

                <table class="table table-hover">
                        <tr>
                          <td>E-mail</td>
                          <td>
                            <input type="email" required name="txt_email" class="form-control" placeholder="Enter your e-mail"/>
                          </td>
                        </tr>
                        
                        
                        <tr>
                          <td>Question</td>
                          <td>       
                          <select name="sel_question" id="sel_question" required>
                          <option value="sel">---select Question---</option>
                          <option value="Enter Your Vehicle Number">Enter Your Vehicle Number</option>
                          <option Value="Enter a Car Name">Enter a Car Name</option>
                          <option value="Mobile Brands">Mobile Brand's</option>
                            
                            </select>
                          </td>
                        </tr>
                        
                        
                        <tr>
                          <td>Answer</td>
                          <td>
                            <input type="text" name="txt_answer" id="txt_answer" class="form-control" required placeholder="Enter your answer"/>
                          </td>
                        </tr>
                        
                        
                        <tr>
                          <td colspan="2" align="center">
                            <input type="submit" name="btn_sub"  value="submit" />
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

<br />
<br />
<br />

<?php
include("Foot.php");
ob_flush();
?>