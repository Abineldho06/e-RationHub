<?php
$largest="";
$smallest="";
			
			if(isset($_POST['btnsub'])!=null)
			{
			  $number1=$_POST['txtno1'];
			  $number2=$_POST['txtno2'];
			  $number3=$_POST['txtno3'];
			  
			  if($number1>$number2)
			    {
				  $t=$number1;
				}
				else
				{
				  $t=$number2;
				}
			  if($number1>$number3)
			  	{
					$largest=$number1;
				}
				else
				{
					$largest=$number3;
				}
					
			  if($number1<$number2)
			  	{
					$t=$number1;
				}
				else
				{
					$t=$number2;
				}
			
			  if($number1<$number3)
			  {
				  $smallest=$number1;
			  }
			  else
			  {
				  $smallest=$number3;
			  }
			}
			  
			  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>largest smallest</title>
</head>

<body>
<h1 align="center">Largest Smallest 3 numbers</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="392" height="447" border="2"  align="center">
    
    <tr>
      <td width="97">Number 1</td>
      <td width="273"><label for="txtno1"></label>
      <input type="text" name="txtno1" id="txtno1" /></td>
    </tr>
    
    <tr>
      <td>Number 2</td>
      <td><label for="txtno2"></label>
      <input type="text" name="txtno2" id="txtno2" /></td>
    </tr>
    
    <tr>
      <td>Number 3</td>
      <td><label for="txtno3"></label>
      <input type="text" name="txtno3" id="txtno3" /></td>
    </tr>
    
    <tr>
      <td height="77" colspan="2" align="center">
      <input type="submit" name="btnsub" id="btnsub" value="Submit" /></td>
    </tr>
    
    <tr>
      <td height="46">Largest</td>
      <td><?php echo $largest ?></td>
    </tr>
    
    <tr>
      <td height="33">Smallest</td>
      <td><?php echo $smallest ?></td>
    </tr>
     
  </table>
</form>
</body>
</html>