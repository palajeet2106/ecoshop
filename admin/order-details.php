<?php include "header.php";
    include "class.php";
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
              <th>customerId</th>
              <th>Qty</th>
              <th>Payment Mode</th>
              <th>CartId</th>
              <th>Total Amount</th>
              <th>Payment Status</th>
              <th>Order Date</th>
             </tr>
      </thead>
        <tbody>
          <?php

          $res = $db ->orderDetails();
          if(mysqli_num_rows($res) > 0){
            $sn = 1;
            while($row = mysqli_fetch_assoc($res)){
              ?>
              <tr>
                <td>
                  <?php echo $sn; ?>
                </td>
                <td>
                  <a href="order-item-details.php?id=<?php echo $row['id'];?>&orderid=<?php echo $row['order_id'];?>" class="btn btn-warning text-white">
                  <?php echo $row['order_id']; ?></a>
                </td>
                <td>
                  <?php echo $row['userid']; ?>
                </td>
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
