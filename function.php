<?php

include("class.php");

if(isset($_POST['submit'])){
    $res = $db ->createUser();
    if($res){
        ?>
        <script>
            alert("Record Created");
            window.location.href = "index.php";
        </script>
        <?php
    }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == 'delete'){
    $id = $_REQUEST['id'];
    if($res = $db ->deleteUser($id)){
        ?>
        <script>
            alert("Record Deleted");
        
        </script>
        <?php
    }

}
if(isset($_POST['update'])){
    if($res = $db ->updateUser($_POST['userId'])){
        ?>
        <script>
            alert("Record Updated");   
        </script>
        <?php
    }

}

if(isset($_POST['btnlogin'])){
    $id= $db->login();
    if($id>0){
        ?>
            <script>
                window.location.href="index.php";
            </script>

    <?php
    }else{
        ?>
            <script>
                alert("Invalid Username Or Password");
                window.location.href="login.php"
            </script>
        <?php
    }
}


if(isset($_POST['btnaddcart'])){
    if($db->addCart()){
        ?>
            <script>
                alert("Item Added To Cart");
                window.location.href="cart.php";
            </script>
        <?php
    }
}

if(isset($_REQUEST['id']) && isset($_REQUEST['cmd']) && $_REQUEST['cmd'] == 'cartDelete'){
    $id = $_REQUEST['id'];
    if($res = $db ->deleteCartItem($id)){
        ?>
        <script>
            confirm("Are You sure to delete this item");
            window.location.href = "cart.php";
        </script>
        <?php


    }

   
}

if(isset($_POST['item']) && isset($_POST['qty']) && isset($_POST['cmd']) && $_POST['cmd']=="updatecart"){
    if($db->updateCart($_POST['item'], $_POST['qty'])){
        echo $msg= "Cart Updated";
    }
        

}

?>