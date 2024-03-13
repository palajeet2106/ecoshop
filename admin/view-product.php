<?= include "header.php";
    // include "class.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
            <th>Pic/Name</th>
            <th>Code</th>
            <th>MRP</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Status</th>
            <th>Edit / Update</th>
          </tr>
        </thead>

        <tbody>
          <?php
              $res=$db->viewProducts();
              if(mysqli_num_rows($res)>0){
                $sn=1;
                while($row=mysqli_fetch_assoc($res)){?>
                  <tr>
                    <td><?php echo $sn;?></td>
                    <td><?php echo $row['productName'];?><br><img src="<?php echo $row['featuredPhoto'];?>" width=100 height=100></td>
                    <td><?php echo $row['productCode'];?></td>
                    <td><?php echo $row['productPrice'];?></td>
                    <td><?php echo $row['productStock'];?></td>
                    <td><?php echo mysqli_fetch_assoc($db->editCategory($row['category']))['name']; ?></td>
                    <td><?php echo mysqli_fetch_assoc($db->editsubCategory($row['subcategory']))['name']; ?></td>
                    <td><?php echo ($row['productStatus']==1)? 'Active' : 'Disable'; ?></td>
                    <td>
                      <a href="update-product.php?id=<?php echo $row['id'];?>&cmd=updateProduct" class = "btn btn-success">Edit</a>
                      <a href="function.php?id=<?php echo $row['id'];?>&cmd=deleteProduct" class = "btn btn-danger">Delete</a>
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
