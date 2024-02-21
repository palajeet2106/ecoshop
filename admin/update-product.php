<?= include "header.php";
    include "class.php";
    if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="updateProduct"){
     $data =  $db ->EditProducts($_REQUEST['id']);
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
                  <input type="text" name="productcode" value="<?php echo $data['productCode'];?>"  class="form-control" placeholder="Type Product Code" required>
                </div>
                <div class="form-group">
                  <input type="text" name="productname" class="form-control"placeholder="Type Product Name" required value="<?php echo $data['productName'];?>" >
                  <input type="hidden" name="productId" value="<?php echo $data['id'];?>" >
                </div>

                <div class="form-group">
                  <input type="text" name="producttitle" class="form-control"placeholder="Type Product Title" required value="<?php echo $data['productTitle'];?>" >
                </div>

                <div class="form-group">
                  <input type="text" name="slug" class="form-control"placeholder="Type Product slug" value="<?php echo $data['productSlug'];?>" >
                </div>

                <div class="form-group">
                  <input type="text" name="productprice" class="form-control"placeholder="Type Product Price" value="<?php echo $data['productPrice'];?>" >
                </div>
                <div class="form-group">
                  <input type="number" name="stock" class="form-control"placeholder="Type Product Stock Availaible" required value="<?php echo $data['productStock'];?>" >
                </div>
                <div class="form-group">
                 <select class="form-control" name="category" id="category" required>
                    <option selected disabled>--Select Category--</option>
                   <?php  $db ->displayCategoryName($data['category']); ?>

                 </select>
                </div>
                <div class="form-group">

                 <select class="form-control" name="subcategory" id="subcategory" required>

                    <option selected disabled>--Select SubCategory--</option>
                    <?php  echo $db ->displaySubcategoryName($data['subcategory']); ?>
                 </select>
                </div>

                <div class="form-group">
                  Upload Featured Photo :
                  <img src="<?php echo $data['featuredPhoto']; ?>" width=100 height=100>
                  <input type="file" name="productpic"class="form-control">
                  <input type="hidden" name="productpicdb" value = <?php echo $data['featuredPhoto']; ?>>
                </div>
                <div class="form-group">
                Upload Variation Photos :

                  <?php
                      $pics= explode(',', $data['variationPhoto']);
                      for($i=0; $i<count($pics); $i++){
                        ?>
                          <img src="uploads/<?php echo $pics[$i];?>" width=80 height=80>
                        <?php
                      }

                  ?>

                  <input type="file" name="sliderspics[]"class="form-control" multiple >
                  <input type="hidden" name="sliderpics_db" value = <?php echo $data['variationPhoto']; ?>>
                </div>
                <div class="form-group">
                 <textarea class="form-control" rows=8  name="description" placeholder="Type Description...">
                 <?php echo $data['description']; ?>
                 </textarea>
                </div>
                <div class="form-group">
                  <?php
                  $active = '';
                  $disable = '';
                  if($data['productStatus'] == 1){
                    $active = "checked";
                  }else{
                    $disable = "checked";
                  }

                  ?>
                  <input type="radio" name="status" value=1 <?php echo $active; ?> > Active
                  <input type="radio" name="status" value=0 <?php echo $disable; ?> > Disable
                </div>
                <div class="form-group">
                  <input type="submit" name="updateProduct" class="btn btn-primary" value="Update Product">
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
        data: {cid:categoryid, change:'subcategory'},
        success: function(res){

          $("#subcategory").html(res);
        }
      })

    })

  })
</script>



