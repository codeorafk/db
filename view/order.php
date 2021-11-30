
<?php include('partials-front/menu.php'); ?>
<section class="food-search">
    <div class="container">
    <form action="../controller/order.php" method="POST">  
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
 
        <?php
            if(isset($_SESSION['guess'])){
                $username = mysqli_real_escape_string($conn, $_SESSION['guess']);
                $shit = mysqli_query($conn, "SELECT * FROM tbl_guess WHERE username ='$username'");
                $guess = mysqli_fetch_assoc($shit);
            }
            if(isset($_COOKIE["cart"])) {
                $total = 0;
                $cookie_data = stripslashes($_COOKIE["cart"]);
                $cart_data = json_decode($cookie_data, true);
                foreach($cart_data as $key => $value){                  
        ?>
        <fieldset>
            <legend>Selected Food</legend>
            <div class="food-menu-img">
                <img src="<?php echo Ppath; ?>images/food/<?php echo $value["item_image_name"]; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>
            <div class="food-menu-desc">
                <h3><?php echo $value["item_title"]; ?></h3>
                <input type="hidden" name="id[]" value="<?php echo $value["item_id"]; ?>">

                <p class="food-price">$<?php echo $value["item_price"]; ?></p>
                <input type="hidden" name="price" value="<?php echo $value["item_price"]; ?>">

                <div class="order-label">Quantity</div>
                <input readonly="readonly" type="text" name="quantity[]" class="input-responsive" value="<?php echo $value["item_quantity"]; ?>" required>
            </div>
        </fieldset>
        
        <?php
                }
            }
        ?>
        <fieldset>
            <legend>Delivery Details</legend>
            <div class="order-label">Full Name</div>
            <input type="text" name="full-name" placeholder="E.g. Nguyen Tran Quoc Uy" class="input-responsive" value="<?php if(isset($_SESSION['guess'])) { echo $guess['full_name']; } ?>" required>

            <div class="order-label">Phone Number</div>
            <input type="tel" name="contact" placeholder="E.g. 0708xxxxxx" class="input-responsive" value="<?php if(isset($_SESSION['guess'])) { echo $guess['phone']; } ?>" required>

            <div class="order-label">Email</div>
            <input type="email" name="email" placeholder="E.g. uy.nguyen.this@hcmut.edu.vn" class="input-responsive" value="<?php if(isset($_SESSION['guess'])) { echo $guess['email']; } ?>" required>

            <div class="order-label">Address</div>
            <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required><?php if(isset($_SESSION['guess'])) { echo $guess['address']; } ?></textarea>

            <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
        </fieldset>   
    </form>      
    </div>
</section>

    
<?php include('partials-front/footer.php'); ?>