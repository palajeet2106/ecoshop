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
    $res =  mysqli_query($this->conn, $sql);
    return $res;
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
    $file = $_FILES['pic']['name'];
    $folder = "uploads/";
    $path = $folder.basename($file);
    move_uploaded_file($_FILES['pic']['tmp_name'] , $path);

    $sql = "INSERT INTO `user`(`customerid`,`username`, `firstName`, `lastName`, `email`, `contact`, `pic`, `country`, `state`, `city`, `address`, `pincode`, `password`) VALUES ('".$_POST['customerid']."','".$_POST['username']."','".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['email']."','".$_POST['contact']."', '$path' , '".$_POST['country']."','".$_POST['state']."','".$_POST['city']."' ,'".$_POST['address']."' ,'".$_POST['pinCode']."' , '".md5($_POST['password'])."')";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }

  function displayUser(){
    $userId = $_SESSION['userid'];
    $sql = "SELECT * FROM user WHERE id= '$userId'";
    $res = mysqli_query($this ->conn , $sql);
    // $row = mysqli_fetch_assoc($res);
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
    if(!isset($_POST['username'])){
      $username= $_POST['email'];
    }else{
      $username= $_POST['username'];
    }
  
    if(!empty(basename($file))){ 
      $folder = "uploads/";
      $path = $folder(basename($file));
 
    }else{
      $path = $_POST['picdb'];
    }
  
    move_uploaded_file($_FILES['pic']['tmp_name'] , $path);

    $sql = "UPDATE `user` SET `username`='$username', `firstName`='".$_POST['firstName']."',`lastName`='".$_POST['lastName']."',`email`='".$_POST['email']."',`contact`='".$_POST['contact']."',
    `pic`='$path',`country`='".$_POST['country']."',`state`='".$_POST['state']."',`city`='".$_POST['city']."', `address`='".$_POST['address']."',`pincode`='".$_POST['pinCode']."' WHERE id = '$id'";
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
    if(isset($_SESSION['userid'])){
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
  }else{
      ?>
        <script>
          alert("Please Login to Use Cart");
          window.location.href="login.php"
        </script>
      <?php
  }

    
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


  function cartItems($cartid, $userid, $qty, $pid ){

    $sql= "SELECT * FROM cart_items WHERE productid='$pid' and cartid='$cartid'";
    $res= mysqli_query($this->conn, $sql);

    if(mysqli_num_rows($res)==1){
      $row= mysqli_fetch_assoc($res);
      $qty= $row['qty'];
      $qty+=1;
      $sql= "UPDATE cart_items SET qty='$qty' WHERE productid='$pid' and cartid='$cartid'";
      return mysqli_query($this->conn, $sql);
    }
    else{

    $sql= "INSERT INTO `cart_items`(`cartid`, `userid`, `productid`, `qty`) VALUES ('$cartid', '$userid', '$pid', '$qty')";
    return mysqli_query($this->conn, $sql);
    }

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

  function ordersummary($pid){
    $userid=$_SESSION['userid'];

    $sql= "SELECT * FROM cart_items WHERE userid='$userid' AND productid IN($pid)";
    $res= mysqli_query($this->conn, $sql);
    return $res;

  }

  function sendOrder(){
    $userid= $_SESSION['userid'];
    $customerid= $_POST['customerid'];
    $cartid= $_POST['cartid'];
    $orderid= $_POST['orderid'];
    $netamount= $_POST['netamount'];
    $paymentmode= $_POST['paymentmode']; 

    $pids=$_POST['pids'];
    $pidstring= implode(',', $pids);

    $sql="INSERT INTO `bill_details`(`customerid` ,`order_id`, `userid`, `payment_mode`, `cartid`, `product_ids`, `totalamount`) values('$customerid',
      '$orderid', '$userid', '$paymentmode', '$cartid', '$pidstring', '$netamount')";
    if(mysqli_query($this->conn, $sql)){
      return $this->deletecartafterorder($userid, $pidstring);
    }
  }

  function deletecartafterorder($userid, $pids){
    $sql= "DELETE FROM cart_items WHERE userid='$userid' and productid IN($pids)";
    return mysqli_query($this->conn, $sql);
  }


  function orderDetails(){
    $userid = $_SESSION['userid'];
    $sql = "SELECT `order_id` FROM `bill_details` WHERE id = '$userid'";
    $res = mysqli_query($this ->conn , $sql);
    return $res;
  }



  


}

$db = new connection();


?>
