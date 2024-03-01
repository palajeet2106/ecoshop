  <?php

class connection{
  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "root", "", "ecomproject");
    session_start();
  }

  

  function viewCategory()
  {

    $sql = "SELECT * FROM category";
    return mysqli_query($this->conn, $sql);
  }


  function viewsubCategory($categoryId)
  {
    $sql= ($categoryId==0) ? "SELECT * FROM subcategory" : "SELECT * FROM subcategory WHERE category_id='$categoryId'"  ;
    return mysqli_query($this->conn, $sql);
  }

  

  function Subcategorylist($category)
  {
    $sql = "SELECT * FROM subcategory WHERE category_id='$category'";
    return mysqli_query($this->conn, $sql);
  }


  

  function viewProducts($id)
  {
    $sql = "SELECT * FROM product WHERE id= '$id'";
    return mysqli_query($this->conn, $sql);
  }
  function ProductsDetails()
  {
    $sql = "SELECT * FROM product limit 8";
    return mysqli_query($this->conn, $sql);
  }
  function popularSales()
  {
    $sql = "SELECT * FROM product limit 9";
    return mysqli_query($this->conn, $sql);
  }

  function editCategory($id)
  {
    $sql = "SELECT * FROM category where id='$id'";
    return mysqli_query($this->conn, $sql);
  }

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

  function ProductsDetailsByCategory($categoryname){
    $product=array();
    $sql= "SELECT * FROM category WHERE name LIKE '%$categoryname%'";
    $res= mysqli_query($this->conn, $sql);
    if(mysqli_num_rows($res)>0){
      while($row=mysqli_fetch_assoc($res)){

           $productres= $this->getProductsByCategory($row['id']);
           if(mysqli_num_rows($productres)>0){
            while($data= mysqli_fetch_assoc($productres)){
              $product[]= $data;
            }
           }
      }
    }
    return $product;

  }

  function getProductsByCategory($cid){
    $sql= "SELECT * FROM product WHERE category='$cid' LIMIT 8";
    $res= mysqli_query($this->conn, $sql);
    return $res;
  }

  function createUser(){
    $sql = "INSERT INTO `user`(`username`,`firstName`, `lastName`, `email`, `contact`, `password`) VALUES ('".$_POST['username']."','".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['email']."','".$_POST['contact']."','".md5($_POST['password'])."')";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }

  function displayUser(){
    $sql = "SELECT * FROM user";
    $res = mysqli_query($this ->conn , $sql);
    $row = mysqli_fetch_assoc($res);
    return $row;
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
    $sql = "UPDATE `user` SET `username`='".$_POST['username']."',`firstName`='".$_POST['firstName']."',`lastName`='".$_POST['lastName']."',`email`='".$_POST['email']."',`contact`='".$_POST['contact']."',`password`='".md5($_POST['password'])."' WHERE id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;

  }

  function login(){
    $email=mysqli_real_escape_string($this->conn, stripcslashes($_POST['email']));
    $password=mysqli_real_escape_string($this->conn, md5(stripcslashes($_POST['password'])));
    $sql= "SELECT * FROM user WHERE email='$email' and password='$password'";
    $res= mysqli_query($this->conn, $sql);
    if(mysqli_num_rows($res)==1){
      $row= mysqli_fetch_assoc($res);
      $_SESSION['userid']= $row['id'];
      $_SESSION['username']= $row['firstName'];

      return $row['id'];
    }else{
      return 0;
    }
  }

  function addCart(){
    $userid= $_SESSION['userid'];
    if($this->getCart($userid)){
       $sql= "SELECT id FROM cart WHERE userid='$userid'";
       $res= mysqli_query($this->conn, $sql);
       $row= mysqli_fetch_assoc($res);
       $cartid= $row['id'];
    }else{
      $sql= "INSERT INTO cart(userid) VALUES ('$userid')";
       if(mysqli_query($this->conn, $sql)){
          $cartid= $this->conn->insert_id;
       }
    }
      $qty=1;
      $pid= $_POST['pid'];
      
      return $this->cartItems($cartid, $userid, $qty, $pid);

    
  }

  function getCart($userid){
    $sql= "SELECT * FROM cart WHERE userid='$userid'";
    $res= mysqli_query($this->conn, $sql);
    if(mysqli_num_rows($res)==1){
      return true;
    }else{
      return false;
    }
  }


  function cartItems($cartid, $userid, $qty, $pid){
    $sql= "INSERT INTO `cart_items`(`cartid`, `userid`, `productid`, `qty`) VALUES ('$cartid', '$userid', '$pid', '$qty')";
    return mysqli_query($this->conn, $sql);

  }

  function displayCart(){
    $userid= $_SESSION['userid'];
    $sql= "SELECT * FROM cart_items WHERE userid='$userid'";
    $res= mysqli_query($this->conn, $sql);
    return $res;

  }

  function deleteCartItem($id){
    $sql = "DELETE FROM cart_items WHERE id = '$id'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;

  }

  function updateCart($item, $qty){
    $sql= "UPDATE cart_items SET qty='$qty' WHERE id= '$item'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }



  


}

$db = new connection();


?>
