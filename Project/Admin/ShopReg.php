<?php 
include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_POST['btn_sub']))
{
	$name= $_POST['txt_name'];
	$license = $_POST['txt_license'];
	$email = $_POST['txt_email'];
	$place = $_POST['sel_place'];
	$shopnumber = $_POST['txt_number'];
	$password = $_POST['txt_password'];
	
	
	$insQry = "insert into tbl_rationshop(rationshop_name,rationshop_licensee,rationshop_email,place_id,rationshop_number,rationshop_password)values('$name','$license','$email','$place','$shopnumber','$password')";
	if($Con -> query($insQry))
	{
		?>
        	<script>
					alert("Inserted");
					window.location="ShopReg.php";
			</script>
    <?php
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ShopReg</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #495057 !important;
            font-family: 'Arial', sans-serif;
        }
        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        h1 {
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 30px;
            text-align: center;
        }
        input[type="text"], input[type="password"], select {
            background-color: #fff;
            color: #333;
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
    </style>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="table-wrapper">
                    <h1>Shop Sign Up</h1>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Shop Name</td>
                                <td>
                                <input required type="text" name="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Licensee</td>
                                <td>
                                 <input required type="text" name="txt_license" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                <input type="email" required name="txt_email" class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>
                                    <select name="sel_district" id="sel_district" class="form-control" onChange="getPlace(this.value)" required>
                                        <option value="sel">---Select District---</option>
                                        <?php
                                        $selQry = "select * from tbl_district";
                                        $result = $Con->query($selQry);
                                        while ($data = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Place</td>
                                <td>
                                    <select name="sel_place" id="sel_place" class="form-control" required>
                                        <option>---Select Place---</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Shop Number</td>
                                <td>
                                    <input type="text" name="txt_number" id="txt_number" class="form-control" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                <input type="text" name="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required   class="form-control"  />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" name="btn_sub" id="btn_sub" value="Submit" class="btn btn-custom" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?dis_id=" + did,
            success: function (result) {
                $("#sel_place").html(result);
            }
        });
    }
</script>

</body>
</html>

<?php
include("Foot.php");
?>