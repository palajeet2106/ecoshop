<?= include "header.php";
    // include "class.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Subcategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
              <li class="breadcrumb-item active">Subcategory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6">
          <div class="card shadow">
            <div class="card-header">
              <div class="card-title">Subcategory Creation Form</div>
            </div>
            <div class="card-body">
              <form method="post" action="function.php">
                <div class="form-group">
                  <input type="text" name="subcategory" class="form-control"placeholder="Type Subcategory" required>
                </div>

                <div class="form-group">
                 <select class="form-control" name="category">
                  <option selected disabled>--Select Category--</option>
                  <?php
                       $res=$db->viewCategory();
                       if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                          ?>
                          <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

                        <?php
                        }
                       }

                      ?>
                 </select>
                </div>
                <div class="form-group">
                  <input type="radio" name="status" value=1 > Active
                  <input type="radio" name="status" value=0 > Disable
                </div>

                <div class="form-group">
                  <input type="submit" name="btnaddsubcategory" class="btn btn-primary" value="Add Subcategory">
                </div>




                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-3"></div>
      </div>
    </div>




</div>

<?= include "footer.php";?>




