<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Ppath ?>css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar" style="position:fixed; background-color: #f7f1e3; width: 100%;height: 50px; z-index: 2;">
            <div>
                <a href="<?php echo view; ?>" title="Logo" >
                    <img src="<?php echo Ppath; ?>images/logo.png" alt="Restaurant Logo" class="img-responsive" style="height: 40px;">
                </a>
            </div>

            <div>
                <ul>
                <li>
                        <button id="cart" type="button" class="" data-toggle="modal" data-target="#cartModal" style="background-color: #f7f1e3; color: black; border: none"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
</svg></button>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>news.php">News</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <?php if(isset($_SESSION['guess'])) {?>
                            <a href="<?php echo view; ?>profile.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo view; ?>logout-guess.php">Logout</a>
                        </li>
                        <?php
                            } else {
                        ?>
                        <a href="<?php echo view; ?>login-guess2.php">Login</a>
                        <?php
                            } 
                        ?>
                    </li>
                    
                </ul>
            </div>
        </div>
        
    </section>
    <div id="cartModal" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content" style="width: 80%; margin: auto; margin-top: 50px;">
                <div class="modal-header">
                    <p>Your Cart</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <!-- <form action=""> -->
                    <div class="appendOrder">
                    <?php
                        if(isset($_COOKIE["cart"])) {
                            $cookie_data = stripslashes($_COOKIE["cart"]);
                            $cart_data = json_decode($cookie_data, true);
                            foreach($cart_data as $key => $value){    
                                 
                    ?>
                        <div class="itemCartremove<?php echo $value["item_id"];?>">
                            <div class='d-flex mb-4' style="padding-left:20px;">
                                <img src="<?php echo Ppath ?>images/food/<?php echo $value["item_image_name"];?>" style='width:100px;height:100px;border-radius:5px;'>
                                <div class='w-75 ml-3 mr-3' style='overflow:hidden'>
                                    <div><strong><?php echo $value["item_title"];?></strong></div>
                                    <div class="price"><strong><?php echo $value["item_price"];?></strong></div>
                                    <form action="" class="remove<?php echo $value["item_id"];?>Form">
                                        <input type="hidden" value=<?php echo $value["item_id"];?> name="id-remove">
                                        <button class="btn btn-primary" id="remove<?php echo $value["item_id"];?>" onclick="removeCart(this.id)" name="removeBtn">Remove</button>
                                    </form>
                                </div>
                                <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                                    <div class="input-group" style='width:120px'>
                                        <div class="input-group-prepend" style='cursor:pointer' onclick="decTotal(this , <?php echo $value['item_price']; ?>)">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input readonly="readonly" type="text" class="form-control quantity-item" value="<?php echo $value['item_quantity']; ?>" name="quantity[]">
                                        <form class="quantityForm">
                                            <input  type="hidden" value="<?php echo $value['item_id']; ?>" name="id">
                                        </form>
                                        <div class="input-group-append" style='cursor:pointer' onclick="incTotal(this , <?php echo $value['item_price']; ?>)">
                                            <span class="input-group-text">+</span>
                                        </div>
                                    </div>
                                </div>
                                <input class="item-id" type='hidden' value=<?php echo $value["item_id"];?> name="id[]">
                            </div>
                        </div>
                    <?php 
                            }
                        }
                    ?>
                        <!-- <div class='d-flex mb-4' style="padding-left:20px;">
                            <img src="<?php echo Ppath ?>images/bg.jpg" style='width:100px;height:100px;border-radius:5px;'>
                            <div class='w-75 ml-3 mr-3 row' style='overflow:hidden'>
                                <div><strong>name</strong></div>
                                <div class="price"><strong>price</strong></div>
                                <textarea name="descript[]" rows="2" cols="30" placeholder="Note for food"></textarea><br>
                                <a href="" id="remove-id">Remove</a>
                            </div>
                            <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                                <div class="input-group" style='width:120px'>
                                    <div class="input-group-prepend" style='cursor:pointer' onclick="">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" class="form-control" value='1' id="totalBuy" name="quantity[]">
                                    <div class="input-group-append" style='cursor:pointer' onclick="">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' value=${id} name="id[]">
                        </div> -->


                    </div>
                    <!-- </form>   -->

                </div>
                <div class="modal-footer">
                    <a href="order.php" class="btn btn-default">Confirm</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="space">
    <br>
    <br>
    </div>
    <!-- Navbar Section Ends Here -->
