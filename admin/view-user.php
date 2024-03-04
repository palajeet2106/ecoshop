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
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $res = $db ->displayUser();
        if(mysqli_num_rows($res) > 0){
          $sn = 1;
          while($row = mysqli_fetch_assoc($res)){
            $country = $db ->displayCountry($row['country']);
            $state = $db ->displayState($row['state']);
            $city = $db ->displayCity($row['city']);
            ?>
            <tr>
              <td>
                <?php echo $sn; ?>
              </td>
              <td>
                <?php echo $row['username']; ?>
              </td>
              <td>
                <img src="<?php echo $row['pic']; ?>" alt="pic" height="80" width="80">
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
              <?php echo $row['address']." ". $row['pincode']; ?>
              </td>
              <td>
              <?php echo $country['name']." ". $state['name']." ". $city['name']; ?>
              </td>
              <!-- <td>
                  <a href="function.php?id=<?php //echo $row['id']; ?>&cmd=delete" class = "btn btn-danger">Delete</a>
                  <a href="update-user.php?id=<?php //echo $row['id']; ?>&cmd=updateUser" class = "btn btn-success">Edit</a>
              </td> -->

              <td><?php echo ($row['status'] == 1)? 'Active' : 'Disable'; ?></td>

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
