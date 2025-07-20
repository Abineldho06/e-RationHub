<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST['btn_subcat']))
{
		
	$category = $_POST['sel_cat'];
	$subcategory = $_POST['txt_sub'];

		
		$insQry = "insert into tbl_subcate(category_id,subcategory_name)values('$category','$subcategory')";
		if($Con ->query($insQry))
			{
				echo "Inserted";
				    
			}
			
}


if(isset($_GET['did']))
{
	$delQry = "delete from tbl_subcate where subcategory_id=".$_GET['did'];
	if($Con -> query($delQry))
	{
		echo "Deleted";
		
	}
		

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

<h3 align="center">Subcategory</h3>

  <table width="200" border="1" align="center">
  
    <tr>
      <td>Category</td>
      	<td><label for="sel_cat"></label>
       	 <select name="sel_cat" id="sel_cat">
       	 <option value="" >---Select Category---</option>
        
        <?php
		
			$selQry = "select *from tbl_category";
			$result = $Con-> query($selQry);
			while($data = $result->fetch_assoc())
			{
				?>
                
                <option value="<?php echo $data['category_id'] ?>"><?php echo $data['category_name'] ?></option>
                
                <?php
			}
		?>
      		</select>
      </td>
    </tr>
    
    <tr>
      <td>Subcategory</td>
     	<td>
      		<input type="text" name="txt_sub" id="txt_sub" />
        </td>
    </tr>
    
    <tr>
      <td colspan="2" align="center">
      	<input type="submit" name="btn_subcat" value="submit" />
      </td>
    </tr>
    
  </table>
 
 <br />
 <br />
 <br />
 
  <h3 align="center">Inserted List</h3>
  <table align="center" border="1">
  
   			<tr>
  				<th>SlNo</th>
                <th>category</th>
                <th>Subcategory</th>
                <th>Action</th>
            </tr>
            
          <?php 
		  	 	
				$selQry = "select *from tbl_subcate s inner join tbl_category c on s.category_id=c.category_id";
				$result = $Con->query($selQry);
				$i = 0;
				while($data = $result->fetch_assoc())
				{
					$i++;
				?>
                
                	<tr>
                    	<td><?php echo $i ?></td>
                        <td><?php echo $data['category_name'] ?></td>
						<td><?php echo $data['subcategory_name'] ?></td>
                        <td>
                        	<a href="Subcategory.php?did=<?php echo $data['subcategory_id'] ?>">Delete</a>
                        </td>
                
          			<?php
				}
			?>
            
   </table>         
</form>
</body>
</html>