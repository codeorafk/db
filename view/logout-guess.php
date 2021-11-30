<?php 
    //Include constants.php for SITEURL
    include('../config/constants.php');

    $username = $_SESSION['guess'];
    $sql = "SELECT * FROM tbl_guess WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    if($row['status'] == "Active"){
        $resss = mysqli_query($conn,"UPDATE tbl_guess SET status='Unactive' WHERE username='$username'");
    }

    
    unset($_SESSION['guess']);
    //2. REdirect to Login Page
    header('location:'.view);
?>