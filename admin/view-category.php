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
            <th>Pic</th>
            <th>Name</th>
            <th>Status</th>
            <th>View/Edit</th>
          </tr>
        </thead>

        <tbody>
            <?php
                $res= $db->viewCategory();
                if(mysqli_num_rows($res)>0){
                  $sn=1;
                  while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                      <td><?php echo $sn;?></td>
                      <td><img src="<?php echo $row['pic'];?>" width=100 height=100></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo ($row['status']==1)? "Active" : "Disable" ;?></td>
                      <td>
                        <a href="function.php?id=<?php echo $row['id'];?>&cmd=delcat" class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete Record?')">Delete</a>

                        <a href="updatecategory.php?id=<?php echo $row['id'];?>&cmd=editcat" class="btn btn-success">Edit</a>
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
