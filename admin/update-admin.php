<?= include "header.php";
    // include "class.php";

    if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == 'adminUpdate'){
      $id = $_REQUEST['id'];
      $res = $db ->editAdmin($id);
      $row = mysqli_fetch_assoc($res);
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
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
              <div class="card-title">Admin Correction Form</div>
            </div>
            <div class="card-body">
              <form method="post" action="function.php" enctype="multipart/form-data">


                <div class="form-group">
                  <label for="">Username :</label>
                  <input type="text" name="username" class="form-control"placeholder="Type username" value="<?php echo $row['username']; ?>">
                  <input type="hidden" name="adminId" class="form-control" value="<?php echo $row['id']; ?>">
                </div>

                <div class="form-group">
                <label for="">Email :</label>
                  <input type="email" name="email" class="form-control"  value="<?php echo $row['email']; ?>">
                </div>

                <div class="form-group">
                <label for="">Contact :</label>
                  <input type="number" name="contact" class="form-control" value="<?php echo $row['contact']; ?>">
                </div>
                <div class="form-group">
                <label for="">Company Name :</label>
                  <input type="text" name="companyName" class="form-control" value = "<?php echo $row['companyname']; ?>">
                </div>

                <div class="form-group">
                <label for="">Image :</label>
                <a href="<?php echo $row['logo']; ?>"><?php echo $row['logo']; ?></a>
                  <input type="file" name="logo" class="form-control-file" accept="image/*">
                  <input type="hidden" name="logoDb" class="form-control-file" value="<?php echo $row['logo']; ?>">
                  <img src="<?php echo $row['logo']; ?>" alt="image" height="100" width="100">
                </div>
                <div class="form-group">
                <label for="">Address :</label>
                 <textarea class="form-control" rows=6  name="address" placeholder="Type Address...">
                 <?php echo $row['address']; ?>
                 </textarea>
                </div>
                <div class="form-group">
                <label for="">Password :</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password" >
                </div>
                <div class="form-group">
                  <input type="submit" name="updateAdmin" class="btn btn-primary" value="Update">
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





