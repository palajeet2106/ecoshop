<?php

class connection
{
  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "root", "", "ecomproject");
    // if($this->conn){
    //   echo "Connected";
    // }
  }

  function addCategory()
  {

    $folder = "Uploads/";
    $file = $_FILES['categorypic']['name'];
    $path = $folder . basename($file);
    move_uploaded_file($_FILES['categorypic']['tmp_name'], $path);

    $sql = "INSERT INTO `category`(`name`, `pic`, `status`) VALUES ('" . $_POST['category'] . "', '$path', '" . $_POST['status'] . "')";

    return mysqli_query($this->conn, $sql);
  }

  function viewCategory()
  {

    $sql = "SELECT * FROM category";
    return mysqli_query($this->conn, $sql);
  }

  function deleteCategory($id)
  {
    $sql = "DELETE FROM category WHERE id='$id'";
    return mysqli_query($this->conn, $sql);
  }

  function editCategory($id)
  {
    $sql = "SELECT * FROM category where id='$id'";
    return mysqli_query($this->conn, $sql);
  }

  function updateCategory($id)
  {
    $folder = "Uploads/";
    $file = $_FILES['categorypic']['name'];

    if (!empty(basename($file))) {
      $path = $folder . basename($file);
      move_uploaded_file($_FILES['categorypic']['tmp_name'], $path);
    } else {
      $path = $_POST['categorypicdb'];
    }

    $sql = "UPDATE `category` SET `name`='" . $_POST['category'] . "',`pic`='$path',`status`='" . $_POST['status'] . "' WHERE id='$id'";

    return mysqli_query($this->conn, $sql);
  }

  // Subcategory Functions


  function addsubCategory()
  {

    $sql = "INSERT INTO `subcategory`(`name`, `category_id`, `status`) VALUES ('" . $_POST['subcategory'] . "', '" . $_POST['category'] . "', '" . $_POST['status'] . "')";

    return mysqli_query($this->conn, $sql);
  }

  function viewsubCategory($categoryId)
  {
    $sql= ($categoryId==0) ? "SELECT * FROM subcategory" : "SELECT * FROM subcategory WHERE category_id='$categoryId'"  ;
    return mysqli_query($this->conn, $sql);
  }

  function deletesubCategory($id)
  {
    $sql = "DELETE FROM subcategory WHERE id='$id'";
    return mysqli_query($this->conn, $sql);
  }

  function editsubCategory($id)
  {
    $sql = "SELECT * FROM subcategory where id='$id'";
    return  mysqli_query($this->conn, $sql);
    // $row = mysqli_fetch_assoc($res);
    // return $row;
  }

  function updatesubCategory($id)
  {
    $sql = "UPDATE `subcategory` SET `name`='" . $_POST['subcategory'] . "',`category_id`='" . $_POST['category'] . "' ,`status`='" . $_POST['status'] . "' WHERE id='$id'";
    return mysqli_query($this->conn, $sql);
  }

  function Subcategorylist($category)
  {
    $sql = "SELECT * FROM subcategory WHERE category_id='$category'";
    return mysqli_query($this->conn, $sql);
  }


  function addProduct()
  {

    // single image upload
    $folder = "Uploads/";
    $file = $_FILES['productpic']['name'];
    $path = $folder . basename($file);
    move_uploaded_file($_FILES['productpic']['tmp_name'], $path);


    // Multiple Image Upload

    $sliderfiles = $_FILES['sliderspics']['name'];
    $filesstr = implode(',', $sliderfiles);
    for ($i = 0; $i < count($sliderfiles); $i++) {
      $filespath = $folder . basename($sliderfiles[$i]);
      move_uploaded_file($_FILES['sliderspics']['tmp_name'][$i], $filespath);
    }

    $sql = "INSERT INTO `product`(`productCode`, `productName`, `productTitle`, `productSlug`, `productPrice`, `productStock`, `category`, `subcategory`, `featuredPhoto`, `variationPhoto`, `description`, `productStatus`) VALUES ('" . $_POST['productcode'] . "', '" . $_POST['productname'] . "', '" . $_POST['producttitle'] . "', '" . $_POST['slug'] . "', '" . $_POST['productprice'] . "', '" . $_POST['stock'] . "', '" . $_POST['category'] . "', '" . $_POST['subcategory'] . "', '$path', '$filesstr', '" . $_POST['description'] . "', '" . $_POST['status'] . "')";
    return mysqli_query($this->conn, $sql);
  }

  function viewProducts()
  {
    $sql = "SELECT * FROM product";
    return mysqli_query($this->conn, $sql);
  }

  function EditProducts($id)
  {
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $res = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($res);
    return $row;
  }

  function updateProducts($id)
  {
    $folder = "Uploads/";
// single image update
    $file = $_FILES['productpic']['name'];
    if (!empty(basename($file))) {

      $path = $folder . basename($file);
    } else {
      $path = $_POST['productpicdb'];
    }
    move_uploaded_file($_FILES['productpic']['tmp_name'], $path);


  // mulitple image update

    $sliderfiles = $_FILES['sliderspics']['name'];

    $filesstr = implode(',', $sliderfiles);

    if(!empty($sliderfiles[0])){
      for ($i = 0; $i < count($sliderfiles); $i++) {
          $filespath = $folder.basename($sliderfiles[$i]);
          move_uploaded_file($_FILES['sliderspics']['tmp_name'][$i], $filespath);


      }
    }else{
        $filesstr= $_POST['sliderpics_db'];

    }


    $sql = "UPDATE `product` SET `productCode`='" . $_POST['productcode'] . "',`productName`='" . $_POST['productname'] . "',`productTitle`='" . $_POST['producttitle'] . "',`productSlug`='" . $_POST['slug'] . "',`productPrice`='" . $_POST['productprice'] . "',`productStock`='" . $_POST['stock'] . "',`category`='" . $_POST['category'] . "',`subcategory`='" . $_POST['subcategory'] . "',`featuredPhoto`='$path',`variationPhoto`='$filesstr',`description`='" . $_POST['description'] . "',`productStatus`='" . $_POST['status'] . "' WHERE id = '$id'";
    $res = mysqli_query($this->conn, $sql);
    return $res;
  }

  function deleteProduct($id)
  {
    $sql = "DELETE FROM product WHERE id = '$id'";
    $res = mysqli_query($this->conn, $sql);
    return $res;
  }

  // update category for product table

  function displayCategoryName($categoryid){
    $selected = '';
    $sql = "SELECT * FROM category ";
    $res = mysqli_query($this ->conn , $sql);
    if(mysqli_num_rows($res)){
      while($row = mysqli_fetch_assoc($res)){
        if($categoryid != 0 && $row['id'] == $categoryid){
          $selected = 'selected';
        }else{
          $selected = '';
        }
        ?>
        <option value="<?php echo $row['id'] ?>"<?php echo $selected; ?>><?php echo $row['name']; ?></option>
        <?php

      }
    }

  }
  function displaySubcategoryName($subcategoryid){
    $selected = '';
    $sql = "SELECT * FROM subcategory WHERE id = '$subcategoryid'";
    $res = mysqli_query($this ->conn , $sql);
    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_assoc($res)){
        if($row['id'] == $subcategoryid){
          $selected = 'selected';
        }else{
          $selected = '';
        }
        ?>
        <option value="<?php echo $row['id'] ?>"<?php echo $selected; ?>><?php echo $row['name']; ?></option>
        <?php

      }
    }

  }

// get subcategory according to category
  function changeSubcategory($cid){
    $sql = "SELECT * FROM subcategory WHERE category_id = '$cid'";
    $res = mysqli_query($this ->conn , $sql);
    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_assoc($res)){

        ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
        <?php

      }
    }
  }



}

$db = new connection();


?>