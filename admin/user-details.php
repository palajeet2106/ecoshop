<?php include "header.php";
    // include "class.php";



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
              <th>Image</th>
              <th>Username</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
             </tr>
      </thead>
        <tbody>
        <?php

          $res = $db ->userDetails($_REQUEST['id']);
           if(mysqli_num_rows($res) >0){
            while($row = mysqli_fetch_assoc($res)){
              $country = $db ->displayCountry($row['country']);
              $state = $db ->displayState($row['state']);
              $city = $db ->displayCity($row['city']);
              ?>
              <tr>
              <td>
                <img src="<?php echo $row['pic']; ?>" alt="" height="100" width="100">
              </td>
              <td>
                <?php echo $row['username']; ?>
              </td>
              <td>
                <?php echo $row['firstName']. " ". $row['lastName']; ?>
              </td>
              <td>
                <?php echo $row['email']; ?>
              </td>
              <td>
                <?php echo $row['address']." ". $country['name']. " ".$state['name']. " ".$city['name']. " ".$row['pincode']; ?>
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
