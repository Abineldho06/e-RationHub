<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Shops</title>
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

          <div class="container mt-5">
            <form id="form1" name="form1" method="post" action="">
               <h3 class="text-center">Shop's</h3>

                 <div class="row justify-content-center">
                   <div class="col-md-4 mb-3">
                <label for="sel_dis">District</label>
                <select class="form-control" name="sel_dis" id="sel_dis" onchange="getPlace(this.value)" style="border:1px solid black">
                    <option value="sel">---Select District---</option>
                    <?php 
                        $selQry = "select * from tbl_district";
                        $result = $Con->query($selQry);
                        while($data = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $data['district_id'] ?>"><?php echo $data['district_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col-md-4 mb-3">
                <label for="sel_place">Place</label>
                <select class="form-control" name="sel_place" id="sel_place" onchange="getShop(this.value)" style="border:1px solid black">
                    <option value="sel">---Select Place---</option>
                </select>
            </div>
        </div>

        <!-- Placeholder for the shop details -->
        <div id="shop_list" class="text-center mt-4"></div>
    </form>
</div>
</div>
</div>
</div>
</div>
</body>

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
 
<script>
  function getShop(sid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxShop.php?sid=" + sid,
      success: function (html) {

        $("#shop_list").html(html);
      }
    });
 }

</script>
</html>
<?php
include("Foot.php");
?>