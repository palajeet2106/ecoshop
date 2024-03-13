<?= include "header.php";
    // include "class.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Details</h1>
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
      <table class="table table-bordered" id="example1">
        <thead>
          <tr>
            <th>Sno</th>
            <th>Username</th>
            <th>Image</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Edit / Update</th>
          </tr>
        </thead>
        <tbody>
          <?php
           $res = $db ->viewAdminDetails();
           if(mysqli_num_rows($res) >0){
            $sn = 1;
            while($row = mysqli_fetch_assoc($res)){
              ?>
              <tr>
                <td>
                  <?php echo $sn; ?>
                </td>
                <td>
                  <?php echo $row['username']; ?>
                </td>
                <td>
                <img src="<?php echo $row['logo']; ?>" alt="image" width="80" height="80">
                </td>
                <td>
                <?php echo $row['email']; ?>
                </td>
                <td>
                <?php echo $row['contact']; ?>
                </td>
                <td>
                <?php echo $row['companyname']; ?>
                </td>
                <td>
                <?php echo $row['address']; ?>
                </td>
                <td>
                  <a href="update-admin.php?id=<?php echo $row['id'];  ?>&cmd=adminUpdate" class = "btn btn-warning">Edit</a>
                  <a href="function.php?id=<?php echo $row['id'];  ?>&cmd=deleteAdmin" class = "btn btn-danger">Delete</a>
                </td>
              </tr>
              <?php
            }
           }

          ?>
        </tbody>
      </table>
    </div>


</div>


<?= include "footer.php";?>
