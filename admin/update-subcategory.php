<?= include "header.php";
    include "class.php";

    if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="updateSubcategory"){
     $res =  $db ->editsubCategory($_REQUEST['id']);
     $row= mysqli_fetch_assoc($res);


    }
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
                  <input type="text" name="subcategory" class="form-control" value ="<?php echo isset($row) ? $row['name'] : ''; ?>">
                </div>

                <div class="form-group">
                 <select class="form-control" name="category">
                  <option selected disabled>--Select Category--</option>
                  <?php
                       $res=$db->viewCategory();
                       if(mysqli_num_rows($res)>0){
                        $selected="";
                        while($category=mysqli_fetch_assoc($res)){

                          if($category['id']==$row['category_id']){
                            $selected="selected";
                          }

                          ?>


                          <option value="<?php echo $category['id'];?>" <?php echo $selected;?> ><?php echo $category['name'];?></option>

                        <?php
                        }
                       }

                      ?>

                 </select>
                </div>
                <div class="form-group">
                  <?php
                 $active="";
                 $disable="";
                 if($row['status']==1)
                     $active="checked";
                 else{
                     $disable="checked";
                 }
                  ?>
                  <input type="radio" name="status" value="1" <?php echo $active; ?>> Active
                  <input type="radio" name="status" value="0" <?php echo $disable; ?>> Disable
                </div>

                <div class="form-group">
                  <input type="submit" name="btnUpdateSubcategory" class="btn btn-primary" value="Update Subcategory">
                  <input type="hidden" name="sid"  value="<?php echo $row['id']; ?>">
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




