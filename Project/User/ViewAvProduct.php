<?php
include("../Assets/Connection/Connection.php");
include("Head.php");  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View available Product</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h3 align="center">Available Product's</h3>

  <table width="200" border="1" align="center">
  
    <tr>
      <td align="center">Products</td>
    </tr>
    
      <?php
		
		$selQry = "select *from tbl_rationproduct r inner join tbl_product p on r.product_id=p.product_id where r.rationproduct_status='1'";
		$result = $Con -> query($selQry);
		$i=0;
		while($data= $result -> fetch_assoc())
		{
			$i++;
			
			?>
            
         <tr>
          <td align="center"><?php echo $data['product_name'] ?></td>
          
        <?php
		}
	?>
    
  </tr>
   
  </table>
</form>
</body>
</html>
<?php
include("Foot.php");
?>