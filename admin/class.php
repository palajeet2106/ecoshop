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
    $res= mysqli_query($this->conn, $sql);
    return $res;
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
    $res =  mysqli_query($this->conn, $sql);
    return $res;
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
  function displayUser(){
    $sql = "SELECT * FROM user";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }

  function deleteUser($id){
    $sql = "DELETE FROM user WHERE id = '$id'";
    $res = mysqli_query($this->conn , $sql);
    return $res;
  }


  function editUser($id){
    $sql = "SELECT * FROM user WHERE id ='$id'";
    $res = mysqli_query($this ->conn , $sql);
    $row = mysqli_fetch_assoc($res);
    return $row;

  }
  function updateUser($id){
    $file = $_FILES['pic']['name'];
    if(!empty(basename($file))){
      $folder = "uploads/";
      $path = $folder.basename($file);
    }else{
      $path = $_POST['picdb'];
    }
    move_uploaded_file($_FILES['pic']['tmp_name'] , $path);
    $sql = "UPDATE `user` SET `username`='".$_POST['username']."',`firstName`='".$_POST['firstName']."',`lastName`='".$_POST['lastName']."',`email`='".$_POST['email']."',`contact`='".$_POST['contact']."',
    `pic`='$path',`country`='".$_POST['country']."',`state`='".$_POST['state']."',`city`='".$_POST['city']."', `address`='".$_POST['address']."',`pincode`='".$_POST['pinCode']."',`password`='".md5($_POST['password'])."' WHERE id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }
  function country($cid){
    $selected = '';
    $sql = "SELECT * FROM countries";
    $res = mysqli_query($this ->conn , $sql);
    if(mysqli_num_rows($res) > 0){
      while( $row = mysqli_fetch_assoc($res)){
        if($cid != 0 && $row['id'] == $cid){
          $selected = 'selected';
        }else{
          $selected = '';
        }
      ?>
      <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
      <?php
      }
  }
    return $res;

  }

  function state($cid , $sid){
    $sql = "SELECT * FROM states WHERE country_id = '$cid'";
    $res = mysqli_query($this ->conn , $sql);
    if(mysqli_num_rows($res) > 0){
      ?>
      <option selected disabled>--Select state--</option>
      <?php
      while( $row = mysqli_fetch_assoc($res)){
        if($sid != 0 && $row['id'] == $sid){
          $selected = 'selected';
        }else{
          $selected = '';
        }
      ?>
      <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
      <?php
      }
  }
    return $res;

  }
  function city($sid , $cid){
    $sql = "SELECT * FROM cities WHERE state_id = '$sid'";
    $res = mysqli_query($this ->conn , $sql);
    if(mysqli_num_rows($res) > 0){
      ?>
      <option selected disabled>--Select City--</option>
      <?php
      while( $row = mysqli_fetch_assoc($res)){
        if($cid != 0 && $row['id'] == $cid){
          $selected = 'selected';
        }else{
          $selected = '';
        }
      ?>
      <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
      <?php
      }
  }
    return $res;

  }

  function displayCountry($id){
    $sql = "SELECT * FROM countries WHERE id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
    $row = mysqli_fetch_assoc($res);
    return $row;

  }
  function displayState($id){
    $sql = "SELECT * FROM states WHERE id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
    $row = mysqli_fetch_assoc($res);
    return $row;

  }
  function displayCity($id){
    $sql = "SELECT * FROM cities WHERE id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
    $row = mysqli_fetch_assoc($res);
    return $row;

  }

  function orderDetails(){
    $sql = "SELECT * FROM bill_details ORDER BY id DESC";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }

  function countOrderItems($orderid){
      $sql= "SELECT product_ids FROM bill_details WHERE order_id='$orderid'";
      $res= mysqli_query($this->conn, $sql);
      $row= mysqli_fetch_assoc($res);
      $pids= explode(',', $row['product_ids']);
      return count($pids);


  }

  function getOrderedItemDetails($orderid){
    $sql= "SELECT product_ids FROM bill_details WHERE id='$orderid'";
    $res= mysqli_query($this->conn, $sql);
    $row= mysqli_fetch_assoc($res);
    $pids= explode(',', $row['product_ids']);
    $data=array();

    foreach($pids as $p){
      $sql= "SELECT * FROM product WHERE id='$p'";
      $pro= mysqli_query($this->conn, $sql);
      $data[]= mysqli_fetch_assoc($pro);
    }
    return $data;
  }

  function userDetails($customerid){
    $sql = "SELECT * FROM user WHERE id = '$customerid'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }

  function orderDetailsSuccess(){
    $sql = "SELECT * FROM bill_details WHERE status = 1";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }
  function orderDetailsPending(){
    $sql = "SELECT * FROM bill_details WHERE status = 'pending'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }

   function createAdmin(){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password =md5( $_POST['password']);
    $company = ( $_POST['companyName']);
    $file = $_FILES['logo']['name'];
    $folder = "uploads/";
    $path = $folder.basename($file);
    move_uploaded_file($_FILES['logo']['tmp_name'] , $path);

    $sql = "INSERT INTO `admin`(`companyname`,`username`, `email`, `contact`, `logo`, `address`, `password`) VALUES ('$company','$username' , '$email' , '$contact' , '$path' ,'$address' ,'$password')";
    $res = mysqli_query($this ->conn , $sql);
    return $res;

   }

   function viewAdminDetails(){
    $sql = "SELECT * FROM admin";
    $res = mysqli_query($this->conn , $sql);
    return $res;
   }

   function editAdmin($id){
     $sql = "SELECT * FROM admin WHERE id = '$id'";
     $res = mysqli_query($this ->conn , $sql);
     return $res;

   }

   function updateAdmin($id){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $company = ( $_POST['companyName']);
    $file = $_FILES['logo']['name'];
    if(!empty(basename($file))){
      $folder = "uploads/";
      $path = $folder.basename($file);
    }else{
      $path = $_POST['logoDb'];
    }

    move_uploaded_file($_FILES['logo']['tmp_name'] , $path);

    $sql = "UPDATE `admin` SET `username`='$username',`email`='$email',`contact`='$contact',`logo`='$path',`address`='$address' ,`companyname` = '$company' WHERE  id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
     return $res;

   }


  function adminLogin(){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
    }


  }



$db = new connection();


?>
