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
              <div class="card-title">Admin Creation Form</div>
            </div>
            <div class="card-body">
              <form method="post" action="function.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Username :</label>
                  <input type="text" name="username" class="form-control"placeholder="Enter username" >
                  <input type="hidden" name="adminId" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Email :</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter email"  >
                </div>

                <div class="form-group">
                <label for="">Contact :</label>
                  <input type="number" name="contact" class="form-control"placeholder="Enter contact" >
                </div>
                <div class="form-group">
                <label for="">Company Name :</label>
                  <input type="text" name="companyName" class="form-control"placeholder="Enter Company Name" >
                </div>

                <div class="form-group">
                <label for="">Image :</label>

                  <input type="file" name="logo" class="form-control-file" accept="image/*">


                </div>
                <div class="form-group">
                <label for="">Address :</label>
                 <textarea class="form-control" rows=6  name="address" placeholder="Type Address...">

                 </textarea>
                </div>
                <div class="form-group">
                <label for="">Password :</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                  <input type="submit" name="submitAdmin" class="btn btn-primary" value="submit">
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





