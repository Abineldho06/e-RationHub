<?php
include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

if(isset($_POST['btn_sub']))
{
	$product = $_POST['sel_product'];
	
	$insQry= "insert into tbl_rationproduct(product_id,rationshop_id)values('$product','".$_SESSION['sid']."')";
	if($Con -> query($insQry))
	{
		?>
        
        <script>
			alert("Inserted");
			window.location="ShopProduct.php";

		</script>
        
     <?php
	}
}

if(isset($_GET['avid']))
{
	$upQry = "update tbl_rationproduct set rationproduct_status='1' where rationproduct_id=".$_GET['avid'];
	if($Con ->query($upQry))
	{
		?>
       <script>
	   		alert("Product added to available");
	         window.location="ShopProduct.php";
	   </script>
       
     <?php
	}
}


if(isset($_GET['unid']))
{
	$upQry = "update tbl_rationproduct set rationproduct_status='2' where rationproduct_id=".$_GET['unid'];
	if($Con ->query($upQry))
	{
		?>
       <script>
	   		alert("Product added to unavailable");
	         window.location="ShopProduct.php";
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
				 <h3 align="center">Shop Product</h3>

					<?php
						$selQryOne = " SELECT * FROM tbl_product 
							WHERE product_id NOT IN (
							SELECT product_id FROM tbl_rationproduct WHERE rationshop_id = '" . $_SESSION['sid'] . "'
							)";
						$resultOne = $Con -> query($selQryOne);
							if($rowOne = $resultOne -> fetch_assoc())
							{
					?>

 		
		<table class="table table-hover">

			 <td>Product</td>
			 <td>
				<select name="sel_product" id="sel_product" required >
					<option value="sel">---Select Product</option>
						
						<?php
							$selQry = "SELECT * FROM tbl_product 
							WHERE product_id NOT IN (
							SELECT product_id FROM tbl_rationproduct WHERE rationshop_id = '" . $_SESSION['sid'] . "'
							)";
						$result = $Con -> query($selQry);
						while($data = $result ->fetch_assoc())
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
      			<td colspan="2" align="center">
      				<input type="submit" name="btn_sub" id="btn_sub" value="Submit" />
     			</td>
   			</tr>
		</table>
	  
	<?php
		}
		else{
			echo "<h6 align='center'>You Already Added All Items</h6>";
		}
	?>
  
  <br />
  <br />
  <br />

  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-wrapper">
  				<h3 align="center">Product's</h3>

				  <table class="table table-hover">
				  <thead>
					<tr>
					  <th>SlNo</th>
					  <th>Product</th>
					  <th>Action</th>
					</tr>
				  </thead>

					<tbody>
							<?php 
							
							$selQry = "select *from tbl_rationproduct r inner join tbl_product p on r.product_id=p.product_id where r.rationshop_id =".$_SESSION['sid'];
							$result = $Con ->query($selQry);
							$i=0;
							while($data = $result ->fetch_assoc())
							{
								$i++;
								?>
            
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $data['product_name'] ?></td>
								<td>
									<a href="ShopProduct.php?avid=<?php echo $data['rationproduct_id'] ?>" class="btn btn-primary">Available</a>
									<a href="ShopProduct.php?unid=<?php echo $data['rationproduct_id'] ?>" class="btn btn-primary">UnAvailable</a>
								</td>
							</tr>
					</tbody>	
							<?php
						}
					?>
    
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
  				<h3 align="center">Available Product's</h3>

  				<table class="table table-hover">
				  <thead>
					  <tr>
						<th>SlNo</th>
						<th>Product</th>
					  </tr>
				  </thead>
					
					<tbody>
							<?php 
							
								$selQry = "select *from tbl_rationproduct r inner join tbl_product p on r.product_id=p.product_id where r.rationproduct_status='1' and r.rationshop_id =".$_SESSION['sid'];
								$result = $Con ->query($selQry);
								while($data = $result->fetch_assoc())
								{
									$i++;
								?>
					  <tr>
							<td><?php echo $i ?></td>
							<td><?php echo $data['product_name'] ?></td>
					  </tr>
					</tbody>

					<?php
					}
				?>
				
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
  				<h3 align="center">UnAvailable Product's</h3>


 					<table class="table table-hover">
					 <thead>					
					  <tr>
						<th>SlNo</th>
						<th>Product</th>
					  </tr>
					 </thead>
					
					 <tbody>
							<?php 
							
								$selQry = "select *from tbl_rationproduct r inner join tbl_product p on r.product_id=p.product_id where r.rationproduct_status='2' and r.rationshop_id =".$_SESSION['sid'];
								$result = $Con ->query($selQry);
								while($data = $result->fetch_assoc())
								{
									$i++;
							?>

					  <tr>
							<td><?php echo $i ?></td>
							<td><?php echo $data['product_name'] ?></td>
					  </tr>
					</tbody>
					<?php
					}
				?>
			</table>

			  </div>
   		     </div>
           </div>
		 </div>
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