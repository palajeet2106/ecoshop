<?php

include("class.php");
if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="editcat"){
  $res= $db->editCategory($_REQUEST['id']);
  $data= mysqli_fetch_assoc($res);
}

?>


<?= include "header.php"; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
              <div class="card-title">Category Creation Form</div>
            </div>
            <div class="card-body">
              <form method="post" action="function.php" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" name="category" value="<?php echo isset($data) ? $data['name'] : '' ;?>" class="form-control"placeholder="Type Category" required>
                </div>

                <div class="form-group">
                  Upload Featured Photo :
                  <a href="<?php echo isset($data)? $data['pic']:''; ?>"><?php echo isset($data)? $data['pic']:''; ?></a>
                  <input type="file" name="categorypic" class="form-control">
                  <input type="hidden" name="categorypicdb" value= "<?php echo isset($data)? $data['pic']:''; ?>">
                </div>

                <div class="form-group">
                  <?php
                  $active="";
                  $disable="";
                  if($data['status']==1)
                      $active="checked";
                  else{
                      $disable="checked";
                  }?>

                  <input type="radio" name="status" value=1 <?php echo $active;?> > Active
                  <input type="radio" name="status" value=0 <?php echo $disable ;?> > Disable
                </div>

                <div class="form-group">
                  <input type="hidden" name="cid" value="<?php echo isset($data)? $data['id']:''; ?>">
                  <input type="submit" name="btnupdatecategory" class="btn btn-primary" value="Update Category">
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




