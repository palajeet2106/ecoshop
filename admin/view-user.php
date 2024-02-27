<?= include "header.php";
    include "class.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Details</h1>
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
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $res = $db ->displayUser();
        if(mysqli_num_rows($res) > 0){
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
                <?php echo $row['firstName'] ." ". $row['lastName'];  ?>
              </td>
              <td>
              <?php echo $row['email']; ?>
              </td>
              <td>
              <?php echo $row['contact']; ?>
              </td>
              <td>
                  <a href="function.php?id=<?php echo $row['id']; ?>&cmd=delete" class = "btn btn-danger">Delete</a>
                  <a href="update-user.php?id=<?php echo $row['id']; ?>&cmd=updateUser" class = "btn btn-success">Edit</a>
              </td>
            </tr>
            <?php
          $sn++;}
        }

        ?>


        <tbody>

        </tbody>
      </table>
    </div>


</div>


<?= include "footer.php";?>
