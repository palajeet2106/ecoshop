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


?>