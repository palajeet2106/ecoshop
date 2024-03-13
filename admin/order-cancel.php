<?php include "header.php";
    // include "class.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
      <table class="table table-bordered" id="example1">
      <thead>
             <tr>
              <th>Sno</th>
              <th>OrderId</th>
              <th>Customer Id</th>
              <th>User Id</th>
              <th>Qty</th>
              <th>Payment Mode</th>
              <th>CartId</th>
              <th>Total Amount</th>
              <th>Payment Status</th>
              <th>Order Date</th>
              <th>Order Status</th>
             </tr>
      </thead>
        <tbody>
          <?php

          $res = $db ->orderDetailsPending();
          if(mysqli_num_rows($res) > 0){
            $sn = 1;
            while($row = mysqli_fetch_assoc($res)){
              ?>
              <tr>
                <td>
                  <?php echo $sn; ?>
                </td>
                <td>
                  <a class="btn btn-warning text-white" href="#" data-target="#orderModal<?php echo $row['id'];?>" data-toggle="modal"><?php echo $row['order_id']; ?></a>
                  <?php include "orderModal.php";?>
                </td>
                <td>
                  <a href="#" data-target="#userModal<?php echo $row['id'];?>" data-toggle="modal" class="btn btn-warning text-white"><?php echo $row['customerid']; ?></a>
                  <?php include "CustomerModal.php";?>
                </td>
                 <td><?php echo $row['userid']; ?></td>

                <td>
                    <?php echo $db->countOrderItems($row['order_id']);?>
                </td>
                <td>
                  <?php echo $row['payment_mode']; ?>
                </td>
                <td>
                  <?php echo $row['cartid']; ?>
                </td>
                <td>
                  <?php echo "₹ " . $row['totalamount']; ?>
                </td>
                <td>
                  <?php echo $row['payment_status']; ?>
                </td>
                <td>
                  <?php echo $row['order_date']; ?>
                </td>
                <td class="bg-danger">
                  <?php echo (($row['status']== "pending") ? "pending" : "success"); ?>
                </td>
              </tr>
              <?php
           $sn++; }
          }

          ?>

        </tbody>
      </table>
    </div>


</div>


<?= include "footer.php";?>
