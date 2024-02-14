<?= include "header.php";
    include "class.php";
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
              <li class="breadcrumb-item active">Products</li>
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
              <div class="card-title">Product Creation Form</div>
            </div>
            <div class="card-body">
              <form method="post" action="function.php" enctype="multipart/form-data">

              <div class="form-group">
                  <input type="text" name="productcode" value="<?php echo 'PRO'.rand(111111,999999);?>"  class="form-control" placeholder="Type Product Code" required>
                </div>
                <div class="form-group">
                  <input type="text" name="productname" class="form-control"placeholder="Type Product Name" required>
                </div>

                <div class="form-group">
                  <input type="text" name="producttitle" class="form-control"placeholder="Type Product Title" required>
                </div>

                <div class="form-group">
                  <input type="text" name="slug" class="form-control"placeholder="Type Product slug">
                </div>

                <div class="form-group">
                  <input type="text" name="productprice" class="form-control"placeholder="Type Product Price" required>
                </div>
                <div class="form-group">
                  <input type="number" name="stock" class="form-control"placeholder="Type Product Stock Availaible" required>
                </div>
                <div class="form-group">
                 <select class="form-control" name="category" id="category" required>
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
                 <select class="form-control" name="subcategory" id="subcategory"></select>
                </div>
                <div class="form-group">
                  Upload Featured Photo :
                  <input type="file" name="productpic"class="form-control" required>
                </div>
                <div class="form-group">
                Upload Variation Photos :
                  <input type="file" name="sliderspics[]"class="form-control" multiple required>
                </div>
                <div class="form-group">
                 <textarea class="form-control" rows=8  name="description" placeholder="Type Description..."></textarea>
                </div>
                <div class="form-group">
                  <input type="radio" name="status" value=1 > Active
                  <input type="radio" name="status" value=0 > Disable
                </div>
                <div class="form-group">
                  <input type="submit" name="btnaddproduct" class="btn btn-primary" value="Add Product">
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
<script>
  $(function(){
    $("#category").change(function(){
      var categoryid= $(this).val()
      $.ajax({
        type: "POST",
        url: "function.php",
        data: {categoryid:categoryid},
        success: function(res){

          $("#subcategory").html(res);
        }
      })

    })
  })
</script>




