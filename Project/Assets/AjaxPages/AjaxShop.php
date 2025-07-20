<?php include("../Connection/Connection.php"); ?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-13">
      <div class="table-wrapper">
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>SlNo</th>
            <th>Shop Name</th>
            <th>Number</th>
            <th>Action</th>
          </tr>
        </thead>

              <tbody>
                  <?php

                    $selQry = "select *from tbl_rationshop where place_id='" . $_GET["sid"] . "'";
                    $result = $Con->query($selQry);
                    $i = 0;
                    while ($data = $result->fetch_assoc()) {
                      $i++;

                  ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $data['rationshop_name'] ?></td>
                      <td><?php echo $data['rationshop_number'] ?></td>
                      <td>
                        <a class="btn btn-primary" href="ViewRation.php?rid=<?php echo $data['rationshop_id'] ?>">Ration</a>
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
