<?php 
    include('../config/constants.php');

    $id = mysqli_real_escape_string($conn, $_POST['food_id']);
    echo $id;
    $sql2 = mysqli_query($conn, "DELETE FROM tbl_category WHERE id ='{$id}'");
?>

