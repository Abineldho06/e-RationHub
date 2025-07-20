<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST['btnsub']))
{ 
	$name = $_POST['txtcat'];
	$insQry = "insert into tbl_category(category_name)values('$name')";
	if($Con -> query($insQry))
	{
		echo "Inserted";
	}
}
	
	
if(isset($_GET['did']))
{
	$delQry="delete from tbl_category where category_id=".$_GET['did'];
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
<title>Category</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

 <h3 align="center">Category</h3>
    
  <table width="200" border="1" align="center">
  
    <tr>
      <td>Category</td>
      <td><label for="txtcat"></label>
      		<input type="text" name="txtcat" id="txtcat" required/>
      </td>
    </tr>
    
    <tr>
      <td colspan="2" align="center">
      	<input type="submit" name="btnsub" id="btnsub" value="Submit" />
      </td>
    </tr>
    
  </table>
  
  
  
	<h3 align="center"> Inserted Category</h3>
	<table border="1" align="center">
    
    	<tr>
        	<th>SlNo</th>
            <th>Name</th>
      
            <th>Action</th>
        </tr>
        
      <?php
	   		$selQry = 'select * from tbl_category';
			$result = $Con->query($selQry);
			$i = 0;
			while ($data = $result->fetch_assoc()) 
			{
				$i++;
			?>	
            
            <tr>
            	<td><?php echo $i ?></td>
             	<td><?php echo $data['category_name'] ?></td>
                <td>
                	<a href="Category.php?did=<?php echo $data['category_id'] ?>">Delete</a>
                </td>
             </tr>
             
             <?php
					}
			?>
     </table>
                
</form>
</body>
</html>
