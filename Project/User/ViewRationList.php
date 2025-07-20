<?php
include("../Assets/Connection/connection.php");
session_start();

include("Head.php");


$ration_id = $_GET['cid'];
$user_id = $_SESSION['uid']; // Assuming user_id is stored in session
$currentMonth = date("Y-m");

// Check if the user has already booked this month
$bookingCheckQuery = "SELECT * FROM tbl_booking 
                      WHERE ration_id = $ration_id 
                      AND user_id = $user_id 
                      AND booking_date LIKE '$currentMonth%'";
$bookingResult = $Con->query($bookingCheckQuery);
$bookingExists = $bookingResult->num_rows > 0;

// Retrieve the user's card_id
$userCardQuery = "SELECT card_id FROM tbl_user WHERE user_id = $user_id";
$userCardResult = $Con->query($userCardQuery);
$userCard = ($userCardResult && $userCardResult->num_rows > 0) ? $userCardResult->fetch_assoc()['card_id'] : null;

// Retrieve the expected card_id for the ration shop or product (replace `expected_card_id` as necessary)
$expectedCardQuery = "SELECT card_id as expected_card_id FROM tbl_ration WHERE ration_id = $ration_id";
$expectedCardResult = $Con->query($expectedCardQuery);
$expectedCard = ($expectedCardResult && $expectedCardResult->num_rows > 0) ? $expectedCardResult->fetch_assoc()['expected_card_id'] : null;

// Check if the card IDs match
$cardMatch = $userCard === $expectedCard;
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
          <h3>Ration Product's</h3>

          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th>SlNo</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $check = 0;
              $selQry = "select *from tbl_rationlist r inner join tbl_rationproduct rp on r.product_id = rp.product_id inner join tbl_product p on rp.product_id = p.product_id where rp.rationshop_id = " . $_GET['rid'] . " and r.ration_id = " . $_GET['cid'];
              $result = $Con->query($selQry);
              $i = 0;
              $total = 0;
              while ($data = $result->fetch_assoc()) {
                $i++;
                $total += (int) $data['product_price'];
                ?>


                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $data['product_name'] ?></td>
                  <td><?php echo $data['product_qty'] ?></td>
                  <td><?php echo $data['product_price'] ?></td>
                  <td><?php
                  if ($data['rationproduct_status'] == 1) {
                    echo "Available";

                  } else if ($data["rationproduct_status"] == 2) {
                    echo "Not Available";
                    $check++;
                  }
                  ?>
                  </td>
                </tr>
              </tbody>
              <?php
              }
              ?>
          </table>

          <br />
          <br />

          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <td colspan="2" class="bg-danger " style="border-radius:15px" align="center">
                  <?php if (!$bookingExists && $cardMatch && $check == 0): ?>
                    <a class="btn btn-primary"
                      href="Payment.php?rid=<?php echo $ration_id ?>&tot=<?php echo $total ?>">Book Now</a>
                  <?php else: ?>
                    <p style="color: white; text-align: center; font-size:22px">
                      <?php
                      if ($bookingExists) {
                        echo "You have already booked for this month.";
                      } elseif (!$cardMatch) {
                        echo "Your card ID does not match. Booking is not allowed.";
                      } elseif ($check != 0) {
                        echo "There are some products are unavailable.";
                      }
                      ?>
                    </p>
                  <?php endif; ?>
                </td>
              </tr>
              </thead>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php
include("Foot.php");
?>