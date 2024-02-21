<?php
 include ("class.php");

if(isset($_POST['btnaddcategory'])){
  if($db->addCategory()){
    ?>
      <script>
        alert("Category Added");
        window.location.href="add-category.php";
      </script>

<?php
  }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="delcat"){
  if($db->deleteCategory($_REQUEST['id'])){
    ?>
      <script>
        alert("Category Deleted");
        window.location.href="view-category.php";
      </script>

<?php
  }
}

if(isset($_POST['btnupdatecategory'])){
  if($db->updateCategory($_POST['cid'])){
    ?>
      <script>
        alert("Category Updated");
        window.location.href="view-category.php";
      </script>

<?php
  }
}

if(isset($_POST['btnaddsubcategory'])){
  if($db->addsubCategory()){
    ?>
      <script>
        alert("Subcategory Added");
        window.location.href="add-subcategory.php";
      </script>

<?php
  }
}


if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="deleteSubcategory"){
  if($db->deletesubCategory($_REQUEST['id'])){
    ?>
      <script>
        alert("subcategory Deleted");
        window.location.href="view-subcategory.php";
      </script>

<?php
  }
}
if(isset($_POST['btnUpdateSubcategory'])){
  if($db->updatesubCategory($_POST['sid'])){
    ?>
      <script>
        alert("Subcategory Updated");
        window.location.href="view-subcategory.php";
      </script>

<?php
  }
}

if(isset($_POST['categoryid'])){
  $res= $db->Subcategorylist($_POST['categoryid']);
  if(mysqli_num_rows($res)>0){
    ?><option selected disabled>--Select SubCategory--</option><?php
    while($row=mysqli_fetch_assoc($res)){
      ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

<?php
    }
  }
}

if(isset($_POST['change'])){
  $cid= $_POST['cid'];
  $res= $db->changeSubcategory($cid);
  if(mysqli_num_rows($res)>0){
    ?><option selected disabled>--Select SubCategory--</option><?php
    while($row=mysqli_fetch_assoc($res)){
      ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

<?php
    }
  }
}




if(isset($_POST['btnaddproduct'])){
  if($db->addProduct()){
    ?>
      <script>
        alert("Product Added");
        window.location.href="view-product.php";
      </script>

<?php
  }
}
if(isset($_POST['updateProduct'])){
  if($db->updateProducts($_POST['productId'])){
    ?>
      <script>
        alert("Product Updated");
        window.location.href="view-product.php";
      </script>

<?php
  }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="deleteProduct"){
  if($db->deleteProduct($_REQUEST['id'])){
    ?>
      <script>
        alert("Deleted Deleted");
        window.location.href="view-product.php";
      </script>
<?php
  }
}














?>
