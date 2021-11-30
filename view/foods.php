
    <?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo view; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food-menu-box d-none" style="height:250px">
                            <div class="food-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo Ppath; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <form class="orderForm">
                                    <input class="food_id" type="hidden" name="id" value="<?php echo $id ?>">
                                    <input class="food_title" type="hidden" name="title" value="<?php echo $title ?>">
                                    <input class="food_price" type="hidden" name="price" value="<?php echo $price ?>">
                                    <input class="food_image_name" type="hidden" name="image_name" value="<?php echo $image_name ?>">

                                    <button class="btn btn-primary" type="submit" >Order Now</button>
                                    
                                </form> 
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>

            
            
            

            <div class="clearfix"></div>

            <ul id="PageFragment">
                <?php
                 echo "<li class='btn btn-primary active' onclick='changePage(1)'>1</li>";
                for($i = 2; $i <= ceil($count) && $i < 6;$i++){
                    echo "<li class='btn btn-primary' onclick='changePage(".$i.")'>".$i."</li>";
                }
                ?>
            </ul>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <script src="<?php echo Ppath; ?>js/food.js"></script>
    <?php include('partials-front/footer.php'); ?>