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
    $sql = "SELECT * FROM product";
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



}

$db = new connection();


?>
