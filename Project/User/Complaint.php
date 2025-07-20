<?PHP
include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_POST['btn_sub']))
{
	$title = $_POST['txt_tittle'];
	$content = $_POST['txt_content'];
	
	$insQry = "insert into tbl_complaint(complaint_title,complaint_content)values('$title','$content')";
    if($Con -> query($insQry));
	{
		
?>

		<script>
				alert("Inserted");
				window.location="Complaint.php";
		</script>
  <?php
	}
}
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
        <div class="col-md-10">
            <div class="table-wrapper">
             <form id="form1" name="form1" method="post" action="">
                <h3 align="center">Complaint Registration</h3>

                <table class="table table-hover">

                    <tr>
                      <td>Tittle</td>
                      <td>
                        <input type="text" name="txt_tittle" required/>
                      </td>
                    </tr>
  
                    <tr>
                      <td>Content</td>
                      <td>
                        <textarea  name="txt_content" cols="50" rows="5" required></textarea>
                      </td>
                    </tr>
                                      
                    <tr>
                      <td colspan="2" align="center">
                          <input type="submit" name="btn_sub" value="submit" />
                      </td>
                      </tr>
                </table>
      </div>
    </div>
  </div>
</div>

 <br />
 <br />
 <br />

 <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-wrapper">

                <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                      <th>SlNo</th>
                      <th>Tittle</th>
                      <th>Content</th>
                      <th>Reply</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                        <?php 
                        
                        $selQry = "select *from tbl_complaint";
                        $result = $Con -> query($selQry);
                        $i = 0;
                        while($data = $result->fetch_assoc())
                        {
                          $i++;
                        ?>
                  
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $data['complaint_title'] ?></td>
                      <td><?php echo $data['complaint_content'] ?></td>
                      <td><?php echo $data['complaint_reply'] ?></td>
                          
                      </tr>
                  
                        <?php
                  }
                ?>
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