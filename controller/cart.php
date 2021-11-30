<?php
    
    $flag = 0;
    $id = $_POST['id'];
    if(isset($_COOKIE["cart"])) {
        $cookie_data = stripslashes($_COOKIE["cart"]);
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $key => $value){
            echo $value["item_id"]."  ". $value["item_title"];
            if($value["item_id"] == $id){
                $cart_data[$key]["item_quantity"]++;
                $flag = 1;
            }
        }
    }
    if($flag == 0)
    {
        $item_array = array(
            'item_id' => $_POST['id'],
            'item_title' => $_POST['title'],
            'item_price' => $_POST['price'],
            'item_quantity' => '1',
            'item_image_name' => $_POST['image_name']
        );
        $cart_data[] = $item_array;
    }
    $item_data = json_encode($cart_data);
    setcookie("cart", $item_data, time() +(86400 * 30),"/","localhost",true,);
?>