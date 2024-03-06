<?php include "header.php";
    include "class.php";

    if(isset($_REQUEST['id']) && $_REQUEST['orderid']){
      $records= $db->getOrderedItemDetails($_REQUEST['id']);
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order Details for <?php echo $_REQUEST['orderid']; ?></h1>
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
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product Image</th>
                    <th>Product Code</th>
                    <th>Product Price</th>
                  </tr>
                </thead>

                <tbody>
                  <?php

                   foreach($records as $r){
                    ?>
                    <tr>
                      <td><img src="<?php echo $r['featuredPhoto'];?>" width=100px height=100px></td>
                      <td><?php echo $r['productCode'];?></td>
                      <td><?php echo $r['productPrice'];?></td>
                    </tr>

                    <?php
                   }



?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div>
    </div>






</div>

<?php include("footer.php");?>
