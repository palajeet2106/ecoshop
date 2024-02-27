<?= include "header.php";
    include "class.php";
    if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="updateUser"){
     $row =  $db ->editUser($_REQUEST['id']);
    }
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Products</h1>
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
      <div class="row">
        <div class="col-12 col-lg-3"></div>
        <div class="col-12 col-lg-6">
          <div class="card shadow">
            <div class="card-header">
              <div class="card-title">User Correction Form</div>
            </div>
            <div class="card-body">
            <form action="function.php" method="post" enctype="multipart/form-data">
                        <div class="review-form box-shadows">
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="username" class="form-label">Username*</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="firstName" class="form-label">First Name*</label>
                                    <input type="text" name="firstName" class="form-control" value="<?php echo $row['firstName']; ?>">
                                </div>
                                <div class="review-form-name">
                                    <label for="lastName" class="form-label">Last Name*</label>
                                    <input type="text" name="lastName" class="form-control" value="<?php echo $row['lastName']; ?>">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="userId" class="form-control" value="<?php echo $row['id']; ?>">
                                </div>
                                <div class="review-form-name">
                                    <label for="contact" class="form-label">Contact*</label>
                                    <input type="number" name="contact" class="form-control" value="<?php echo $row['contact']; ?>">
                                </div>
                            </div>
                            <div class=" account-inner-form">
                                <div class="review-form-name">
                                    <label for="password" class="form-label">Password*</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $row['password'];  ?>">
                                </div>
                                <div class="review-form-name">
                                    <label for="confirmPassword" class="form-label">Retype Password*</label>
                                    <input type="password" name="confirmPassword" class="form-control" value="<?php echo $row['password'];  ?>">
                                </div>
                            </div>
                            </div>
                            <div class="login-btn text-center">
                                <!-- <a href="#" class="shop-btn">Create an Account</a> -->
                                <input type="submit" name="update" class="btn btn-warning mt-3" value="User Update">
                            </div>
                        </div>
                        </form>
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
<script>
  $(function(){
    $("#category").change(function(){
      var categoryid= $(this).val()

      $.ajax({
        type: "POST",
        url: "function.php",
        data: {cid:categoryid, change:'subcategory'},
        success: function(res){

          $("#subcategory").html(res);
        }
      })

    })

  })
</script>



