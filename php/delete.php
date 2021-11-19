<?php 
    require 'database.php';
    $id = $_GET["id"];
    mysqli_query($conn,"DELETE FROM sneaker WHERE id = $id");
    if(mysqli_affected_rows($conn) > 0){
        header("Location: item_list.php");
        exit;
    }
?>