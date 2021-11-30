<?php 
    include('../config/constants.php');

    if(isset($_COOKIE["cart"])) {
        $cookie_data = stripslashes($_COOKIE["cart"]);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $key => $value){
            echo $value["item_id"]."  ". $value["item_title"];
            unset($cart_data[$key]);
            $item_data = json_encode($cart_data);
            setcookie("cart", $item_data, time() +(86400 * 30),"/","localhost",true,);
        }
    }
    $name_guess = mysqli_real_escape_string($conn,$_POST['full-name']);
    $phone_guess = mysqli_real_escape_string($conn,$_POST['contact']);
    $email_guess = mysqli_real_escape_string($conn,$_POST['email']);
    $address_guess = mysqli_real_escape_string($conn,$_POST['address']);

    $now = date("Y-m-d h:i:sa");
    $res2 = mysqli_query($conn, "INSERT INTO tbl_order SET status='Đang xử lí', order_date='$now', total=0, customer_name='$name_guess', customer_contact='$phone_guess', customer_email='$email_guess', customer_address='$address_guess' ");
    if($res2==true)
    {
        //Category Updated
        echo "Category insert Successfully" ;
    }
    else
    {
        //failed to update category
        echo "Failed to insert Category" ;
    }
    $last_id = $conn->insert_id;

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $total = 0;
    foreach($id as $key => $val){
        $res = mysqli_query($conn,"SELECT * FROM tbl_food WHERE id = '$val'");
        while($row = $res->fetch_assoc()) {
            $total = $total + $row["price"] * $quantity[$key];
        }
        $res2 = mysqli_query($conn, "INSERT INTO tbl_food_in_order SET food_id='$val', quantity='$quantity[$key]', order_id='$last_id'");
    }   
    $res2 = mysqli_query($conn, "UPDATE tbl_order SET total='$total' WHERE id='$last_id'");
    header('Location: /view/');
?>
