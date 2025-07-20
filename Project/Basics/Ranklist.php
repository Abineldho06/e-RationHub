<?php
$name="";
$gender="";
$department="";
$total="";
$percentage="";
$grade="";

			if(isset($_POST['btnsub'])!=null)
			{
				$fname=$_POST['txtfirst'];
				$lname=$_POST['txtlast'];
				
				$gender=$_POST['gender'];
				$department=$_POST['seldep'];
				
				$m1=$_POST['txtm1'];
				$m2=$_POST['txtm2'];
				$m3=$_POST['txtm3'];
				
				$total=$m1+$m2+$m3;
				$percentage=($total/300)*100;
				
				
					if($percentage>=90)
					{
						$garde="A+";
					}
					
					else if($percentage>=80)
					{
						$grade="A";
					}
					
					else if($percentage>=70)
					{
						$grade="B+";
					}
					
					else if($percentage>=60)
					{
						$grade="B";
					}
					
					else if($percentage>=50)
					{
						$grade="C+";
					}
					
					else if($percentage>=40)
					{
						$grade="C";
					}
					
					else if($percentage>=30)
					{
						$grade="D+";
					}
					
					else if($percentage>=20)
					{
						$grade="D";
					}
					
					
					if($gender="male")
					{
						$name="Mr. ".$fname." ".$lname;
					}
					
					if($gender="female")
					{
						$name="Miss. ".$fname." ".$lname;
					}
			}
						
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type/**/" content="text/html; charset=utf-8" />
<title>Rank List</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>First Name</td>
      <td><label for="txtfirst"></label>
        <input type="text" name="txtfirst" id="txtfirst" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><label for="txtlast"></label>
      <input type="text" name="txtlast" id="txtlast" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" id="gender" value="Male" />
      <label for="gender">Male</label>
      <input type="radio" name="gender" id="gender" value="Female" />
      <label for="gender">Female</label></td>
    </tr>
    
    <tr>
      <td>Department</td>
      <td><label for="seldep"></label>
      		
        <select name="seldep" size="1" id="seldep">
        <option value="sel">---select---</option>
            <option value="BCA">BCA</option>
        <option value="BBA">BBA</option>
      </select></td>
    </tr>
    
    <tr>
      <td>M1</td>
      <td><label for="txtm1"></label>
      <input type="text" name="txtm1" id="txtm1" /></td>
    </tr>
    
    <tr>
      <td>M2</td>
      <td><label for="txtm2"></label>
      <input type="text" name="txtm2" id="txtm2" /></td>
    </tr>
    
    <tr>
      <td>M3</td>
      <td><label for="txtm3"></label>
      <input type="text" name="txtm3" id="txtm3" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnsub" id="btnsub" value="Submit" /></td>
      
    </tr>
    
    <tr>
      <td>Name</td>
      <td><?php echo $name ?></td>
    </tr>
    
    <tr>
      <td>Gender</td>
      <td><?php echo $gender ?></td>
    </tr>
    
    <tr>
      <td>Department</td>
      <td><?php echo $department ?></td>
    </tr>
    
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    
    <tr>
      <td>Percentage</td>
      <td><?php echo $percentage ?></td>
    </tr>
    
    <tr>
      <td>Grade</td>
      <td><?php echo $grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>