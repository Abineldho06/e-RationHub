<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

$_SESSION['yid'] = $_GET['yid'];
if(isset($_POST['btn_sub']))
{
	
	$product = $_POST['sel_product'];
	$quantity = $_POST['txt_quantity'];
	$price = $_POST['txt_price'];
	
	
		$insQry = "insert into tbl_rationlist(product_id,product_qty,product_price,ration_id)values('$product','$quantity','$price','".$_GET['yid']."')";
		if($Con -> query($insQry))
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
		$delQry="delete from tbl_rationlist where rationlist_id=".$_GET['did'];
		if($Con -> query($delQry))
		{
			?>
            <script>
			 		alert("Deleted");
					window.location="Ration List.php";
			</script>
       <?php
     }
  }
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ration List</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<head>

<style>
			.content-wrapper {
			background:#162029;
			padding: 1.875rem 1.75rem;
			width: 100%;
			-webkit-flex-grow: 1;
			flex-grow: 1;
		}
        body {
            /* background: linear-gradient(to right, #d9a7c7, #fffcdc); */
			background-color: #495057 !important;
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
<form id="form1" name="form1" method="post" action="">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-wrapper">
                <h3>Ration Product List</h3>

                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
 
  
    <tr>
      <td>Product</td>
      <td><label for="sel_product"></label>
        <select name="sel_product" id="sel_product" required>
        <option value="sel">---Select Product---</option>
        <?php 
			$selQry="select *from tbl_product";
			$result = $Con -> query($selQry);
			while($data = $result->fetch_assoc())
			{
				?>
                <option value="<?php echo $data['product_id'] ?>"><?php echo $data['product_name'] ?></option>
      <?php
		}
	  ?>
		</select>
      </td>
    </tr>
    
    <tr>
      <td>Quantity</td>
      <td>
      <input type="text" name="txt_quantity"required/>
      </td>
    </tr>
    
    <tr>
      <td>Price</td>
      <td>
       <input type="text" name="txt_price" required/>
      </td>
    </tr>
    
    <tr>
      <td colspan="2" align="center">
      	<input type="submit" name="btn_sub" value="submit" />
      </td>
    
      </tbody>
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
        <div class="col-md-8">
            <div class="table-wrapper">
                <h3>Rations</h3>

                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
    <tr>
      <th>SlNo</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
    
    <?php 
	      $selQry = "select * from tbl_rationlist r inner join tbl_product p on r.product_id=p.product_id where ration_id =".$_SESSION['yid'];
		  $result = $Con->query($selQry);
		  $i=0;
		  while($data = $result->fetch_assoc())
		  {
			  $i++;
		  ?>
      <tr>
      <td><?php echo $i ?></td>
    <td><?php echo $data['product_name'] ?></td>
      <td><?php echo $data['product_qty'] ?></td>
      <td><?php echo $data['product_price'] ?></td>
      <td>
      		<a href="Ration List.php?did=<?php echo $data['rationlist_id'] ?>">Delete</a>
      </td>
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