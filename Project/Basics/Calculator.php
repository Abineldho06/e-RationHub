<?php
$result="";

		if(isset($_POST["btnplus"])!=null)
		{
			$number1=$_POST["txtno1"];
			$number2=$_POST["txtno2"];
			$result=$number1+$number2;
			
		}
		
		if(isset($_POST["btnmin"])!=null)
		{
			$number1=$_POST["txtno1"];
			$number2=$_POST["txtno2"];
			$result=$number1-$number2;
			
		}
		
		if(isset($_POST["btnmul"])!=null)
		{
			$number1=$_POST["txtnol"];
			$number2=$_POST["txtno2"];
			$result=$number2*$number2;
		}
		
			
		if(isset($_POST["btndiv"])!=null)
		{
			$number1=$_POST["txtnol"];
			$number2=$_POST["txtno2"];
			$result=$number1/$number2;
		}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calculator</title>
</head>

<body>
<h1 align="center">Calculator</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
  
    <tr>
      <td>Number 1</td>
      <td><label for="txtno1"></label>
      <input type="text" name="txtno1" id="txtno1" /></td>
    </tr>
    
    <tr>
      <td>Number 2</td>
      <td><label for="txtno2"></label>
      <input type="text" name="txtno2" id="txtno2" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="right">
      <input type="submit" name="btnplus" id="btnplus" value="+" />
      <input type="submit" name="btnmin" id="btnmin" value="-" />
      <input type="submit" name="btnmul" id="btnmul" value="*" />
      <input type="submit" name="btndiv" id="btndiv" value="/" /></td>
    </tr>
    
    <tr>
      <td>Result</td>
      <td><?php echo $result ?></td>
    </tr>
    
  </table>
</form>
</body>
</html>