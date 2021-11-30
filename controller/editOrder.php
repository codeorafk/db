<?php
    include('../config/constants.php');
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $res = mysqli_query($conn, "SELECT * FROM tbl_order WHERE id ='$id'");

    $row=mysqli_fetch_assoc($res);

    $status = $row['status'];

    if($status=="Ordered")
    {
        $status = "On Delivery";
    }
    elseif($status=="On Delivery")
    {
        $status="Delivered";
    }
    elseif($status=="Delivered")
    {
        $status="Completed";
    }
    else
        $status="Ordered";
    $res = mysqli_query($conn, "UPDATE tbl_order SET status='$status' WHERE id ='$id'");
    echo $status;
?>